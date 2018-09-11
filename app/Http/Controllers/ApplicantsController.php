<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userTable;
use App\contactsTable;
use DB;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$applicants = userTable::all();
      //$contacts = contactsTable::all();
      //$applicants = DB:: select ('SELECT * FROM user INNER JOIN contacts ON user.userID = contacts.userID');
      //$applicants = DB::table('user')
      //->select('*')
      //->join('contacts', 'contacts.userID', '=', 'user.userID')
      //->get();
      //$applicants = userTable::paginate(5);

    if (request()->has('status')){
      $applicants = userTable::SELECT('*')
      -> join('contacts', 'contacts.userID', '=', 'user.userID')
      -> where('status',request('status'))
      -> where('usertypeID', '1')
      -> sortable()
      -> paginate(5)->appends('status', request('status'));
    } else {
      $applicants = userTable::SELECT('*')
      -> join('contacts', 'contacts.userID', '=', 'user.userID')
      -> where('usertypeID', '1')
      -> sortable()
      -> paginate(5);
    }

      return view('applicants.index', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applicants.create');
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
      'firstname' => 'required|regex:/^[\pL\s]+$/u',
      'lastname' => 'required|regex:/^[\pL\s]+$/u',
      'email' => 'required|unique:user',
      'cellNo' => 'required|min:11|max:11',
      'tellNo' => 'required|min:7|max:7',
      'birthdate' => 'required',
      'city' => 'required|regex:/^[\pL\s]+$/u',
      'street' => 'nullable|regex:/^[ \w.#-]+$/',
      'barangay' => 'nullable|regex:/^[ \w.#-]+$/',
      'zip' => 'nullable|min:4|max:4',
      'username' => 'required|alpha_dash|unique:user'
    ],
    [
      'firstname.required' => 'The First Name field is required.',
      'firstname.regex' => 'The First Name field must only contain letters.',
      'lastname.required' => 'The Last Name field is required.',
      'lastname.regex' => 'The Last Name field must only contain letters.',
      'email.required' => 'The Email field is required.',
      'email.unique' => 'The Email you registered is already in use.',
      'contact.required' => 'The Contact field is required.',
      'cellNo.min' => 'The Cellphone field must be at least 11 characters.',
      'cellNo.max' => 'The Cellphone field may not be greater than 11 characters.',
      'tellNo.min' => 'The Telephone field must be at least 7 characters.',
      'tellNo.max' => 'The Telephone field may not be greater than 7 characters.',
      'birthdate.required' => 'The Birthdate field is required.',
      'city.required' => 'The City field is required.',
      'city.regex' => 'The City field must only contain letters.',
      'street.regex' => 'The Street field must only contain letters, numbers, underscores, dashes, hypens and hashes.',
      'barangay.regex' => 'The Barangay field must only contain letters, numbers, underscores, dashes, hypens and hashes.',
      'zip.min' => 'The Zip field must be at least 4 characters.',
      'zip.max' => 'The Zip field may not be greater than 4 characters.',
      'username.unique' => 'The Username you registered is already in use.',
      'username.required' => 'The Username field is required.',
      'username.alpha_dash' => 'The Username may only contain letters, numbers, dashes and underscores.'
    ]);
      $user = new userTable();
      $user->firstname = $request->input('firstname');
      $user->lastname = $request->input('lastname');
      $user->email = $request->input('email');
      $user->birthdate = $request->input('birthdate');
      $user->city = $request->input('city');
      $user->street = $request->input('street');
      $user->barangay = $request->input('barangay');
      $user->zip = $request->input('zip');
      $user->username = $request->input('username');
      $user->usertypeID = $request->input('usertypeID');
      $user->password = bcrypt($request->input('password'));
      $user->status = $request->input('status');
      $user->save();

      $contacts = new contactsTable();
      $contacts->userID = $user->userID;
      $contacts->cellNo = $request->input('cellNo');
      $contacts->tellNo = $request->input('tellNo');
      $contacts->save();
      return redirect('/applicants')->with('success', 'Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $applicants = userTable::find($id);
      return view('applicants.show', compact('applicants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $applicants = userTable::find($id);
      return view('applicants.edit', compact('applicants'));
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
        $post = userTable::find($id);
        $post->status = $request->input('status');
        $post->save();
        return redirect('/applicants')->with('success', 'Profile updated');
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
