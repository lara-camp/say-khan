<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function report()
    {
        return view('Admin.report.index');
    }
}
