<?php


namespace App\Repositories\AssistantRepository;

use App\Models\Assistant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Repositories\Interfaces\Assistant\AssistantInterface;

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

    public function changePassword(Request $request)
    {
        $this->checkPasswordValidation($request);
        $currentAssistant = Auth::guard('assistant')->user();
        $currentId = $currentAssistant->id;
        $currentAssistantPassword = $currentAssistant->password;
        if (Hash::check($request->oldPassword, $currentAssistantPassword)) {
            $data = ['password' => Hash::make($request->newPasswordConfirm)];
            Assistant::find($currentId)->update($data);
            return back()->with(['success' => 'Password was updated.']);
        }
        return back()->withErrors(['oldPassword' => 'Current Password is not incorrect.']);
    }

    protected function checkPasswordValidation($request)
    {
        $rules = [
            'oldPassword' => 'required|min:6',
            'newPassword' => ['required',
                Password::min(6)
                    ->letters()
                    ->numbers()
                    ->mixedCase()
                    ->symbols()],
            'newPasswordConfirm' => 'required|same:newPassword',
        ];
        $messages = [
            'oldPassword.required' => "Old Password must be filled.",
            'newPassword.required' => "New Password must be Filled.",
            'newPassword.min' => 'The password must be at least :min characters long and must contain at least one letter, one number, one capitalized letter, and one special character.',
            'newPasswordConfirm.required' => "New Password Confirmation must be Filled.",
        ];
        Validator::make($request->all(), $rules, $messages)->validate();
    }
}