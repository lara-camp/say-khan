<?php

namespace App\Repositories\PatientRecordRepository;


use App\Models\Patient;
use App\Models\Assistant;
use Illuminate\Http\Request;
use App\Models\PatientRecord;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\PatientRecord\PatientRecordInterface;

class PatientRecordRepository implements PatientRecordInterface
{
    // Return all Patient Record Data
    public function all($id)
    {
        $decryptId = decrypt($id);
        $assistant = Assistant::find($decryptId);
        if ($assistant) {
            $clinicId = $assistant->clinic_id;
            $patientRecords = PatientRecord::join('assistants', 'patient_records.assistant_id', '=', 'assistants.id')
                ->where('assistants.clinic_id', '=', $clinicId)
                ->select('patient_records.*')
                ->orderBy('created_at', 'desc')
                ->get()
                ->paginate(10);
            return $patientRecords;
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
                ->get()
                ->paginate(10);
            return $patients;
        } else {

        }
    }
    // Store Patient Record
    public function store(Request $request)
    {
        $this->getPatientRecordValidationData($request);
        $images = $this->storeImage($request);
        $data = $this->getPatientRecordData($request, $images);
        return PatientRecord::create($data);
    }
    // Decrypt and Find Patient Record ID
    public function edit($id)
    {
        $decryptId = decrypt($id);
        return PatientRecord::find($decryptId);
    }
    // Update Patient Record Data
    public function update($id, Request $request)
    {
        $this->getPatientRecordValidationData($request);
        $images = $this->storeImage($request);
        $data = $this->getPatientRecordData($request, $images);

        return PatientRecord::find($id)->update($data);
    }
    // Delete Patient Record Data
    public function delete($id)
    {
        $decryptId = decrypt($id);
        return PatientRecord::find($decryptId)->delete();
    }
    // Store Patient Record Images
    private function storeImage(Request $request)
    {
        $image1 =$request->file('medicalimage1');
        $image2 =$request->file('medicalimage2');
        
            if ($image1 != null || $image2 != null){ 
            $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
            $new_name2 = rand() . '.' . $image2->getClientOriginalExtension();
           
            $image1->move(public_path('storage/medicalimage1'), $new_name1);
            $image2->move(public_path('storage/medicalimage2'), $new_name2);
            $image_file1 = "/storage/medicalimage1/" . $new_name1;
            $image_file2 = "/storage/medicalimage2/" . $new_name2;

            return compact('image_file1', 'image_file2');
            }
    }
    // Validate Patient Record Data
    protected function getPatientRecordValidationData($request)
    {
        Validator::make($request->all(), [
            'bodytemp' => 'required|numeric|digits_between:1,4',
            'currentsituation' => 'required',
            'bloodpressure' => 'required|numeric|digits_between:1,4',
            'heartrate' => 'required|numeric|digits_between:1,3',
            'remark' => 'required',
            'weight' => 'required|numeric|between:0,999.99',
            'height' => 'required|numeric|between:0,999.99',
            'medicalimage1' => 'image|mimes:jpeg,png,jpg,gif',
            'medicalimage2' => 'image|mimes:jpeg,png,jpg,gif',
            'totalfee' => 'required|numeric|digits_between:1,10',
            'patient_id' => 'required',
            'assistant_id' => 'required',
            'status' => 'required'
        ])->validate();
    }
    // Fetch Patient Record Data
    protected function getPatientRecordData($request, $images)
    {
        $data = [
            'bodytemp' => $request->bodytemp,
            'currentsituation' => $request->currentsituation,
            'bloodpressure' => $request->bloodpressure,
            'heartrate' => $request->heartrate,
            'remark' => $request->remark,
            'weight' => $request->weight,
            'height' => $request->height,
            'totalfee' => $request->totalfee,
            'patient_id' => $request->patient_id,
            'assistant_id' => $request->assistant_id,
            'status' => $request->status,
            'medicalimage1' => $images['image_file1'] ?? null,
            'medicalimage2' => $images['image_file2'] ?? null,
        ];
        $filteredData = array_filter($data, function ($value) {
            return $value !== null;
        });
        return $filteredData;
    }
}