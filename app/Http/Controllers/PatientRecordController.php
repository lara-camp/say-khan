<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\PatientRecord\PatientRecordInterface;

class PatientRecordController extends Controller
{
    public $patientrecord;
    public function __construct(PatientRecordInterface $patientrecord)
    {
        $this->patientrecord = $patientrecord;
    }
    // View Patient Record List
    public function list()
    {
        $patientrecords = $this->patientrecord->all();
        return view('patient.record.list', compact('patientrecords'));
    }
    // View Patient Record Create Page
    public function createPage()
    {
        $patients = Patient::all();
        return view('patient.record.create', compact('patients'));
    }
    // Store Patient Record Data
    public function create(Request $request)
    {
        $this->patientrecord->store($request);
        return redirect()->route('patientRecords#list');
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
        return redirect()->route('patientRecords#list');
    }
    // Delete Patient Record Data
    public function delete($id)
    {
        $this->patientrecord->delete($id);
        return back();
    }
}
