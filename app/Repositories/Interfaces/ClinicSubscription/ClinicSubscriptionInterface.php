<?php
namespace  App\Repositories\Interfaces\ClinicSubscription;

use Illuminate\Http\Request;


interface ClinicSubscriptionInterface
{
    public function all();

    public function subData($id);

    public function store(Request $request);

    public function decryptDoctorId($id);

    public function accept($id);

    public function delete($id);

    public function validateInput(Request $request);

    public function checkDuplication(Request $request);
}