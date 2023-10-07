<?php


namespace App\Repositories\DoctorRepository;

use App\Models\Doctor;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rules\Password;
use App\Repositories\Interfaces\Doctor\DoctorInterface;

class DoctorRepository implements DoctorInterface{
    // Store Doctor Data 
    public function store(Request $request){
        $data = $this->validateRegister($request);
        return  Doctor::create($data);
    }
    // Update Doctor Data
    public function update($id, Request $request){
        $data = $this->validateUpdate($request);
        Doctor::where('id',$id)->update($data);
    }
    // Delete Doctor Data
    Public function delete($id){
        $data = $this->decryptId($id);
        return Doctor::find($data)->first()->delete();
    }
    // Decrypt Doctor ID
    public function decryptId($id)
    {
        try {
            $id = Crypt::decrypt($id);
            return Doctor::find($id);
        }
        catch (DecryptException $de){
            abort(404);
        }
    }
    // Validate Data to Store
    public function validateRegister(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'speciality' => 'required',
            'phone' => 'required|min:9|max:11',
            'address' => 'required',
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
        ]);
        $data['password'] = Hash::make($data['password']);
        return $data;
    }
    // Validate Data to Update
    public function validateUpdate(Request $request)
    {
        $data= $request->validate([
            'name' => 'required',
            'speciality' => 'required',
            'phone' => 'required|min:9|max:11',
            'email' => 'required',
            'address' => 'required',
        ]);
        return $data;
    }
}