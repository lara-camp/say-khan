<?php

namespace App\Repositories\PatientDetailRepository;

use App\Models\PatientDetail;
use App\Repositories\Interfaces\PatientDetail\PatientDetailInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientDetailRepository implements PatientDetailInterface
{
    public function all()
    {
        return PatientDetail::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $this->getPatientDetailValidation($request);
        $data = $this->getPatientDetailData($request);
        return PatientDetail::create($data);
    }

    public function edit($id)
    {
        $decryptId = decrypt($id);
        return PatientDetail::find($decryptId);
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'allergic' => 'required|max:255',
            'medical_history' => 'required|max:255',
        ]);

        $data = [
            'blood_type' => $request->blood_type,
            'allergic' => $request->allergic,
            'medical_history' => $request->medical_history,
        ];

        return PatientDetail::findOrFail($id)->update($data);
    }

    public function delete($id)
    {
        $decryptId = decrypt($id);
        return PatientDetail::find($decryptId)->delete();
    }

    protected function getPatientDetailValidation($request)
    {
        $customMessage = [
            'patient_id.required' => 'Choose Patient is required.',
            'patient_id.unique' => 'This patient name is already taken.',
        ];
        Validator::make($request->all(), [
            'patient_id' => 'required|unique:patient_details,patient_id',
            'blood_type' => 'required',
            'allergic' => 'required|max:255',
            'medical_history' => 'required|max:255',
        ], $customMessage)->validate();
    }

    protected function getPatientDetailData($request)
    {
        return [
            'patient_id' => $request->patient_id,
            'blood_type' => $request->blood_type,
            'allergic' => $request->allergic,
            'medical_history' => $request->medical_history,
        ];
    }
}
