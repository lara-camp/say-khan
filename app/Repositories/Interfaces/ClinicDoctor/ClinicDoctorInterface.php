<?php
namespace  App\Repositories\Interfaces\ClinicDoctor;

use Illuminate\Http\Request;


interface ClinicDoctorInterface
{
    public function all();

    public function store(Request $request);

    public function get_id($id);

    public function update($id, Request $request);

    public function delete($id);

    public function validate_clinic_doctor(Request $request);

    public function check_duplication(Request $request);
}