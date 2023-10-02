<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\Feedback\FeedBackInterface;

class FeedBackController extends Controller
{
    public $feedback;
    public function __construct(FeedBackInterface $feedback) {
        $this->feedback = $feedback;
    }
 
     // Show feedback create page
     public function create($id)
     {
        $id = $this->feedback->decrypt($id);
        $feedbacks = $this->feedback->doctorAll($id);
        return view('feedback.create', compact('id','feedbacks'));
     }

    // Registering feedback
    public function store(Request $request)
    {
        $data = $this->feedback->store($request);
        if($data){
            return redirect()->route('doctor.index')->with('success', 'Feedback has been saved');
        }
        else{
            return redirect()->route('feedback_create')->with('error', 'All the fields have not been inputted!');
        }
    }

    // Show Feedback
    public function show(){
        $feedbacks = $this->feedback->all();
        return view('feedback.show', compact('feedbacks'));
    }
}
