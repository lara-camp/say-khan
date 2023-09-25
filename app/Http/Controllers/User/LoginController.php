<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    public function login(){
        return view('user.login');
    }
    
    public function create(Request $request){

        $data = $request->validate([
            'email' => ['required','email'],
            'password' => [
                'required',
                Password::min(6)
                    ->letters()
                    ->numbers()
                    ->mixedCase()
                    ->symbols(),
            ],
        ]);
      
        if (!Auth::attempt($data)) {
                return redirect()->route('doctor.create')->with('success', 'You have Successfully logged in' );
                }
                return redirect()->route('user.login')->withErrors(['error' => 'Invalid email or password.']);
            }
            
        public function logout()
        {
            Auth::logout();
            return redirect()->route('user.login')->with('success', 'You have been logged out.');
        }
}