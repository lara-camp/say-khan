<?php


namespace App\Repositories\AssistantRepository;

use App\Models\Assistant;
use App\Repositories\Interfaces\Assistant\AssistantInterface;
use Illuminate\Support\Facades\Crypt;

class AssistantRepository implements AssistantInterface{
    public function all(){
        return Assistant::orderby('created_at', 'desc')->get();
    }
    public function store($data){
         return   Assistant::create($data);
    }
    public function show($id){
        $decryptId = Crypt::decrypt($id);
        return Assistant::where('id',$decryptId)->first();
    }
    public function edit($id){
        $decryptId = Crypt::decrypt($id);
        return  Assistant::where('id',$decryptId)->first();  
      }  
    public function update($data, $id){
        return  Assistant::where('id',$id)->update($data);
    }
    Public function delete($id){
        $decryptId = Crypt::decrypt($id);
        return Assistant::where('id',$decryptId)->delete();
    }
}