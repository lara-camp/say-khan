<?php
namespace App\Repositories\Interfaces\Feedback;

use Illuminate\Http\Request;

interface FeedBackInterface
{
    public function all();

    public function store(Request $request);

    public function decrypt($id);

    public function validateFeedback(Request $request);

    public function delete($id);

}
