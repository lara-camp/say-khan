<?php

namespace App\Http\Controllers\User;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Assistant;
use App\Models\Doctor;
use App\Models\Role;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(){
        // $roles = Role::all();
        return view('user.login' );
    }

    public function create(Request $request){
        // dd($request->all());
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

        $doctor = Doctor::all();
        $assistant = Assistant::all();
       
        $doctor = Doctor::where('email', $data['email'])->first();
        $assistant = Assistant::where('email', $data['email'])->first();
        // dd($doctor);
        if ($doctor && Hash::check($data['password'],$doctor->password)) {
            return redirect()->route('doctor.create')->with('success', 'You have Successfully logged in');
        }elseif ($assistant && Hash::check($data['password'],$assistant->password)) {
            return redirect()->route('assistant.create')->with('success', 'You have Successfully logged in');
        }else{
            return back()->with(['error' =>'Wrong password']);
        }
    }
      
        public function logout()
        { 
            Auth::logout();
            return redirect()->route('user.login')->with('success', 'You have been logged out.');
        }
    }