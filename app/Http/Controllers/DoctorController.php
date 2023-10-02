<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Repositories\Interfaces\Doctor\DoctorInterface;

class DoctorController extends Controller
{
    public $doctor;
    public function __construct(DoctorInterface $doctor)
    {
        $this->doctor = $doctor;
    }
    public function index(){
        $doctors = Doctor::all();
        return view('doctor.index', compact('doctors'));
    }
    // create a new 
    public function create(){
        return view('doctor.create');
    }
    // store the 
    public function store(Request $request)
    {
        $this->doctor->store($request);
        return redirect()->route('doctor.index')->with('success','successfully create ');
    }
    // edit
    public function edit($id){
        $doctor = $this->doctor->decrypt_doctor_id($id);
        return view('doctor.edit',compact('doctor'));
    }
    // Update
    public function update($id, Request $request){
        $this->doctor->update($id, $request);
        return redirect()->route('doctor.index')->with('success','Update  Successfully');
    }

    // destroy 
    public function destroy($id){
        $this->doctor->delete($id);
        return redirect()->route('doctor.index')->with('success','Delete  Successfully');
    }

    //read
    public function show_buy_subscription($id){
        $buysub= $this->doctor->get_buy_subscription_data($id);
        return view('doctor.show',compact('buysub'));
    }
    public function buy_subscription($id){
        $this->doctor->buy_subscription($id);
        return redirect()->route('doctor.index')->with('success','The subscription has been bought for the clinic');
    }
}
