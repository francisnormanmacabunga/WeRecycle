<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\userTable;
use App\feedbacksTable;
use Auth;

use DB;

class FeedbacksController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:programdirector', ['only'=> [
        'index',
        ]]);

        $this->middleware('auth:donor', ['except'=> [
          'index',
          ]]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    /**  if (request()->has('rating')){
        $feedbacks = feedbackTable::SELECT('*')
        -> join('user', 'feedback.userID', '=', 'user.userID')
        -> sortable()
        -> paginate(5);
      } else {
        $feedbacks = feedbackTable::SELECT('*')
        -> join('user', 'feedback.userID', '=', 'user.userID')

        -> sortable()
        -> paginate(5);
      } */


      $feedbacks = DB::table('feedback')
      -> select('*')
      -> join('user', 'user.userID', '=', 'feedback.userID')
      -> get();
        return view('usersFeedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('usersFeedback.create');
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
      'rating.required' => 'The rating field is required.',
      'rating.min' => 'The rating field must be atleast 1 digit.',
      'rating.max' => 'The rating field must not be more than 1 digit.'
    ]);
      $feedback = new feedbacksTable();
      //$feedback->userID = (Select from user where userID = session('username'))
      $feedback->feedback = $request->input('feedback');
      $feedback->rating = $request->input('rating');
      $feedback->userID = auth()->user()->userID;
      $feedback->save();

      return redirect('/donor')->with('success', 'Thanks for the feedback!');
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

     public function edit($id)
     {

     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {

     }

    public function destroy($id)
    {
        //
    }

}
