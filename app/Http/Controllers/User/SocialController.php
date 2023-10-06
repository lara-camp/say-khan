<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Assistant;
use App\Models\Doctor;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

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

        $social = session('selected_social');
        $role = $request->session()->get('selected_role');

        $user = Socialite::driver($social)->stateless()->user();
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

            } elseif ($role == "Assistant") {
                $assistant = Assistant::create($data);
            }
        }
        return redirect()->route('user.pending');

    }

}
