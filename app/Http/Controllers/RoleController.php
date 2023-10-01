<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function role(){
        return view('pages.dashboard.role.role');
    }

    public function roleRegister(){
        return view('pages.dashboard.role.role-register');
    }
}
