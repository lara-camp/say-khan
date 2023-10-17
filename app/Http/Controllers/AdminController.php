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

    // admin profile page
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

    // report
    public function report()
    {
        $datas = $this->admin->report();
        $totalFee = 0;
        foreach ($datas as $data) {
            $totalFee += $data->subscription->fee;
        }
        return view('Admin.report.index', compact('datas', 'totalFee'));
    }

    public function reportSearch(Request $request)
    {
        $datas = $this->admin->reportSearch($request);
        $totalFee = 0;
        foreach ($datas as $data) {
            $totalFee += $data->subscription->fee;
        }
        return view('Admin.report.index', compact('datas', 'totalFee'));
    }

    public function all()
    {
        $assistants = $this->admin->all();
        return view('Admin.assistants.index', compact('assistants'));
    }
}
