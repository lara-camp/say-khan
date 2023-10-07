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
    // View Doctor index
    public function index()
    {
        return view('doctor.index');
    }
    // View Doctor List
    public function list()
    {
        $doctors = Doctor::all();
        return view('doctor.index', compact('doctors'));
    }
    // View Doctor Create Page
    public function create()
    {
        return view('doctor.create');
    }
    // Store Doctor data
    public function store(Request $request)
    {
        $this->doctor->store($request);
        return redirect()->route('doctor.index')->with('success', 'successfully create ');
    }
    // View Doctor Edit Page
    public function edit($id){
        $doctor = $this->doctor->decryptId($id);
        return view('doctor.edit', compact('doctor'));
    }
    // Update Doctor Data
    public function update($id, Request $request)
    {
        $this->doctor->update($id, $request);
        return redirect()->route('doctor.index')->with('success', 'Update  Successfully');
    }
    // Destroy Doctor Data
    public function destroy($id)
    {
        $this->doctor->delete($id);
        return redirect()->route('doctor.index')->with('success', 'Delete  Successfully');
    }
}
