<?php

namespace App\Repositories\SubscriptionRepository;

use App\Models\Subscription;
use App\Repositories\Interfaces\Subscription\SubscriptionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionRepository implements SubscriptionInterface
{
    public function all()
    {
        // Retrieve all subscriptions and order them by creation date in descending order
        return Subscription::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        // Check and validate the incoming request data
        $this->checkValidationData($request);

        // Extract and prepare the data from the request
        $data = $this->getData($request);

        // Create a new subscription record and return it
        return Subscription::create($data);
    }

    public function edit($id)
    {
        // Decrypt the given ID and find the corresponding subscription
        $decryptId = decrypt($id);
        return Subscription::find($decryptId);
    }

    public function update($id, Request $request)
    {
        // Decrypt the given ID to find the corresponding subscription
        $decryptId = decrypt($id);

        // Check and validate the incoming request data
        $this->checkValidationData($request);

        // Extract and prepare the data from the request
        $data = $this->getData($request);

        // Find the subscription by ID, update it with the new data, and return the result
        return Subscription::find($decryptId)->update($data);
    }

    public function delete($id)
    {
        // Decrypt the given ID to find the corresponding subscription
        $decryptId = decrypt($id);

        // Find the subscription by ID and delete it
        return Subscription::find($decryptId)->delete();
    }

    protected function checkValidationData($request)
    {
        // Validate the request data based on specific rules (plan, duration, fee)
        Validator::make($request->all(), [
            'plan' => 'required',
            'duration' => 'required',
            'fee' => 'required|numeric|digits_between:1,10'
        ])->validate();
    }

    protected function getData($request)
    {
        // Extract and return the relevant data from the request
        return [
            'plan' => $request->plan,
            'duration' => $request->duration,
            'fee' => $request->fee,
        ];
    }
}
