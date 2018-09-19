<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\userTable;
use App\feedbackTable;
use DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (request()->has('username')){
        $feedback = feedbackTable::SELECT('*')
        -> join('user', 'feedback.userID', '=', 'user.userID')
        -> sortable()
        -> paginate(5);
      } else {
        $feedback = feedbackTable::SELECT('*')
        -> join('user', 'feedback.userID', '=', 'user.userID')

        -> sortable()
        -> paginate(5);
      }

        return view('usersFeedback.indexFeedback', compact('feedback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('usersFeedback.createFeedback');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
      'feedback' => 'nullable',
      'rating' => 'required|min:1|max:1'
    ],
    [
      'rating.required' => 'The rating field is required.'
    ]);
      $feedback = new feedbackTable();
      $feedback->userID = $request->input('userID');
      $feedback->firstname = $request->input('feedback');
      $feedback->rating = $request->input('rating');

      $feedback->save();
      return redirect('/indexAdmin')->with('success', 'Thanks for the feedback!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
