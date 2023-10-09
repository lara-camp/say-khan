<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\PatientRecord;
use Illuminate\Support\Facades\App;
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
        $reportData = $this->doctorreport->fetchIncomeReportdata($id, $request);
        $clinicdoctor = $this->doctorreport->clinicDoctorAll($id);
        return view('doctor.report.income', compact('id', 'reportData', 'clinicdoctor'));
    }
    // Show Assistant List
    public function showAssistantList($id){
        $clinicdoctors = $this->doctorreport->clinicDoctorAll($id);
        $clinicdoctorarray = $clinicdoctors['clinicdoctor'];
        $clinicIds = $clinicdoctorarray->pluck('clinic_id')->toArray();
        $assistants = $this->doctorreport->assistantAll($clinicIds);
        
        return view('doctor.report.assistantList', compact('clinicdoctors', 'assistants'));
    }
    
    // Display report with filters
    public function fetchAssistantList($id, Request $request){
        $clinicdoctors = $this->doctorreport->clinicDoctorAll($id);
        $clinicIds = $request->input('clinic_id');
        // Show for Selected Clinic
        if($clinicIds){
            $assistants = $this->doctorreport->assistantSelect($clinicIds);
        }
        // Show for All clinics
        else if(!$clinicIds){
            $clinicdoctorarray = $clinicdoctors['clinicdoctor'];
            $clinicIds = $clinicdoctorarray->pluck('clinic_id')->toArray();
            $assistants = $this->doctorreport->assistantAll($clinicIds);
        }
        return view('doctor.report.assistantList', compact('id', 'assistants', 'clinicdoctors'));
    }
    // Exporting Income PDF
    public function exportIncomePDF($id, Request $request)
    {
        $reportData = $this->doctorreport->fetchIncomeReportdata($id, $request);
        $pdf = PDF::loadView('doctor.report.pdf.income', compact('reportData'));
        return $pdf->stream('income_report.pdf');
    }
}
