<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\userTable;
use App\contactsTable;


class DonorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $donors = userTable::SELECT('*')
      -> join('contacts', 'contacts.userID', '=', 'user.userID')
      -> where('usertypeID', '2')
      ->get();

      return view('users.index', compact('donors'));
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
      $donors = userTable::with('contacts')->find($id);
      return view('users.edit', compact('donors'));
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
      $donors = userTable::find($id);
      $donors->username = $request->input('username');
      $donors->firstname = $request->input('firstname');
      $donors->lastname = $request->input('lastname');
      $donors->email = $request->input('firstname');
      $donors->contacts->cellNo = $request->input('cellNo');
      $donors->contacts->tellNo = $request->input('tellNo');
      $donors->birthdate = $request->input('birthdate');
      $donors->city = $request->input('city');
      $donors->street = $request->input('street');
      $donors->barangay = $request->input('barangay');
      $donors->zip = $request->input('zip');

      $donors->push();


    //  dd($donors);
      return redirect('/donors')->with('success', 'Profile updated');
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
