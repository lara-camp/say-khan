<?php

namespace App\Repositories\Interfaces\PatientRecord;

use Illuminate\Http\Request;

interface PatientRecordInterface
{
    // Return all Patient Record Data
    public function all($id);

    public function getPatient($userId);

    public function store(Request $request);

    public function edit($id);

    public function update($id, Request $request);

    public function delete($id);
}
