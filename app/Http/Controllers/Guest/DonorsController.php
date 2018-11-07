<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Models\Contacts;
use App\Models\Donor;
use App\Models\Points;
use Hash;
use Carbon\Carbon;

class DonorsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      return view('Guest/Donors.terms');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
      return view('Guest/Donors.create');
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
      'firstname' => 'required|regex:/^[a-zA-Z-. ]*$/',
      'lastname' => 'required|regex:/^[a-zA-Z-. ]*$/',
      'email' => 'required|unique:user,email',
      'cellNo' => 'required|min:13|max:13|regex:/^\+63[0-9]{10}$/',
      'tellNo' => 'required|min:7|max:7',
      'birthdate' => 'required|before:'.Carbon::now()->subYears(15),
      'city' => 'required|regex:/^[\pL\s]+$/u',
      'street' => 'nullable|regex:/^[a-zA-Z0-9,.!? ]*$/',
      'barangay' => 'nullable|regex:/^[a-zA-Z0-9,.!? ]*$/',
      'zip' => 'nullable|min:4|max:4',
      'username' => 'required|alpha_dash|unique:user,username',
      'password' => 'min:6|required_with:password_confirmation|same:password_confirmation|',
      'password_confirmation' => 'required',
      'g-recaptcha-response'=> 'required|captcha'
    ],
    [
      'g-recaptcha-response.required' => 'Captcha is required.',
      'firstname.required' => 'The First Name field is required.',
      'firstname.regex' => 'The First Name field must only contain letters, period, and hyphen.',
      'lastname.required' => 'The Last Name field is required.',
      'lastname.regex' => 'The Last Name field must only contain letters, period and hyphen.',
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
      'birthdate.before' => 'The Donor must be atleast 15 years old',
      'city.required' => 'The City field is required.',
      'city.regex' => 'The City field must only contain letters.',
      'street.regex' => 'The Street field must only contain letters, numbers, period, and comma.',
      'barangay.regex' => 'The Barangay field must only contain letters, numbers, period, and comma.',
      'zip.min' => 'The Zip field must be at least 4 characters.',
      'zip.max' => 'The Zip field may not be greater than 4 characters.',
      'username.unique' => 'The Username you registered is already in use.',
      'username.required' => 'The Username field is required.',
      'username.alpha_dash' => 'The Username may only contain letters, numbers, dashes and underscores.',
      'password.min' => 'Password field must be at least 6 characters',
      'password.same' => 'Password does not match',
      'password_confirmation.required' => 'Password Confirmation field is required'
    ]);
      $user = new Donor();
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

      $points = new Points;
      $points->pointsaccumulated = 0;
      $points->userID = $user->userID;
      $points->save();
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

    }

}
