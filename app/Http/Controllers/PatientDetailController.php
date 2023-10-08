<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function list($id)
    {
        $assistant = Auth::guard('assistant')->user();
        $patients = $this->patientDetail->all($id);
        return view('patient.details.list', compact('patients', 'assistant'));
    }
    // View Patient Detail Create Page
    public function create()
    {
        $userId = Auth::guard('assistant')->user()->id;
        $patients = $this->patientDetail->getPatient($userId);
        return view('patient.details.create', compact('patients'));
    }
    // Store Patient Detail Data
    public function store(Request $request)
    {
        $this->patientDetail->store($request);
        $assistant = Auth::guard('assistant')->user()->id;
        return redirect()->route('patientDetails.list', encrypt($assistant));
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
        $assistant = Auth::guard('assistant')->user()->id;
        return redirect()->route('patientDetails.list', encrypt($assistant));
    }
    // Delete Patient Detail Data
    public function delete($id)
    {
        $this->patientDetail->delete($id);
        return back();
    }
}
