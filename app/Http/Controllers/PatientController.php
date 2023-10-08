<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

use App\Models\RolePermission;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\Patient\PatientInterface;

class PatientController extends Controller
{
    public $patient;
    public function __construct(PatientInterface $patient)
    {
        $this->patient = $patient;
    }
    // View Patient Index
    public function list($id)
    {
        $assistant = Auth::guard('assistant')->user();
        $patients = $this->patient->all($id);
        return view('patient.index', compact('patients', 'assistant'));
    }
     // View Patient Create Page
    public function create()
    {
        return view('patient.create');
    }
     // Store Patient Data
    public function store(Request $request)
    {
        $this->patient->store($request);
        $assistant = Auth::guard('assistant')->user()->id;
        return redirect()->route('patient.list', encrypt($assistant));
    }
    // View Patient Edit Page
    public function edit($id)
    {
        $patient = $this->patient->edit($id);
        return view('patient.edit', compact('patient'));
    }
    // Update Patient Data
    public function update($id, Request $request)
    {
        $this->patient->update($id, $request);
        $assistant = Auth::guard('assistant')->user()->id;
        return redirect()->route('patient.list', encrypt($assistant));
    }
    // Delete Patient Data
    public function delete($id)
    {
        $this->patient->delete($id);
        return back();
    }
}