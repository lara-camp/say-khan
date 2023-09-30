<?php


namespace App\Repositories\DoctorRepository;

use App\Models\Doctor;
use App\Repositories\Interfaces\Doctor\DoctorInterface;
use Illuminate\Support\Facades\Crypt;

class DoctorRepository implements DoctorInterface{
    public function all(){
        return Doctor::orderby('created_at', 'desc')->get();
    }
    public function store($data){
       return  Doctor::create($data);
    }
    public function show($id){
        $decryptId = Crypt::decrypt($id);
        return Doctor::where('id',$decryptId)->first();
    }
    public function edit($id){
        $decryptId = Crypt::decrypt($id);
        return  Doctor::where('id',$decryptId)->first();  
      }  
    public function update($data, $id){
        return  Doctor::where('id',$id)->update($data);
    }
    Public function delete($id){
        $decryptId = Crypt::decrypt($id);
        return Doctor::where('id',$decryptId)->delete();
    }
}