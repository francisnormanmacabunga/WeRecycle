<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedbacks;

class FeedbacksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:programdirector');
    }

    public function index()
    {
      $feedbacks = Feedbacks::SELECT('*')
      -> join('user', 'user.userID', '=', 'feedback.userID')
      -> sortable()
      -> paginate(10);

      return view('ProgramDirector/Feedbacks.index', compact('feedbacks'));
    }

}
