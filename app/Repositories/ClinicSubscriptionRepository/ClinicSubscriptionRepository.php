<?php

namespace App\Repositories\ClinicSubscriptionRepository;

use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\ClinicDoctor;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\ClinicSubscription;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Repositories\Interfaces\ClinicSubscription\ClinicSubscriptionInterface;

class ClinicSubscriptionRepository implements ClinicSubscriptionInterface
{
    // To pass all clinic doctor data
    public function all()
    {
        $clinicsubscription = ClinicSubscription::orderBy('created_at', 'desc')->get();
        return compact('clinicsubscription');
    }
    // To pass neccessary data to buy subscription
    public function subData($id)
    {
        $subscription = Subscription::all();
        $clinicdoctor = ClinicDoctor::where('doctor_id', $id->id)->get();
        return compact('subscription', 'clinicdoctor');
    }
    // Storing the Clinic Subscription data
    public function store(Request $request)
    {
        $data = $this->validateInput($request);
        return ClinicSubscription::create($data);
    }

    // Decrypting and Finding the passed Doctor ID
    public function decryptDoctorId($id)
    {
        try {
            $id = Crypt::decrypt($id);
            return Doctor::find($id);
        }
        catch (DecryptException $de){
            abort(404);
        }
    }
    
    // Update the data
    public function accept($id)
    {
        $decryptId = Crypt::decrypt($id);
        $data = ClinicSubscription::find($decryptId);
        $data->update(['status' => 2]);
    }

    // Delete the data
    public function delete($id)
    {
        $decryptId = Crypt::decrypt($id);
        return ClinicSubscription::find($decryptId)->delete();
    }

    // Validating and stripping tags out of the data
    public function validateInput(Request $request)
    {
        $request['clinic_id'] = strip_tags($request['clinic_id']);
        $request['subscription_id'] = strip_tags($request['subscription_id']);
        $request['doctor_id'] = strip_tags($request['doctor_id']);

        return $request->validate([
            'clinic_id' => 'required|unique:clinic_subscriptions',
            'subscription_id' => 'required',
            'doctor_id' => 'required',
        ],[
            'clinic_id.unique' => 'There is already an ongoing subscription for this clinic.',
        ]);
    }

     // Checking data duplication
    public function checkDuplication(Request $request)
    {
        return ClinicSubscription::where('clinic_id', $request['clinic_id'])
        ->where('subscription_id', $request['subscription_id'])
        ->first();
    }
}