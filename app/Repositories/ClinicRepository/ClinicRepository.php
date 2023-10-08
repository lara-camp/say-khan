<?php

namespace App\Repositories\ClinicRepository;

use App\Models\Clinic;
use App\Repositories\Interfaces\Clinic\ClinicInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClinicRepository implements ClinicInterface
{
    // listing Clinic data
    public function all()
    {
        return Clinic::orderBy('created_at', 'desc')->get();
    }

    // Creating Clinic Data
    public function store(Request $request)
    {
        $this->validateCreateData($request, null);
        $data = $this->getCreateData($request);
        return Clinic::create($data);
    }

    public function edit($id)
    {
        $decryptId = decrypt($id);
        return Clinic::find($decryptId);
    }

    public function delete($id)
    {
        $decryptId = decrypt($id);
        return Clinic::find($decryptId)->delete();
    }

    public function update($id, Request $request)
    {
        $decryptId = decrypt($id);
        $this->validateCreateData($request, $decryptId);
        $data = $this->getCreateData($request);
        return Clinic::find($decryptId)->update($data);
    }

    // exported function
    protected function validateCreateData($request, $clinicId)
    {
        Validator::make($request->all(), [
            'name' => ['required', Rule::unique('clinics', 'name')->ignore($clinicId)],
            'address' => 'required',
        ])->validate();
    }

    protected function getCreateData($request)
    {
        return [
            'name' => $request->name,
            'address' => $request->address,
        ];
    }
}
