<?php

namespace App\Repositories\Interfaces\Patient;

use Illuminate\Http\Request;

interface PatientInterface
{
    public function all();

    public function store(Request $request);

    public function edit($id);

    public function update($id, Request $request);

    public function delete($id);
}
