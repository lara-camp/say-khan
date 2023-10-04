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

    public function list()
    {
        $patientrecords = $this->patientrecord->all();
        return view('patient.record.list', compact('patientrecords'));
    }

    public function createPage()
    {
        $patients = Patient::all();
        return view('patient.record.create', compact('patients'));
    }

    public function create(Request $request)
    {
        $this->patientrecord->store($request);
        return redirect()->route('patientRecords#list');
    }

    public function edit($id)
    {
        $patientrecord = $this->patientrecord->edit($id);
        return view('patient.record.edit', compact('patientrecord'));
    }

    public function update($id, Request $request)
    {
        $this->patientrecord->update($id, $request);
        return redirect()->route('patientRecords#list');
    }

    public function delete($id)
    {
        $this->patientrecord->delete($id);
        return back();
    }

}
