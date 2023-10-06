<?php

namespace App\Repositories\DoctorReportRepository;

use App\Models\ClinicDoctor;
use App\Models\Doctor;
use App\Models\DoctorReport;
use App\Repositories\Interfaces\DoctorReport\DoctorReportInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DoctorReportRepository implements DoctorReportInterface
{
    // Pass ID Related ClinicDoctor Data
    public function clinicDoctorAll($id)
    {
        $id = $this->decrypt($id);
        $clinicdoctor = ClinicDoctor::where('doctor_id', $id->id)->get();
        return compact('clinicdoctor');
    }
    // Decrypting and Finding the passed ID
    public function decrypt($id)
    {
        try {
            $id = Crypt::decrypt($id);
            return Doctor::find($id);
        } catch (DecryptException $de) {
            abort(404);
        }
    }

}
