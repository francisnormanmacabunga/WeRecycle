<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donor;
use Hash;
use App\Models\Points;
use Auth;
class DonorsPasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:donor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      //$donors = userTable::all();
      //return view('users.password',compact('donors'));
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
      $donors = Donor::find(Auth::user()->userID);
        $width = Points::where('userID',Auth::user()->userID)->first();
      return view('Donor/Profile.updatePass', compact('donors'))->with('width',$width);
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
      'password.min' => 'Password field must be at least 6 characters',
      'password.same' => 'Password does not match',
      'password_confirmation.required' => 'Password Confirmation field is required'
    ]);
      $donors = Donor::find($id);
      $donors->password = Hash::make($request->input('password'));
      $donors->push();

      return redirect('/donor/donors')->with('success','Password updated');
    }

    public function destroy($id)
    {
        //
    }

}
