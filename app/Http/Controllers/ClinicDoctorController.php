<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\ClinicDoctor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Repositories\Interfaces\ClinicDoctor\ClinicDoctorInterface;

class ClinicDoctorController extends Controller
{
    public $clinicdoctor;
    public function __construct(ClinicDoctorInterface $clinicdoctor) {
        $this->clinicdoctor = $clinicdoctor;
    }
    // Show Clinic Doctor doctor home page
    public function index()
    {
        $clinicdoctors = $this->clinicdoctor->all();
        return view('Admin.clinicDoctor.index', compact('clinicdoctors'));
    }

    // Show Clinic Doctor create page
    public function create()
    {
        $clinicdoctors = $this->clinicdoctor->all();
        return view('Admin.clinicDoctor.create', compact('clinicdoctors'));
    }

    // Registering Clinic Doctor
    public function store(ClinicDoctor $id, Request $request){
        $checkDupe = $this->clinicdoctor->checkDuplication($request);
        if (!$checkDupe) {
            $this->clinicdoctor->store($request);
            return redirect()->route('clinicDoctor.create')->with('success', 'It has been saved');
        }
        else{
            return redirect()->route('clinicDoctor.create')->with('error', 'There is already a record of the same clinic and doctor');
        }
    }
    //Show Clinic Doctor edit page
    public function edit($id){
        $clinicdoctors = $this->clinicdoctor->all();
        $id = $this->clinicdoctor->decryptId($id);
        return view('Admin.clinicDoctor.edit', compact('clinicdoctors', 'id'));
    }
    //Update Clinic Doctor data
    public function update(ClinicDoctor $id, Request $request){
        
        $this->clinicdoctor->update($id, $request);
        return redirect()->route('clinicDoctor.index');

    }
    //Delete Clinic Doctor data
    public function delete($id){
        
        $this->clinicdoctor->delete($id);
        return redirect()->route('clinicDoctor.index');
    }    
}