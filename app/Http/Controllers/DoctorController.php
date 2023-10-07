<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Repositories\Interfaces\Doctor\DoctorInterface;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public $doctor;
    public function __construct(DoctorInterface $doctor)
    {
        $this->doctor = $doctor;
    }
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctor.index', compact('doctors'));
    }
    // create a new
    public function create()
    {
        return view('doctor.create');
    }
    // store the
    public function store(Request $request)
    {
        $this->doctor->store($request);
        return redirect()->route('doctor.index')->with('success', 'successfully create ');
    }
    // edit
    public function edit($id)
    {
        dd($id);
        $doctor = $this->doctor->decryptId($id);
        return view('doctor.edit', compact('doctor'));
    }
    // Update
    public function update($id, Request $request)
    {
        $this->doctor->update($id, $request);
        return redirect()->route('doctor.index')->with('success', 'Update  Successfully');
    }

    // destroy
    public function destroy($id)
    {
        $this->doctor->delete($id);
        return redirect()->route('doctor.index')->with('success', 'Delete  Successfully');
    }
}
