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
      'feedback' => 'nullable',
      'rating' => 'required|min:1|max:1'
    ],
    [
      'rating.required' => 'The rating field is required.',
      'rating.min' => 'The rating field must be atleast 1 digit.',
      'rating.max' => 'The rating field must not be more than 1 digit.'
    ]);
      $feedback = new Feedbacks();
      //$feedback->userID = (Select from user where userID = session('username'))
      $feedback->feedback = $request->input('feedback');
      $feedback->rating = $request->input('rating');
      $feedback->userID = auth()->user()->userID;
      $feedback->save();

      return redirect('/donor')->with('success', 'Thanks for the feedback!');
    }

}
