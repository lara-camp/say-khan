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
        $doctors =$this->doctor->all();
        return view('doctor.index',compact('doctors'));
    }
    // create a new 
    public function create(){
        return view('doctor.create');
    }
    // store the 
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'speciality' => 'required',
            'phone' => 'required|min:9|max:11',
            'email' =>'required',
            'password'=>[
                'required',
                Password::min(6)
                    ->letters()
                    ->numbers()
                    ->mixedCase()
                    ->symbols(),
            ],
            'password_confirmation' => 'required|same:password',
            'address' => 'required',
        ]);
        $data['password'] = Hash::make($data['password']);
        $this->doctor->store($data);
       return redirect()->route('doctor.index')->with('success','successfully create ');
    }
    //read
    public function show(string $id){
        // $doctor =   Doctor::where('id',$id)->first();
       $doctor= $this->doctor->show($id);
        return view('doctor.show',compact('doctor'));
    }
    // edit
    public function edit(string $id){
        // $decryptId =Crypt::decrypt($id);
        $doctor =$this->doctor->edit($id);
        return view('doctor.edit',compact('doctor'));
       
    }
    // Update
    public function update(string $id,Request $request){
        $cleanData= $request->validate([
            'name' => 'required',
            'speciality' => 'required',
            'phone' => 'required|min:9|max:11',
            'email' => 'required',
            'address' => 'required',
        ]);
        $data = [
            'name' =>$request->name,
            'speciality' => $request->speciality,
            'phone' => $request->phone,
            'email' =>$request->email,
           
            'address' => $request->address,
        ];
        $this->doctor->update($data,$id);
        return redirect()->route('doctor.index')->with('success','Update  Successfully');
    }
    // destroy 
    public function destroy(string $id){
            $this->doctor->delete($id);
        return redirect()->route('doctor.index')->with('success','Delete  Successfully');
    }
}
