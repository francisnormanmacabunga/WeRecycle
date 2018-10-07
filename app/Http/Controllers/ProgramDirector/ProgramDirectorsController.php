<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProgramDirector;
use Auth;

class ProgramDirectorsController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:programdirector');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      /*$donors = userTable::SELECT('*')
      -> join('contacts', 'contacts.userID', '=', 'user.userID')
      -> where('usertypeID', '4')
      -> get();*/
      $donors =  Auth::user();
      return view('ProgramDirector.index')->with(['donors' =>$donors]);
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
      $donors = ProgramDirector::with('contacts')->find($id);
      return view('ProgramDirector.edit', compact('donors'));
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
      'cellNo' => 'min:13|max:13|regex:/^\+63[0-9]{10}$/',
      'tellNo' => 'min:7|max:7',
      'city' => 'regex:/^[\pL\s]+$/u',
      'street' => 'nullable|regex:/^[ \w.#-]+$/',
      'barangay' => 'nullable|regex:/^[ \w.#-]+$/',
      'zip' => 'nullable|min:4|max:4',
      'username' => "alpha_dash|unique:user,username,$id".$request->get('userID').',userID',
    ],
    [
      'firstname.regex' => 'The First Name field must only contain letters.',
      'lastname.regex' => 'The Last Name field must only contain letters.',
      'email.unique' => 'The Email you registered is already in use.',
      'cellNo.min' => 'The Cellphone field must be at least 13 characters.',
      'cellNo.max' => 'The Cellphone field may not be greater than 13 characters.',
      'cellNo.regex' => 'Incorrect cellphone number format (e.g +63XXXXXXXXXX)',
      'tellNo.min' => 'The Telephone field must be at least 7 characters.',
      'tellNo.max' => 'The Telephone field may not be greater than 7 characters.',
      'city.regex' => 'The City field must only contain letters.',
      'street.regex' => 'The Street field must only contain letters, numbers, underscores, dashes, hypens and hashes.',
      'barangay.regex' => 'The Barangay field must only contain letters, numbers, underscores, dashes, hypens and hashes.',
      'zip.min' => 'The Zip field must be at least 4 characters.',
      'zip.max' => 'The Zip field may not be greater than 4 characters.',
      'username.unique' => 'The Username you registered is already in use.',
      'username.alpha_dash' => 'The Username may only contain letters, numbers, dashes and underscores.'
    ]);
      $donors = ProgramDirector::find($id);
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
      return redirect('/programdirector/program_directors')->with('success','Profile updated');
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
