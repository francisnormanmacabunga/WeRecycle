<?php

namespace App\Http\Controllers\ActivityCoordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActivityCoordinator;
use Hash;

class ActivityCoordinatorsPasswordController extends Controller
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
        //
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
      $donors = ActivityCoordinator::find($id);
      return view('ActivityCoordinator/Profile.updatePass', compact('donors'));
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
      $this->validate($request, [
      'password' => 'min:6|required_with:password_confirmation|same:password_confirmation|',
      'password_confirmation' => 'required',
      'password' => '12345QWERTqwert@',
      'password' => 'case_diff|numbers|letters|symbols'
    ],
    [
      'password.min' => 'Password field must be at least 8 characters',
      'password.same' => 'Password does not match',
      'password_confirmation.required' => 'Password Confirmation field is required'
    ]);
      $donors = ActivityCoordinator::find($id);
      $donors->password = Hash::make($request->input('password'));
      $donors->push();
      return redirect('activitycoordinator/activity_coordinators')->with('success','Password updated');
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
