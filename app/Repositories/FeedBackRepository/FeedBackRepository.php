<?php

namespace App\Repositories\FeedBackRepository;

use App\Models\ClinicDoctor;
use App\Models\Doctor;
use App\Models\FeedBack;
use App\Repositories\Interfaces\FeedBack\FeedBackInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FeedBackRepository implements FeedBackInterface
{
    // To pass all clinic doctor data
    public function all()
    {
        return $feedback = FeedBack::all()->paginate(10);
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
        } catch (DecryptException $de) {
            abort(404);
        }
    }
    // Validating and stripping tags out of the data
    public function validateFeedback(Request $request)
    {
        $request['remark'] = strip_tags($request['remark']);
        $request['description'] = strip_tags($request['description']);
        $request['doctor_id'] = strip_tags($request['doctor_id']);
        $request['clinic_id'] = strip_tags($request['clinic_id']);

        return $request->validate([
            'remark' => 'required',
            'description' => 'required',
            'doctor_id' => 'required',
            'clinic_id' => 'nullable',
        ]);
    }

    public function delete($id)
    {
        $decryptId = decrypt($id);
        return FeedBack::find($decryptId)->delete();
    }
}
