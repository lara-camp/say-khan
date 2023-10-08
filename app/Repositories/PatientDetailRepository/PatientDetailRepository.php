<?php

namespace App\Repositories\PatientDetailRepository;

use App\Models\Patient;
use App\Models\Assistant;
use Illuminate\Http\Request;
use App\Models\PatientDetail;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\PatientDetail\PatientDetailInterface;

class PatientDetailRepository implements PatientDetailInterface
{
    // Return All Patient Details Data
    public function all($id)
    {
        $decryptId = decrypt($id);
        $assistant = Assistant::find($decryptId);
        if ($assistant) {
            $clinicId = $assistant->clinic_id;
            $patientDetails = PatientDetail::join('patients', 'patient_details.patient_id', '=', 'patients.id')
                ->where('patients.clinic_id', '=', $clinicId)
                ->select('patient_details.*')
                ->orderBy('created_at', 'desc')
                ->get();
            return $patientDetails;
        } else {

        }
    }
    public function getPatient($userId)
    {
        $assistant = Assistant::find($userId);
        if ($assistant) {
            $clinicId = $assistant->clinic_id;
            $patients = Patient::where('patients.clinic_id', '=', $clinicId)
                ->select('patients.*')
                ->orderBy('created_at', 'desc')
                ->get();
            return $patients;
        } else {

        }
    }
    // Store Patient Details Data
    public function store(Request $request)
    {
        $this->getPatientDetailValidation($request);
        $data = $this->getPatientDetailData($request);
        return PatientDetail::create($data);
    }
    // Decrypt and Find Patient Details ID
    public function edit($id)
    {
        $decryptId = decrypt($id);
        return PatientDetail::find($decryptId);
    }
    // Update Patient Details Data
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
    // Delete Patient Details Data
    public function delete($id)
    {
        $decryptId = decrypt($id);
        return PatientDetail::find($decryptId)->delete();
    }
    // Validate Patient Details Data
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
    // Fetch Patient Details Data
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
