<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Models\Employee;
use App\Models\Contacts;
use DB;
use Hash;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class EmployeesController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $employee = Employee::SELECT('*')
        -> join('contacts', 'contacts.userID', '=', 'user.userID')
        -> join('usertype', 'usertype.usertypeID', '=', 'user.usertypeID')
        -> where('usertype.usertypeID', '3')
        -> orwhere('usertype.usertypeID', '4')
        -> sortable()
        -> paginate(5);

        return view('Admin/Employees.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
      return view('Admin/Employees.create');
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
      'usertypeID' => 'required',
      'firstname' => 'required|regex:/^[\pL\s]+$/u',
      'lastname' => 'required|regex:/^[\pL\s]+$/u',
      'email' => 'required|unique:user,email',
      'cellNo' => 'required|min:13|max:13|regex:/^\+63[0-9]{10}$/',
      'tellNo' => 'required|min:7|max:7',
      'birthdate' => 'required',
      'city' => 'required|regex:/^[\pL\s]+$/u',
      'street' => 'nullable|regex:/^[ \w.#-]+$/',
      'barangay' => 'nullable|regex:/^[ \w.#-]+$/',
      'zip' => 'nullable|min:4|max:4',
      'username' => 'required|alpha_dash|unique:user,username'
    ],
    [
      'usertypeID.required' => 'The Usertype field is required',
      'firstname.required' => 'The First Name field is required.',
      'firstname.regex' => 'The First Name field must only contain letters.',
      'lastname.required' => 'The Last Name field is required.',
      'lastname.regex' => 'The Last Name field must only contain letters.',
      'email.required' => 'The Email field is required.',
      'email.unique' => 'The Email you registered is already in use.',
      'cellNo.required' => 'The Cellphone Number is required.',
      'tellNo.required' => 'The Telephone Number is required.',
      'cellNo.min' => 'The Cellphone field must be at least 13 characters.',
      'cellNo.max' => 'The Cellphone field may not be greater than 13 characters.',
      'cellNo.regex' => 'Incorrect cellphone number format.',
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
      $user = new Employee();
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
      $user->password = Hash::make($request->input('password'));
      $user->status = $request->input('status');
      $user->save();

      $contacts = new Contacts();
      $contacts->userID = $user->userID;
      $contacts->cellNo = $request->input('cellNo');
      $contacts->tellNo = $request->input('tellNo');
      $contacts->save();

      Mail::to($user->email)->send(new WelcomeMail($user));

      return redirect('/admin/employees')->with('success', 'Profile Created');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
      $employee = Employee::find($id);
      return view('Admin/Employees.edit', compact('employee'));
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
      $post = Employee::find($id);
      $post->status = $request->input('status');
      $post->save();
      return redirect('/admin/employees')->with('success', 'Profile updated');
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
