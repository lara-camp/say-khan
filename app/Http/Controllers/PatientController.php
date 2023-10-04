<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

use App\Models\RolePermission;
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
        // $userId = Admin::find(1);
        // $data = RolePermission::where('role_id', $userId->role->id)->first();
        // dd($data->permission->key == 'R');
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