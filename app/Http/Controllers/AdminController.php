<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\Admin\AdminInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $admin;
    public function __construct(AdminInterface $adminInterface)
    {
        $this->admin = $adminInterface;
    }

    public function profile()
    {
        $admin = $this->admin->profile();
        return view('Admin.profile.index', compact('admin'));
    }

    public function update($id, Request $request)
    {
        $this->admin->update($id, $request);
        return back()->with(['success' => 'Profile was Updated.']);
    }

    public function changePasswordPage()
    {
        return view('Admin.profile.changePassword');
    }

    public function changePassword(Request $request)
    {
        return $this->admin->changePassword($request);
    }

    public function report()
    {
        return view('Admin.report.index');
    }
}
