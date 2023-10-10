<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\Clinic\ClinicInterface;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public $clinic;
    public function __construct(ClinicInterface $clinicInterface)
    {
        $this->clinic = $clinicInterface;
    }

    public function index()
    {
        $clinics = $this->clinic->all();
        return view('pages.admin-dashboard.clinic.clinic', compact('clinics'));
    }
    public function clinicDetail(){
        return view('pages.admin-dashboard.clinic.clinic-detail');
    }
    public function assignDoctor(){
        return view('pages.admin-dashboard.clinic.assign-doctor');
    }

    public function create()
    {
        return view("pages.admin-dashboard.clinic.clinic-register");
    }

    public function store(Request $request)
    {
        $this->clinic->store($request);

        return redirect()->route('admin.clinicIndex')->with(['success' => 'Clinic Was Successfully Created.']);
    }

    public function edit($id)
    {
        $data = $this->clinic->edit($id);
        return view('pages.admin-dashboard.clinic.clinic-edit', compact('data'));
    }

    public function delete($id)
    {
        $this->clinic->delete($id);
        return back()->with(['success' => 'Item was Deleted.']);
    }

    public function update($id, Request $request)
    {
        $this->clinic->update($id, $request);
        return redirect()->route('admin.clinicIndex')->with(['success' => 'Clinic was Sucessfully Updated']);
    }
}
