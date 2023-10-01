<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Repositories\Interfaces\Subscription\SubscriptionInterface;

class SubscriptionController extends Controller
{
    public $subscription;
    public function __construct(SubscriptionInterface $subscriptionInterface)
    {
        $this->subscription = $subscriptionInterface;
    }

    public function index()
    {
        $subscriptions = $this->subscription->all();
        return view('Admin.subscription.index', compact('subscriptions'));
    }

    public function create()
    {
        return view('Admin.subscription.create');
    }

    public function store(Request $request)
    {
        $this->subscription->store($request);
        return redirect()->route('admin.subIndex')->with(['success' => 'Subscripition was successfully created.']);
    }

    public function edit($id)
    {
        $data = $this->subscription->edit($id);
        return view('Admin.subscription.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $this->subscription->update($id, $request);
        return redirect()->route('admin.subIndex')->with(['success' => 'Subscription was successfully updated']);
    }

    public function delete($id)
    {
        $this->subscription->delete($id);
        return back()->with(['success' => 'Successfully Deleted.']);
    }
}
