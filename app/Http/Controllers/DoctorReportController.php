<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientRecord;
use App\Repositories\Interfaces\DoctorReport\DoctorReportInterface;

class DoctorReportController extends Controller
{
    public $doctorreport;
    public function __construct(DoctorReportInterface $doctorreport)
    {
        $this->doctorreport = $doctorreport;
    }

    // Show Report Page
    public function showIncomeReport($id){
        $clinicdoctor = $this->doctorreport->clinicDoctorAll($id);
        return view('doctor.report.income', compact('clinicdoctor'));
    }

    // Display report with filters
    public function fetchIncomeReport($id, Request $request){
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $clinicId = $request->input('clinic_id');
        $clinicdoctor = $this->doctorreport->clinicDoctorAll($id);
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
            $reportData = $query->where('assistants.clinic_id', $clinicId)->get();
        }
        // show report data for all clinic
        else if($startDate && $endDate && !$clinicId){
            $reportData = $query->whereIn('assistants.clinic_id', $clinicIds)->get();
        }
        return view('doctor.report.income', compact('id', 'reportData', 'clinicdoctor'));
    }
}
