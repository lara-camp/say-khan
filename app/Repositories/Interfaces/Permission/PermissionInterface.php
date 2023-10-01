<?php

namespace App\Repositories\Interfaces\Permission;

use Illuminate\Http\Request;

interface PermissionInterface
{
    public function all();

    public function store(Request $request);

    public function edit($id);

    public function update($id, Request $request);
}
