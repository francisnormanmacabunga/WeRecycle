<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Exception;
use App\userTable;
use App\contactsTable;
use App\donor;
use Illuminate\Validation\Rule;
use Session;
use Hash;
use Auth;


class DonorsController extends Controller
{
  public function __construct()
  {
      //$this->middleware('auth:donor');

      $this->middleware('guest', ['only'=> [
        'create',
        'store'
        ]]);

        $this->middleware('auth:donor', ['except'=> [
          'create',
          'store'
          ]]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$donors = userTable::SELECT('*')
      //-> join('contacts', 'contacts.userID', '=', 'user.userID')
      //-> get();
      //$donors = DB::SELECT('SELECT * FROM user INNER JOIN contacts ON contacts.userID = user.userID WHERE user.username = "ShaneDawson"');
      //$donors = Auth::user()
      //return view('users.index')->with(['donors' => $donors]);

      $donors = Auth::user();
      return view('users.index')->with(['donors' => $donors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('users.create');
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
      'email' => 'required|unique:user,email',
      'cellNo' => 'required|regex:/^[+]?[\d]+([\-][\d]+)*\d$/',
      'tellNo' => 'required|min:7|max:7',
      'birthdate' => 'required',
      'city' => 'required|regex:/^[\pL\s]+$/u',
      'street' => 'nullable|regex:/^[ \w.#-]+$/',
      'barangay' => 'nullable|regex:/^[ \w.#-]+$/',
      'zip' => 'nullable|min:4|max:4',
      'username' => 'required|alpha_dash|unique:user,username',
      'password' => 'min:6|required_with:password_confirmation|same:password_confirmation|',
      'password_confirmation' => 'required'
    ],
    [
      'firstname.required' => 'The First Name field is required.',
      'firstname.regex' => 'The First Name field must only contain letters.',
      'lastname.required' => 'The Last Name field is required.',
      'lastname.regex' => 'The Last Name field must only contain letters.',
      'email.required' => 'The Email field is required.',
      'email.unique' => 'The Email you registered is already in use.',
      'cellNo.required' => 'The Cellphone Number is required.',
      'tellNo.required' => 'The Telephone Number is required.',
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
      'username.alpha_dash' => 'The Username may only contain letters, numbers, dashes and underscores.',
      'password.min' => 'Password field must be at least 6 characters',
      'password.same' => 'Password does not match',
      'password_confirmation.required' => 'Password Confirmation field is required'
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
      //$user->password = $request->input('password');
      $user->password = Hash::make($request->input('password'));
      $user->status = $request->input('status');
      $user->save();

      $contacts = new contactsTable();
      $contacts->userID = $user->userID;
      $contacts->cellNo = $request->input('cellNo');
      $contacts->tellNo = $request->input('tellNo');
      $contacts->save();
      return redirect('/donor/login')->with('success', 'Profile Created');
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
      'username.alpha_dash' => 'The Username may only contain letters, numbers, dashes and underscores.',
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
      return redirect('/donor/donors')->with('success','Profile updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //$donors = DB::update('update user set status = Deactivated = ?', [$id]);
      //DB::statement(DB::raw('SET @status = "Deactivated"'));
      //$donors = DB::select(DB::raw('select * from user where status = @status'));
      //$donors = userTable::find($id);
      //$donors->status = $request->input('status');
      //$donors->push();
      //return redirect('/donors')->with('success','Profile updated');
    }
}
