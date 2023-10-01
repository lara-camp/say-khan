<?php


namespace App\Repositories\DoctorRepository;

use App\Models\Doctor;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Repositories\Interfaces\Doctor\DoctorInterface;

class DoctorRepository implements DoctorInterface{
    // Retrieve all doctor data in a descending order of creation
    // public function all($id){
        
    // }
    // Store doctor data 
    public function store(){
        $data = $this->register_validation($request);
        return  Doctor::create($data);
    }

    // Fetch Doctor data to edit
    public function edit($id){
        $decryptId = $this->decrypt_doctor_id($id);
        $doctor = Doctor::where('id', $decryptId)->first();
        return  compact('doctor');
    } 
    // Update Doctor data
    public function update($data, $id){
        $data = $this->update_validation($request);
        return  Doctor::where('id',$id)->update($data);
    }
    // Delete Doctor data
    Public function delete($id){
        $decryptId = $this->decrypt_doctor_id($id);
        return Doctor::where('id',$decryptId)->delete();
    }
    // Retrieve data neccessary to buy subscription
    public function get_buy_subscription_data($id){
        $decryptId = $this->decrypt_doctor_id($id);
        $doctor = Doctor::where('id', $decryptId)->first();
        $clinicdoctor = ClinicDoctor::where('doctor_id', $decryptId)->first();
        $clinic = Clinic::where('id',$clinicdoctor->clinic_id);
        $subscription = Subscription::all();
        return compact('doctor', 'clinicdoctor', 'clinic', 'subscription');
    }
    // Retrieve data neccessary to buy subscription
    public function buy_subscription($id){
        $data = $request->validate([
            'subscription_id' => 'required'
        ]);
        return  Clinic::where('id',$id)->update($data);
    }
    // Decrypt doctor id
    public function decrypt_doctor_id($id)
    {
        try {
            $id = Crypt::decrypt($id);
            return Doctor::find($id)->first();
        }
        catch (DecryptException $de){
            abort(404);
        }
    }
    // Retrieve data neccessary to buy subscription
    public function register_validation($id){
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
    }

    public function update_validation(Request $request)
    {
        $cleanData= $request->validate([
            'name' => 'required',
            'speciality' => 'required',
            'phone' => 'required|min:9|max:11',
            'email' => 'required',
            'address' => 'required',
        ]);
    }
}