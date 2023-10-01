<?php


namespace App\Repositories\Interfaces\Doctor;

use Illuminate\Http\Request;

Interface DoctorInterface{
    
    public function store();

    public function edit($id);

    public function update($data, $id);

    Public function delete($id);

    public function get_buy_subscription_data($id);

    public function decrypt_doctor_id($id);

    public function register_validation($id);

    public function update_validation(Request $request);
}