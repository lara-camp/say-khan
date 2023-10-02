<?php
namespace  App\Repositories\Interfaces\ClinicDoctor;

use Illuminate\Http\Request;


interface ClinicDoctorInterface
{
    public function all();

    public function store(Request $request);

    public function decryptId($id);

    public function update($id, Request $request);

    public function delete($id);

    public function validateClinicDoctor(Request $request);

    public function checkDuplication(Request $request);
}