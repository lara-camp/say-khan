<?php

namespace App\Repositories\AdminRepository;

use App\Models\Admin;
use App\Repositories\Interfaces\Admin\AdminInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AdminRepository implements AdminInterface
{
    public function profile()
    {
        return auth()->guard('admin')->user();
    }

    public function update($id, Request $request)
    {
        $this->accountValidationCheck($request);
        $data = $this->getData($request);
        if ($request->hasFile('image')) {
            $admin = Admin::find($id);
            $dbImage = $admin->image;
            if ($dbImage != null) {
                Storage::delete(['public/Admin/' . $dbImage]);
            }
            $fileName = uniqid() . "_" . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/Admin/', $fileName);
            $data['image'] = $fileName;

        }
        return Admin::find($id)->update($data);
    }

    public function changePassword(Request $request)
    {
        $this->checkPasswordValidation($request);
        $currentAdmin = Auth::guard('admin')->user();
        $currentId = $currentAdmin->id;
        $currentAdminPassword = $currentAdmin->password;
        if (Hash::check($request->oldPassword, $currentAdminPassword)) {
            $data = ['password' => Hash::make($request->newPasswordConfirm)];
            Admin::find($currentId)->update($data);
            return back()->with(['success' => 'Password was updated.']);
        }
        return back()->withErrors(['oldPassword' => 'Current Password is not incorrect.']);

    }

    protected function accountValidationCheck($request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'mimes:png,jpg,jpeg,svg,gif|file|image',
        ])->validate();
    }

    protected function getData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
    }

    protected function checkPasswordValidation($request)
    {
        $rules = [
            'oldPassword' => 'required|min:6',
            'newPassword' => ['required',
                Password::min(6)
                    ->letters()
                    ->numbers()
                    ->mixedCase()
                    ->symbols()],
            'newPasswordConfirm' => 'required|same:newPassword',
        ];
        $messages = [
            'oldPassword.required' => "Old Password must be filled.",
            'newPassword.required' => "New Password must be Filled.",
            'newPassword.min' => 'The password must be at least :min characters long and must contain at least one letter, one number, one capitalized letter, and one special character.',
            'newPasswordConfirm.required' => "New Password Confirmation must be Filled.",
        ];
        Validator::make($request->all(), $rules, $messages)->validate();
    }
}
