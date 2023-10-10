<?php

namespace App\Repositories\DoctorReportRepository;

use App\Models\Doctor;
use App\Models\Assistant;
use App\Models\ClinicDoctor;
use App\Models\DoctorReport;
use Illuminate\Http\Request;
use App\Models\PatientRecord;
use Illuminate\Support\Facades\Crypt;
use App\Repositories\Interfaces\DoctorReport\DoctorReportInterface;

class DoctorReportRepository implements DoctorReportInterface
{
    // Pass ID Related ClinicDoctor Data
    public function clinicDoctorAll($id)
    {
        $id = $this->decrypt($id);
        $clinicdoctor = ClinicDoctor::where('doctor_id', $id->id)->get()->paginate(10);
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
    public function fetchIncomeReportData($id, Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $clinicId = $request->input('clinic_id');
        $clinicdoctor = $this->clinicDoctorAll($id);
        $clinicdoctorarray = $clinicdoctor['clinicdoctor'];
        $clinicIds = $clinicdoctorarray->pluck('clinic_id')->toArray();
        // The Query
        $query = PatientRecord::join('assistants', 'patient_records.assistant_id', '=', 'assistants.id')
        ->join('clinics', 'assistants.clinic_id', '=', 'clinics.id')
        ->whereBetween('patient_records.created_at', [$startDate, $endDate])
        ->selectRaw('DATE(patient_records.created_at) as date, SUM(totalfee) as total_fees, clinics.name as clinic_name')
        ->groupBy('date', 'clinic_name')
        ->orderBy('date');
        // show report data for selected clinic
        if($startDate && $endDate && $clinicId){
            $reportData = $query->where('assistants.clinic_id', $clinicId)->get()->paginate(10);
        }
        // show report data for all clinic
        else if($startDate && $endDate && !$clinicId){
            $reportData = $query->whereIn('assistants.clinic_id', $clinicIds)->get()->paginate(10);
        }
        return $reportData;
    }
    public function assistantAll($clinicIds)
    {
        $assistant = Assistant::join('clinics', 'assistants.clinic_id', '=', 'clinics.id')
        ->wherein('clinic_id', $clinicIds)
        ->orderBy('clinics.name')
        ->orderBy('assistants.created_at' ,'DESC')
        ->get()
        ->paginate(10);
        return compact('assistant');
    }
    public function assistantSelect($clinicIds)
    {
        $assistant = Assistant::where('clinic_id', $clinicIds)
        ->orderBy('assistants.created_at' ,'DESC')
        ->get()
        ->paginate(10);
        return compact('assistant');
    }
}
