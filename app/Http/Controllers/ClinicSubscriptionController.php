<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicSubscription;
use App\Repositories\Interfaces\ClinicSubscription\ClinicSubscriptionInterface;

class ClinicSubscriptionController extends Controller
{
    public $clinicsubscription;
    public function __construct(ClinicSubscriptionInterface $clinicsubscription) {
        $this->clinicsubscription = $clinicsubscription;
    }
    // Show Clinic Doctor doctor home page
    public function index()
    {
        $clinicsubscriptions = $this->clinicsubscription->all();
        return view('subscriptionBuy.index', compact('clinicsubscriptions'));
    }

    // Show Clinic Doctor create page
    public function create($id)
    {
        $id = $this->clinicsubscription->decryptDoctorId($id);
        $clinicsubscriptions = $this->clinicsubscription->subData($id);
        return view('subscriptionBuy.create', compact('id','clinicsubscriptions'));
    }

    // Registering Clinic Doctor
    public function store(Request $request){
        $checkDupe = $this->clinicsubscription->checkDuplication($request);
        if (!$checkDupe) {
            $this->clinicsubscription->store($request);
            return redirect()->route('doctor.index')->with('success', 'It has been saved');
        }
        else{
            return redirect()->route('doctor.index')->with('error', 'The clinic is already on a subscription');
        }
    }

    //Show Clinic Doctor edit page
    public function edit($id){
        $clinicsubscriptions = $this->clinicsubscription->all();
        $id = $this->clinicsubscription->decryptClinicSubscriptionId($id);
        return view('Admin.clinicDoctor.edit', compact('clinicsubscriptions', 'id'));
    }
    //Update Clinic Doctor data
    public function accept($id){
        $this->clinicsubscription->accept($id);
        return redirect()->route('clinic_subscription_index');
    }
    //Delete Clinic Doctor data
    public function delete($id){
        $this->clinicsubscription->delete($id);
        return redirect()->route('clinic_subscription_index');
    }  
}
