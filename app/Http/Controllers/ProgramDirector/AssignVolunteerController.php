<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Volunteer;
use App\Models\Employee;

class AssignVolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ProgramDirector/ManageVolunteers.assignVolunteer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $volunteer = new Volunteer();
      $volunteer->volunteerName = $request->input('volunteer');
      $volunteer->save();

      return redirect('/programdirector/requests');
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
        /*$transaction = Transaction::find($id);
        $volunteer = Employee::where('usertypeID','2')->pluck('firstname', 'userID');
        return view('ProgramDirector/ManageVolunteers.assignVolunteer', compact('transaction', 'volunteer'));*/
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
      /*  $assignVolunteer = Transaction::find($id);
        $assignVolunteer->volunteerID = $request->input('volunteer');
        $assignVolunteer->save();
        return redirect('/programdirector/requests')->with('success', 'Profile updated'); */
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
