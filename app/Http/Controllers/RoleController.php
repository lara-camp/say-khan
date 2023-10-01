<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\Role\RoleInterface;

class RoleController extends Controller
{
    public $role;
    public function __construct(RoleInterface $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role->all();
        return view('pages.dashboard.role.role', compact('roles'));
    }

    // create a new role
    public function create()
    {
        return view('pages.dashboard.role.role-register');
    }

    // store the role
    public function store(Request $request)
    {
        $this->role->store($request);
        return back()->with('success', 'successfully create role');
    }
    // edit
    public function edit($id)
    {
        $role = $this->role->edit($id);
        return view('Admin.role.edit', compact('role'));
    }
    // Update
    public function update($id, Request $request)
    {
        $this->role->update($request, $id,);
        return redirect()->route('role.index')->with('success', 'Update Role Successfully');
    }
    // destroy role
    public function destroy($id)
    {
        $this->role->delete($id);
        return redirect()->route('role.index')->with('success', 'Delete Role Successfully');
    }
}
