<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Assistant;
use App\Models\Doctor;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register()
    {
        $roles = Role::all();
        // dd($roles);

        return view('user.register', compact('roles'));
    }

    public function create(Request $request)
    {
        $this->getValidationData($request);
        $data = $this->getUserData($request);
        $role = Role::find($data['role_id']);
        $roleName = $role->name;
        $fileName = $this->storeImage($request, $roleName);

        if ($roleName == "Doctor") {
            $doctor = Doctor::create($data);
            if ($doctor != null) {
                $doctor->image = $fileName;
                $doctor->save();
            }
            return redirect()->route('doctor.index')->with(['success' => 'Doctor acc was successfully update.']);
        } elseif ($roleName == "Assistant") {
            $assistant = Assistant::create($data);
            if ($assistant != null) {
                $assistant->image = $fileName;
                $assistant->save();
            }
            return redirect()->route('assistant.index')->with(['success' => 'Assistant acc was successfully update.']);
        } elseif ($roleName == "Admin") {
            $admin = Admin::create($data);
            if ($admin != null) {
                $admin->image = $fileName;
                $admin->save();
            }
            return redirect()->route('admin.clinicList')->with(['success' => 'Admin acc was successfully update.']);
        } else {
            return redirect()->route('user#register', compact('roleName'))->with(['error' => "Oops Something was not right."]);
        }
    }

    public function pending()
    {
        return view('user.pending');
    }

    private function storeImage(Request $request, $roleName)
    {
        $fileName = uniqid() . "_" . $request->file('image')->getClientOriginalName();
        $folderName = "public/$roleName";

        if ($roleName == "Doctor" || $roleName == "Assistant") {
            $request->file('image')->storeAs($folderName, $fileName);
            return $fileName;
        }

        return false;
    }

    private function getValidationData($request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:doctors,email|unique:assistants,email',
            'address' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'role_id' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg,gif|file|image',
            'password' => ['required',
                Password::min(6)
                    ->letters()
                    ->numbers()
                    ->mixedCase()
                    ->symbols()],
            'password_confirmation' => 'required|min:6|same:password',
        ];
        $customMessage = [
            'phone.regex' => 'Phone number must be digits.',
            'password.required' => "Password must be Filled.",
            'password.min' => 'The password must be at least :min characters long and must contain at least one letter, one number, one capitalized letter, and one special character.',
            'password_confirmation.required' => "Password Confirmation must be Filled.",
        ];
        Validator::make($request->all(), $rules, $customMessage)->validate();
    }

    private function getUserData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password_confirmation),
        ];
    }
}
