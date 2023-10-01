<?php

namespace App\Repositories\RoleRepository;

use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\Role\RoleInterface;
use Illuminate\Http\Request;

class RoleRepository implements RoleInterface
{
    public function all()
    {
        // Retrieve and return all roles, ordered by creation date in descending order.
        return Role::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        // Validate the request data for creating a role.
        $this->getRoleValidationData($request);

        // Extract role data from the request and create a new role.
        $data = $this->getRoleData($request);
        return Role::create($data);
    }

    public function edit($id)
    {
        // Decrypt the ID parameter and retrieve a specific role for editing.
        $decryptId = decrypt($id);
        return Role::find($decryptId)->first();
    }

    public function update(Request $request, $id)
    {
        // Decrypt the ID parameter.
        $decryptId = decrypt($id);

        // Validate the request data for updating a role.
        $this->getRoleValidationData($request);

        // Extract role data from the request and update the specified role.
        $data = $this->getRoleData($request);
        return Role::find($decryptId)->update($data);
    }

    public function delete($id)
    {
        // Decrypt the ID parameter and delete the specified role.
        $decryptId = decrypt($id);
        return Role::find($decryptId)->delete();
    }

    protected function getRoleValidationData($request)
    {
        // Validate the required fields in the request data.
        Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
        ])->validate();
    }

    protected function getRoleData($request)
    {
        // Extract and prepare the role data from the request.
        return [
            'name' => $request->name,
            'type' => $request->type,
        ];
    }
}
