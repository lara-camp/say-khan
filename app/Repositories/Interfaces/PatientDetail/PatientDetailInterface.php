<?php

namespace App\Repositories\Interfaces\PatientDetail;

use Illuminate\Http\Request;

interface PatientDetailInterface
{
    public function all($id);

    public function store(Request $request);

    public function edit($id);

    public function update($id, Request $request);

    public function delete($id);
}
