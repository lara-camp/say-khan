<?php

namespace App\Repositories\PatientRecordRepository;


use App\Models\PatientRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\PatientRecord\PatientRecordInterface;

class PatientRecordRepository implements PatientRecordInterface
{
    public function all()
    {
        return PatientRecord::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $this->getPatientRecordValidationData($request);
        $images = $this->storeImage($request);
        $data = $this->getPatientRecordData($request, $images);
        return PatientRecord::create($data);
    }

    public function edit($id)
    {
        $decryptId = decrypt($id);
        return PatientRecord::find($decryptId);
    }

    public function update($id, Request $request)
    {
        $this->getPatientRecordValidationData($request);
        $images = $this->storeImage($request);
        $data = $this->getPatientRecordData($request, $images);

        return PatientRecord::find($id)->update($data);
    }

    public function delete($id)
    {
        $decryptId = decrypt($id);
        return PatientRecord::find($decryptId)->delete();
    }

    private function storeImage(Request $request)
    {
        $fileName1 = uniqid() . "_" . $request->file('medicalimage1')->getClientOriginalName();
        $fileName2 = uniqid() . "_" . $request->file('medicalimage2')->getClientOriginalName();
        $folderName = "patientRecord";

        $filePath1 = $request->file('medicalimage1')->storeAs($folderName, $fileName1);
        $filePath2 = $request->file('medicalimage2')->storeAs($folderName, $fileName2);
        return compact('filePath1', 'filePath2');
    }

    // export same code into function
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
            'medicalimage1' => $images['filePath1'],
            'medicalimage2' => $images['filePath2'],
        ];
    }
}