<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedbacks;

class FeedbacksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:donor');
    }

    public function create()
    {
      return view('Donor/Feedbacks.create');
    }

    public function sendFeedback(Request $request)
    {
      $this->validate($request, [
      'feedback' => 'nullable|regex:/^[a-zA-Z-.!, ]*$/',
      'rating' => 'required|integer|between:1,5',
    ],
    [
      'rating.required' => 'The rating field is required.',
      'feedback.regex' => 'Feedback must only contain letters and period, exclamation mark, hyphen, and comma.',
    ]);
    session()->flash('notif','Thanks for the feedback!');
      $feedback = new Feedbacks();
      //$feedback->userID = (Select from user where userID = session('username'))
      $feedback->feedback = $request->input('feedback');
      $feedback->rating = $request->input('rating');
      $feedback->userID = auth()->user()->userID;
      $feedback->save();

      return back();
    }

}
