<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class loginController extends Controller
{
    public function login()
    {
        // $roles = Role::all();
        return view('user.login');

    }

    public function create(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => [
                'required',
                Password::min(6)
                    ->letters()
                    ->numbers()
                    ->mixedCase()
                    ->symbols(),
            ],
        ]);
        // if (Auth::guard('doctor')->attempt($data)) {
        //     return redirect()->route('doctor.index');
        // } else if (Auth::guard('assistant')->attempt($data)) {
        //     return redirect()->route('doctor.index');
        // } else if (Auth::guard('admin')->attempt($data)) {
        //     dd('hit');
        //     return redirect()->route('doctor.index');
        // } else {
        //     return back();
        // }
        $guard = null;

        switch (true) {
            case Auth::guard('doctor')->attempt($data):
                $guard = 'doctor';
                break;
            case Auth::guard('assistant')->attempt($data):
                $guard = 'assistant';
                break;
            case Auth::guard('admin')->attempt($data):
                $guard = 'admin';
                break;
        }

        if ($guard) {
            return redirect()->route($guard . '.index');
        } else {
            return back();
        }

    }

    public function logout()
    {
        if (auth()->guard('doctor')->check()) {
            Auth::guard('doctor')->logout();
        } else if (auth()->guard('assistant')->check()) {
            Auth::guard('assistant')->logout();
        } else if (auth()->guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        return redirect()->route('user.login')->with('success', 'You have been logged out.');
    }
}