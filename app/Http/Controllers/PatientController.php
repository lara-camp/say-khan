<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\Patient\PatientInterface;

class PatientController extends Controller
{
    public $patient;
    public function __construct(PatientInterface $patient)
    {
        $this->patient = $patient;
    }

    public function home()
    {
        $patients = $this->patient->all();
        return view('patient.index', compact('patients'));
    }

    public function createPage()
    {
        return view('patient.create');
    }

    public function create(Request $request)
    {
        $this->patient->store($request);
        return redirect()->route('patient#home');
    }

    public function edit($id)
    {
        $patient = $this->patient->edit($id);
        return view('patient.edit', compact('patient'));
    }

    public function update($id, Request $request)
    {
        $this->patient->update($id, $request);
        return redirect()->route('patient#home');
    }

    public function delete($id)
    {
        $this->patient->delete($id);
        return back();
    }
}
