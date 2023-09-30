<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\Clinic\ClinicInterface;


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
        return view('Admin.clinic.index', compact('clinics'));
    }

    public function create()
    {
        return view("Admin.clinic.create");
    }

    public function store(Request $request)
    {
        $this->clinic->store($request);

        return redirect()->route('admin.clinicList')->with(['success' => 'Clinic Was Successfully Created.']);
    }

    public function edit($id)
    {
        $this->clinic->edit($id);
    }

    public function delete($id)
    {
        $this->clinic->delete($id);
        return back()->with(['success' => 'Item was Deleted.']);
    }
}