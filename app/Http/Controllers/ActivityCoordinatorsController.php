<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usertypeTable;
use App\userTable;
use App\contactsTable;
use DB;

class ActivityCoordinatorsController extends Controller
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
      -> where('usertypeID', '3')
      -> get();
      return view('activity_coordinators.index', compact('donors'));

      
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
      return view('activity_coordinators.edit', compact('donors'));
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
      'firstname' => 'regex:/^[\pL\s]+$/u',
      'lastname' => 'regex:/^[\pL\s]+$/u',
      'email' => "unique:user,email,$id".$request->get('userID').',userID',
      'cellNo' => 'min:11|max:11',
      'tellNo' => 'min:7|max:7',
      'city' => 'regex:/^[\pL\s]+$/u',
      'street' => 'nullable|regex:/^[ \w.#-]+$/',
      'barangay' => 'nullable|regex:/^[ \w.#-]+$/',
      'zip' => 'nullable|min:4|max:4',
      'username' => "alpha_dash|unique:user,username,$id".$request->get('userID').',userID',
    ],
    [
      //'firstname.required' => 'The First Name field is required.',
      'firstname.regex' => 'The First Name field must only contain letters.',
      //'lastname.required' => 'The Last Name field is required.',
      'lastname.regex' => 'The Last Name field must only contain letters.',
      //'email.required' => 'The Email field is required.',
      'email.unique' => 'The Email you registered is already in use.',
      //'cellNo.required' => 'The Cellphone Number is required.',
      //'tellNo.required' => 'The Telephone Number is required.',
      'cellNo.min' => 'The Cellphone field must be at least 11 characters.',
      'cellNo.max' => 'The Cellphone field may not be greater than 11 characters.',
      'tellNo.min' => 'The Telephone field must be at least 7 characters.',
      'tellNo.max' => 'The Telephone field may not be greater than 7 characters.',
      //'birthdate.required' => 'The Birthdate field is required.',
      //'city.required' => 'The City field is required.',
      'city.regex' => 'The City field must only contain letters.',
      'street.regex' => 'The Street field must only contain letters, numbers, underscores, dashes, hypens and hashes.',
      'barangay.regex' => 'The Barangay field must only contain letters, numbers, underscores, dashes, hypens and hashes.',
      'zip.min' => 'The Zip field must be at least 4 characters.',
      'zip.max' => 'The Zip field may not be greater than 4 characters.',
      'username.unique' => 'The Username you registered is already in use.',
      //'username.required' => 'The Username field is required.',
      'username.alpha_dash' => 'The Username may only contain letters, numbers, dashes and underscores.'
    ]);
      $donors = userTable::find($id);
      $donors->username = $request->input('username');
      $donors->firstname = $request->input('firstname');
      $donors->lastname = $request->input('lastname');
      $donors->email = $request->input('email');
      $donors->contacts->cellNo = $request->input('cellNo');
      $donors->contacts->tellNo = $request->input('tellNo');
      $donors->birthdate = $request->input('birthdate');
      $donors->city = $request->input('city');
      $donors->street = $request->input('street');
      $donors->barangay = $request->input('barangay');
      $donors->zip = $request->input('zip');
      $donors->push();
      return redirect('/activity_coordinators')->with('success','Profile updated');
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
