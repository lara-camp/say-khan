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
    // View Clinic Subscription Index Page
    public function index()
    {
        $clinicsubscriptions = $this->clinicsubscription->all();
        return view('subscriptionBuy.index', compact('clinicsubscriptions'));
    }
    // View Clinic Subscription Create Page
    public function create($id)
    {
        $id = $this->clinicsubscription->decryptDoctorId($id);
        $clinicsubscriptions = $this->clinicsubscription->subData($id);
        return view('subscriptionBuy.create', compact('id','clinicsubscriptions'));
    }
    // Store Clinic Subscription Data
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
    // View Clinic Subscription Edit Page
    public function edit($id){
        $clinicsubscriptions = $this->clinicsubscription->all();
        $id = $this->clinicsubscription->decryptClinicSubscriptionId($id);
        return view('Admin.clinicDoctor.edit', compact('clinicsubscriptions', 'id'));
    }
    //Update Clinic Subscription Data
    public function update($id, Request $request){
        $this->clinicsubscription->update($id, $request);
        return redirect()->route('clinicSubscription.index');
    }
    //Delete Clinic Subscription Data
    public function delete($id){
        $this->clinicsubscription->delete($id);
        return redirect()->route('clinicSubscription.index');
    }  
}
