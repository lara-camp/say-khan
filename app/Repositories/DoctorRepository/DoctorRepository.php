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
        $id = $this->decryptId($id);
        $this->validateUpdate($request);
        $image = $this->storeImage($request);
        $data = $this->getDoctorData($request, $image);
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
    // Store Doctor Images
    private function storeImage(Request $request)
    {
        $image =$request->file('image');
        if ($image != null){ 
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/Doctor'), $new_name);
            $image_file = "/storage/Doctor/" . $new_name;
            return compact('image_file');
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
    // Fetch Doctor  Data
    protected function getDoctorData($request, $image)
    {
        $data = [
            'name' => $request->name,
            'speciality' => $request->speciality,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'image' => $image['image_file'] ?? null,
        ];
        $filteredData = array_filter($data, function ($value) {
            return $value !== null;
        });
        return $filteredData;
    }
}