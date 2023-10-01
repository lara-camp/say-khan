<?php

namespace App\Repositories\Interfaces\Clinic;

use Illuminate\Http\Request;

interface ClinicInterface
{
    public function all();

    public function store(Request $request);

    public function edit($id);

    public function update($id, Request $request);

    public function delete($id);
}
