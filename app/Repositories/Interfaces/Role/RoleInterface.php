<?php


namespace App\Repositories\Interfaces\Role;

use Illuminate\Http\Request;

interface RoleInterface
{
    public function all();

    public function store(Request $request);

    public function edit($id);

    public function update(Request $request, $id);

    public function delete($id);
}
