<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
  
        return view('user.register', compact('roles'));
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $this->getValidationData($request);
        $data = $this->getUserData($request);
        $role = Role::find($data['role_id']);
        $roleName = $role->name;
        $fileName = $this->storeImage($request, $roleName);

        if ($roleName == "Doctor") {
            $doctor = Doctor::create($data);
            if ($doctor!=null) {
                $doctor->image = $fileName;
                $doctor->save();
            }
        } elseif ($roleName == "Assistant") {
            $assistant = Assistant::create($data);
            if ($assistant!=null) {
                $assistant->image = $fileName;
                $assistant->save();
            }
        } else {
            return redirect()->route('user#register', compact('roleName'))->with(['error' => "Oops Something was not right."]);
        }

        return back()->with(['success' => 'Account was created.']);
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
            'phone' => 'required|digits_between:1,11',
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