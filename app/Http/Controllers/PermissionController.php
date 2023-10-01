<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\Permission\PermissionInterface;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public $permission;
    public function __construct(PermissionInterface $permissionInterface)
    {
        $this->permission = $permissionInterface;
    }

    public function index()
    {
        $permissions = $this->permission->all();
        return view('Admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('Admin.permission.create');
    }

    public function store(Request $request)
    {
        $this->permission->store($request);
        return redirect()->route('admin.PermissionIndex')->with(['success' => 'Permission was created.']);
    }

    public function edit($id)
    {
        $data = $this->permission->edit($id);
        return view('Admin.permission.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $this->permission->update($id, $request);
        return redirect()->route('admin.PermissionIndex')->with(['success' => 'Permission was upated.']);
    }
}
