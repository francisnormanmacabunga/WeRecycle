<?php

namespace App\Http\Controllers\ActivityCoordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Volunteer;

class ApplicantsController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:activitycoordinator');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      if (request()->has('status')){
      $applicants = Volunteer::orderBy('updated_at', 'desc')
      -> join('contacts', 'contacts.volunteerID', '=', 'volunteer.volunteerID')
      -> where('status',request('status'))
      -> where('usertypeID', '2')
      -> sortable()
      -> paginate(10)->appends('status', request('status'));
    } else {
      $applicants = Volunteer::orderBy('updated_at', 'desc')
      -> join('contacts', 'contacts.volunteerID', '=', 'volunteer.volunteerID')
      -> where('usertypeID', '2')
      -> sortable()
      -> paginate(10);
    }
      return view('ActivityCoordinator/ManageApplicants.index', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
      $applicants = Volunteer::find($id);
      return view('ActivityCoordinator/ManageApplicants.edit', compact('applicants'));
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
      $vol = Volunteer::find($id);
      $volqty = Volunteer::SELECT('*')
      -> where('status','Activated')
      ->get();
        //dd(count($volqty));
        //if(count($volqty) == 10){
        if ($vol->status == 'Activated' || $vol->status == 'Deactivated') {

          if(count($volqty) > 9){
            session()->flash('notif','There is enough volunteers for this month');
            return back();

      }else {
        $post = Volunteer::find($id);
        $post->status = $request->input('status');
        $post->save();
        return redirect('/activitycoordinator/applicants')->with('success', 'Profile updated');
      }

        }
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
