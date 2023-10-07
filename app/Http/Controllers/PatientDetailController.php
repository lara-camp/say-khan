<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\Patient\PatientInterface;
use App\Repositories\Interfaces\PatientDetail\PatientDetailInterface;


class PatientDetailController extends Controller
{
    public $patientDetail;
    public $patient;
    public function __construct(PatientDetailInterface $patientDetail, PatientInterface $patient)
    {
        $this->patientDetail = $patientDetail;
        $this->patient = $patient;
    }
    // View Patient Detail List
    public function list()
    {
        $patients = $this->patientDetail->all();
        return view('patient.details.list', compact('patients'));
    }
    // View Patient Detail Create Page
    public function create()
    {
        $patients = $this->patient->all();
        return view('patient.details.create', compact('patients'));
    }
    // Store Patient Detail Data
    public function store(Request $request)
    {
        $this->patientDetail->store($request);
        return redirect()->route('patientDetails.list');
    }
    // View Patient Detail Edit Page
    public function edit($id)
    {
        $patient = $this->patientDetail->edit($id);
        return view('patient.details.edit', compact('patient'));
    }
    // Update Patient Detail Data
    public function update($id, Request $request)
    {
        $this->patientDetail->update($id, $request);
        return redirect()->route('patientDetails.list');
    }
    // Delete Patient Detail Data
    public function delete($id)
    {
        $this->patientDetail->delete($id);
        return back();
    }
}
