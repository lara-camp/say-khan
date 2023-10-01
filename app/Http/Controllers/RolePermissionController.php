<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\RolePermission\RolePermissionInterface;

class RolePermissionController extends Controller
{
    public $rolePermission;
    public function __construct(RolePermissionInterface $rolePermissionInterface)
    {
        $this->rolePermission = $rolePermissionInterface;
    }
    public function list()
    {
        $data = $this->rolePermission->all();
        return view('Admin.RolePermission.index', compact('data'));
    }

    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('Admin.RolePermission.create', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $this->rolePermission->store($request);
        return redirect()->route('rolePermission.list');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $data = $this->rolePermission->edit($id);
        return view('Admin.RolePermission.edit', compact('data', 'roles', 'permissions'));
    }

    public function update($id, Request $request)
    {
        $this->rolePermission->update($id, $request);
        return redirect()->route('rolePermission.list');
    }

    public function delete($id)
    {
        $this->rolePermission->delete($id);
        return back();
    }
}
