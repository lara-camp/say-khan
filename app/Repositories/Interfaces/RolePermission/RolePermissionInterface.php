<?php

namespace App\Repositories\Interfaces\RolePermission;

use Illuminate\Http\Request;

interface RolePermissionInterface
{
    public function all();

    public function store(Request $request);

    public function edit($id);

    public function update($id, Request $request);

    public function delete($id);
}
