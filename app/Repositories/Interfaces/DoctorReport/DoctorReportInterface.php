<?php
namespace App\Repositories\Interfaces\DoctorReport;

use Illuminate\Http\Request;

interface DoctorReportInterface
{
    public function clinicDoctorAll($id);

    public function decrypt($id);

    public function fetchIncomeReportData($id, Request $request);

    public function assistantAll($clinicIds);

    public function assistantSelect($clinicIds);
}
