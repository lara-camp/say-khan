<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Repositories\Interfaces\Assistant\AssistantInterface;

class AssistantController extends Controller
{
    public $assistant;
    public function __construct(AssistantInterface $assistant)
    {
        $this->assistant = $assistant;
    }
    public function index(){
        $assistants =$this->assistant->all();
        return view('assistant.index',compact('assistants'));
    }
    // create 
    public function create(){
        return view('assistant.create');
    }
    // store the data
    public function store(Request $request)
        {
        {
            $data = $request->validate([
                'name' => 'required',
                'phone' =>  'required|min:9|max:11',
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
        $this->assistant->store($data);
        return redirect()->route('assistant.index')->with('success','successfully create ');
        }
    }
    //read
    public function show(string $id){
      $assistant =  $this->assistant->show($id);
        return view('assistant.show',compact('assistant'));
    }
    // edit

    public function edit(string $id){
        $assistant =$this->assistant->edit($id);
        return view('assistant.edit',compact('assistant'));
    }
    // Update
    public function update(string $id,Request $request){
        $cleanData = $request->validate([
            'name' => 'required',
            'phone' =>  'required|max:11|min:9',
            'email' =>'required',
            'address' => 'required',
        ]);
        $data= [
            'name' => $request->name,
            'phone' =>  $request->phone,
            'email' => $request->email,
            'address' =>  $request->address,
        ];
        $this->assistant->update($data,$id);
        return redirect()->route('assistant.index')->with('success','Update  Successfully');
    }
    // destroy 
    public function destroy(string $id){
        $this->assistant->delete($id);
        return redirect()->route('assistant.index')->with('success','Delete  Successfully');
    
    }   
}
