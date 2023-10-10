<?php

namespace App\Repositories\PatientRepository;


use App\Models\Patient;
use App\Models\Assistant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\Patient\PatientInterface;

class PatientRepository implements PatientInterface
{
    public function all($id)
    {
        $decryptId = Crypt::decrypt($id);
        $assistant = Assistant::find($decryptId);
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
            'clinic_id' => 'required',
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
            'clinic_id' => $request->clinic_id,
            'status' => $request->status,
        ];
    }
}