<?php

namespace App\Repositories\ClinicRepository;

use App\Models\Clinic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\Clinic\ClinicInterface;

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
        $this->validateCreateData($request);
        $data = $this->getCreateData($request);
        dd($data);
    }

    // exported function
    protected function validateCreateData($request)
    {
        Validator::make($request->all(), [
            'name' => 'required|unique:clinics,name',
            'address' => 'required'
        ])->validate();
    }

    protected function getCreateData($request)
    {
        return [
            'name' => $request->name,
            'address' => $request->address
        ];
    }
}