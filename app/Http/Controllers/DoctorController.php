<?php

namespace App\Http\Controllers;

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
        return view('doctor.index');
    }
    // create a new 
    public function create(){
        return view('doctor.create');
    }
    // store the 
    public function store(Request $request)
    {
        $this->doctor->store($data);
        return redirect()->route('doctor.index')->with('success','successfully create ');
    }
    //read
    public function show_buy_subscription(string $id){
        $buysub= $this->doctor->get_buy_subscription_data($id);
        return view('doctor.show',compact('buysub'));
    }
    public function buy_subscription(string $id){
        $this->doctor->buy_subscription($id);
        return redirect()->route('doctor.index')->with('success','The subscription has been bought for the clinic');
    }
    // edit
    public function edit(string $id){
        $doctor =$this->doctor->edit($id);
        return view('doctor.edit',compact('doctor'));
    }
    // Update
    public function update(string $id,Request $request){
        $this->doctor->update($data,$id);
        return redirect()->route('doctor.index')->with('success','Update  Successfully');
    }

    // destroy 
    public function destroy(string $id){
        $this->doctor->delete($id);
        return redirect()->route('doctor.index')->with('success','Delete  Successfully');
    }
}
