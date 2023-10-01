<?php

namespace App\Repositories\PermissionRepository;

use App\Models\Permission;
use App\Repositories\Interfaces\Permission\PermissionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionRepository implements PermissionInterface
{
    public function all()
    {
        return Permission::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $this->getValidationCheck($request);
        $data = $this->getData($request);
        return Permission::create($data);
    }

    public function edit($id)
    {
        $decryptId = decrypt($id);
        return Permission::find($decryptId);
    }

    public function update($id, Request $request)
    {
        $decryptId = decrypt($id);
        $this->getValidationCheck($request);
        $data = $this->getData($request);
        return Permission::find($decryptId)->update($data);
    }

    protected function getValidationCheck($request)
    {
        Validator::make($request->all(), [
            'key' => 'required',
            'value' => 'required',
        ])->validate();
    }

    protected function getData($request)
    {
        return [
            'key' => $request->key,
            'value' => $request->value
        ];
    }
}
