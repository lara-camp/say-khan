<?php

namespace App\Repositories\PatientRepository;


use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\Patient\PatientInterface;

class PatientRepository implements PatientInterface
{
    public function all()
    {
        return Patient::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $this->getPatientValidationData($request);
        $data = $this->getPatientData($request);
        return Patient::create($data);
    }

    public function edit($id)
    {
        $decryptId = decrypt($id);
        return Patient::findOrFail($decryptId);
    }

    public function update($id, Request $request)
    {
        $this->getPatientValidationData($request);
        $data = $this->getPatientData($request);
        return Patient::find($id)->update($data);
    }

    public function delete($id)
    {
        $decryptId = decrypt($id);
        return Patient::find($decryptId)->delete();
    }

    // export same code into function
    protected function getPatientValidationData($request)
    {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required|numeric|digits_between:1,11',
            'address' => 'required',
            'gender' => 'required',
            'status' => 'required'
        ])->validate();
    }

    protected function getPatientData($request)
    {
        return [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'status' => $request->status,
        ];
    }
}