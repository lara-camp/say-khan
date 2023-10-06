<?php

namespace App\Repositories\PatientRecordRepository;


use App\Models\PatientRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\PatientRecord\PatientRecordInterface;

class PatientRecordRepository implements PatientRecordInterface
{
    // Return all Patient Record Data
    public function all()
    {
        return PatientRecord::orderBy('created_at', 'desc')->get();
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
           
            $image1->move(public_path('medicalimage1'), $new_name1);
            $image2->move(public_path('medicalimage2'), $new_name2);
            $image_file1 = "/medicalimage1/" . $new_name1;
            $image_file2 = "/medicalimage2/" . $new_name2;

            return compact('image_file1', 'image_file2');
            }
    }
    // Validate Patient Record Data
    protected function getPatientRecordValidationData($request)
    {
        Validator::make($request->all(), [
            'bodytemp' => 'required|max:255',
            'currentsituation' => 'required',
            'bloodpressure' => 'required',
            'heartrate' => 'required',
            'remark' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'medicalimage1' => 'image|mimes:jpeg,png,jpg,gif',
            'medicalimage2' => 'image|mimes:jpeg,png,jpg,gif',
            'totalfee' => 'required',
            'patient_id' => 'required',
            'assistant_id' => 'required',
            'status' => 'required'
        ])->validate();
    }
    // Fetch Patient Record Data
    protected function getPatientRecordData($request, $images)
    {
        return [
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
            'medicalimage1' => $images['image_file1'],
            'medicalimage2' => $images['image_file2'],
        ];
    }
}