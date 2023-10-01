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
    public function clinic_doctor_register(ClinicDoctor $id, Request $request){
        $checkDupe = $this->clinicdoctor->check_duplication($request);
        if (!$checkDupe) {
            $this->clinicdoctor->store($request);
            return redirect()->route('clinic_doctor_create')->with('success', 'It has been saved');
        }
        else{
            return redirect()->route('clinic_doctor_create')->with('error', 'There is already a record of the same clinic and doctor');
        }

    }

    //Show Clinic Doctor edit page
    public function show_edit_clinic_doctor($id){
        $clinicdoctors = $this->clinicdoctor->all();
        $id = $this->clinicdoctor->get_id($id);
        return view('Admin.clinicDoctor.edit', compact('clinicdoctors', 'id'));
    }
    //Update Clinic Doctor data
    public function update_clinic_doctor(ClinicDoctor $id, Request $request){
        
        $this->clinicdoctor->update($id, $request);
        return redirect()->route('clinic_doctor_index');

    }
    //Delete Clinic Doctor data
    public function delete_clinic_doctor($id){
        
        $this->clinicdoctor->delete($id);
        return redirect()->route('clinic_doctor_index');
    }    
}