<?php


namespace App\Repositories\Interfaces\Doctor;

use Illuminate\Http\Request;

Interface DoctorInterface{
    
    public function store(Request $request);

    public function update($id, Request $request);

    Public function delete($id);

    public function decryptId($id);

    public function validateRegister(Request $request);

    public function validateUpdate(Request $request);

    public function changePassword(Request $request);
}