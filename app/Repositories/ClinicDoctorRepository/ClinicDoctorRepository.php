<?php

namespace App\Repositories\ClinicDoctorRepository;

use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\ClinicDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Repositories\Interfaces\ClinicDoctor\ClinicDoctorInterface;
use Illuminate\Contracts\Encryption\DecryptException;

class ClinicDoctorRepository implements ClinicDoctorInterface
{
    // To pass all clinic doctor data
    public function all()
    {
        $clinicdoctor = ClinicDoctor::orderBy('created_at', 'desc')->get();
        $clinic = Clinic::all();
        $doctor = Doctor::all();
        
        return compact('clinicdoctor', 'clinic', 'doctor');
    }
    // Storing the Clinic Doctor data
    public function store(Request $request)
    {
        $data = $this->validate_clinic_doctor($request);
        return ClinicDoctor::create($data);
    }

    // Decrypting and Finding the passed ID
    public function get_id($id)
    {
        try {
            $id = Crypt::decrypt($id);
            return ClinicDoctor::find($id);
        }
        catch (DecryptException $de){
            abort(404);
        }
    }
    
    // Update the data
    public function update($id, Request $request)
    {
        $data = $this->validate_clinic_doctor($request);
        $id->update($data);
    }

    // Delete the data
    public function delete($id)
    {
        $decryptId = Crypt::decrypt($id);
        return ClinicDoctor::findOrFail($decryptId)->delete();
    }

    // Validating and stripping tags out of the data
    public function validate_clinic_doctor(Request $request)
    {
        $request['clinic_id'] = strip_tags($request['clinic_id']);
        $request['doctor_id'] = strip_tags($request['doctor_id']);
        $request['status'] = strip_tags($request['status']);

        return $request->validate([
            'clinic_id' => 'required',
            'doctor_id' => 'required',
            'status' => 'required',
        ]);
    }

     // Checking data duplication
    public function check_duplication(Request $request)
    {
        return ClinicDoctor::where('clinic_id', $request['clinic_id'])
        ->where('doctor_id', $request['doctor_id'])
        ->first();
    }
}