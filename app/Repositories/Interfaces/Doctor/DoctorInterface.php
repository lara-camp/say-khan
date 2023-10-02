<?php


namespace App\Repositories\Interfaces\Doctor;

use Illuminate\Http\Request;

Interface DoctorInterface{
    
    public function store(Request $request);

    public function update($id, Request $request);

    Public function delete($id);

    public function get_buy_subscription_data($id);

    public function decrypt_doctor_id($id);

    public function register_validation(Request $request);

    public function update_validation(Request $request);
}