<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    
    public function roleSelect($provider)
    {
        $roles = Role::get();
        $social = $provider;
        // Session::put('social_platForm', $provider);
        return view('user.roleSelect', compact('roles', 'social'));
    }

    public function socialPage(Request $request)
    {
        $role_id = $request->role_id;
        $data = Role::find($role_id);
        $roleName = $data->name;
        $social = $request->socialKey;
        // dd($social);
        session(['selected_social' => $social]);
        $request->session()->put('selected_role', $roleName);
        return Socialite::driver($social)->redirect();
    }

    public function socialCallBack(Request $request)
    {
        // $social ="google";
      
        $social =session('selected_social');
        // dd($social);
        $role =  $request->session()->get('selected_role');
    //    $role = "Doctor";
     
        $user = Socialite::driver($social)->stateless()->user();
        // dd($user);
        $doctor = Doctor::where('email', $user->email)->first();
        $assistant = Assistant::where('email', $user->email)->first();

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'null',
        ];

        session()->forget('selected_role');

        if (!$doctor && !$assistant) {
            if ($role == "Doctor") {
                $doctor = Doctor::create($data);
                return redirect()->route('doctor.index');

            } elseif ($role == "Assistant") {
                $assistant = Assistant::create($data);
                return redirect()->route('assistant.index');
            }
        }

    }
}