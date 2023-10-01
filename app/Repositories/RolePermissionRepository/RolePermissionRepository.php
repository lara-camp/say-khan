<?php

namespace App\Repositories\RolePermissionRepository;

use Illuminate\Http\Request;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\RolePermission\RolePermissionInterface;

class RolePermissionRepository implements RolePermissionInterface
{
    public function all()
    {
        return RolePermission::orderBy('id', 'desc')->get();
    }

    public function store(Request $request)
    {
        $this->checkValidationData($request);
        $data = $this->getData($request);
        return RolePermission::create($data);
    }

    public function edit($id)
    {
        $decryptId = decrypt($id);
        return RolePermission::find($decryptId);
    }

    public function update($id, Request $request)
    {
        $this->checkValidationData($request);
        $data = $this->getData($request);
        $decryptId = decrypt($id);
        return RolePermission::find($decryptId)->update($data);
    }

    public function delete($id)
    {
        $decryptId = decrypt($id);
        return RolePermission::find($decryptId)->delete();
    }

    protected function checkValidationData($request)
    {
        Validator::make($request->all(), [
            'role_id' => 'required',
            'permission_id' => 'required'
        ], [
            'role_id.required' => "Pls choose One Role.",
            'permission_id.required' => "Pls choose One Permission."
        ])->validate();
    }
    protected function getData($request)
    {
        return
            [
                'role_id' => $request->role_id,
                'permission_id' => $request->permission_id,
            ];
    }
}
