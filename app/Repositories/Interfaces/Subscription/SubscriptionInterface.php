<?php

namespace App\Repositories\Interfaces\Subscription;

use Illuminate\Http\Request;

interface SubscriptionInterface
{
    public function all();

    public function store(Request $request);

    public function edit($id);

    public function update($id, Request $request);

    public function delete($id);
}
