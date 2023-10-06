<?php
namespace App\Repositories\Interfaces\DoctorReport;

use Illuminate\Http\Request;

interface DoctorReportInterface
{
    public function clinicDoctorAll($id);

    public function decrypt($id);

}
