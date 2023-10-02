<?php


namespace App\Repositories\FeedBackRepository;

use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\FeedBack;
use App\Models\ClinicDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rules\Password;
use App\Repositories\Interfaces\FeedBack\FeedBackInterface;

class FeedBackRepository implements FeedBackInterface{
    // To pass all clinic doctor data
    public function all()
    {
        return $feedback = FeedBack::all();
    }
    // Pass doctor related data
    public function doctorAll($id)
    {
        $clinicdoctor = ClinicDoctor::where('doctor_id', $id->id)->get();
        return compact('clinicdoctor');
    }
    // Storing the Clinic Doctor data
    public function store(Request $request)
    {
        $data = $this->validateFeedback($request);
        return FeedBack::create($data);
    }
    // Decrypting and Finding the passed ID
    public function decrypt($id)
    {
        try {
            $id = Crypt::decrypt($id);
            return Doctor::find($id);
        }
        catch (DecryptException $de){
            abort(404);
        }
    }
    // Validating and stripping tags out of the data
    public function validateFeedback(Request $request)
    {
        $request['remark'] = strip_tags($request['remark']);
        $request['description'] = strip_tags($request['description']);
        $request['status'] = strip_tags($request['status']);
        $request['doctor_id'] = strip_tags($request['doctor_id']);
        $request['clinic_id'] = strip_tags($request['clinic_id']);

        return $request->validate([
            'remark' => 'required',
            'description' => 'required',
            'status' => 'required',
            'doctor_id' => 'required',
            'clinic_id' => 'nullable',
        ]);
    }
}