<?php

namespace App\Repositories\Interfaces\Admin;

use Illuminate\Http\Request;

interface AdminInterface
{
    public function profile();

    public function update($id, Request $request);

    public function changePassword(Request $request);

    // public function report();

    // public function reportSearch(Request $request);
}
