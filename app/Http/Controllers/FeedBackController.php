<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use App\Repositories\Interfaces\Feedback\FeedBackInterface;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public $feedback;
    public function __construct(FeedBackInterface $feedback)
    {
        $this->feedback = $feedback;
    }
    // View Feedback Create Page
    public function create($id)
    {
        $id = $this->feedback->decrypt($id);
        $feedbacks = $this->feedback->doctorAll($id);
        return view('feedback.create', compact('id', 'feedbacks'));
    }
    // Store feedback
    public function store(Request $request)
    {
        $data = $this->feedback->store($request);
        if ($data) {
            return redirect()->route('doctor.index')->with('success', 'Feedback has been saved');
        } else {
            return redirect()->route('feedback.create')->with('error', 'All the fields have not been inputted!');
        }
    }
    // View Feedback List
    public function list()
    {
        $feedbacks = $this->feedback->all();
        return view('feedback.list', compact('feedbacks'));
    }
    // Delete Feedback
    public function delete($id)
    {
        $this->feedback->delete($id);
        return redirect()->route('feedback.list')->with(['success' => 'Feedback was deleted.']);
    }

}
