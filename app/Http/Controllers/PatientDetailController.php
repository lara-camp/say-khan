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
    public function list()
    {
        $patients = $this->patientDetail->all();
        return view('patient.details.list', compact('patients'));
    }

    public function createPage()
    {
        $patients = $this->patient->all();
        return view('patient.details.create', compact('patients'));
    }

    public function create(Request $request)
    {
        $this->patientDetail->store($request);
        return redirect()->route('patientDetails#list');
    }

    public function edit($id)
    {
        $patient = $this->patientDetail->edit($id);
        return view('patient.details.edit', compact('patient'));
    }

    public function update($id, Request $request)
    {
        $this->patientDetail->update($id, $request);
        return redirect()->route('patientDetails#list');
    }

    public function delete($id)
    {
        $this->patientDetail->delete($id);
        return back();
    }
}
