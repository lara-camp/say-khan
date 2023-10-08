<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\PatientRecord\PatientRecordInterface;

class PatientRecordController extends Controller
{
    public $patientrecord;
    public function __construct(PatientRecordInterface $patientrecord)
    {
        $this->patientrecord = $patientrecord;
    }
    // View Patient Record List
    public function list($id)
    {
        $assistant = Auth::guard('assistant')->user();
        $patientrecords = $this->patientrecord->all($id);
        return view('patient.record.list', compact('patientrecords', 'assistant'));
    }
    // View Patient Record Create Page
    public function create()
    {
        $userId = Auth::guard('assistant')->user()->id;
        $patients = $this->patientrecord->getPatient($userId);
        return view('patient.record.create', compact('patients'));
    }
    // Store Patient Record Data
    public function store(Request $request)
    {
        $this->patientrecord->store($request);
        $assistant = Auth::guard('assistant')->user()->id;
        return redirect()->route('patientRecords.list', encrypt($assistant));
    }
    // View Patient Record Edit Page
    public function edit($id)
    {
        $patientrecord = $this->patientrecord->edit($id);
        return view('patient.record.edit', compact('patientrecord'));
    }
    // Update Patient Record Data
    public function update($id, Request $request)
    {
        $this->patientrecord->update($id, $request);
        $assistant = Auth::guard('assistant')->user()->id;
        return redirect()->route('patientRecords.list', encrypt($assistant));
    }
    // Delete Patient Record Data
    public function delete($id)
    {
        $this->patientrecord->delete($id);
        return back();
    }
}
