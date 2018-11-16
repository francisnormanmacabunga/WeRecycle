<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use AuthenticatesAndRegistersUsers, ThrottlesLogins, ResetsPassword;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;
use App\Models\ActivityCoordinator;
use App\Models\Contacts;
use Hash;
use Carbon\Carbon;

class ActivityCoordinatorController extends Controller
{
    use SendsPasswordResetEmails;
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
      $this->validate($request, [
      'usertypeID' => 'required',
      'firstname' => 'required|regex:/^[a-zA-Z-. ]*$/',
      'lastname' => 'required|regex:/^[a-zA-Z-. ]*$/',
      'email' => 'required|unique:user,email',
      'cellNo' => 'required|min:13|max:13|regex:/^\+63[0-9]{10}$/',
      'tellNo' => 'required|min:7|max:7',
      'birthdate' => 'required|before:'.Carbon::now()->subYears(18),
      'city' => 'required|regex:/^[\pL\s]+$/u',
      'street' => 'nullable|regex:/^[a-zA-Z0-9,.!? ]*$/',
      'barangay' => 'nullable|regex:/^[a-zA-Z0-9,.!? ]*$/',
      'zip' => 'nullable|min:4|max:4|regex:/^[0-9]*$/',
      'street' => 'nullable|regex:/^[a-zA-Z0-9,.!-? ]*$/',
      'barangay' => 'nullable|regex:/^[a-zA-Z0-9,.!-? ]*$/',
      'zip' => 'nullable|min:4|max:4',
      'username' => 'required|alpha_dash|unique:user,username|min:8|max:12|'
    ],
    [
      'username.min' => 'username length must be 8 character',
      'username.max' => 'username length must be 12 character',
      'usertypeID.required' => 'The Usertype field is required',
      'firstname.required' => 'The First Name field is required.',
      'firstname.regex' => 'The First Name field must only contain letters, period, and hyphen.',
      'lastname.required' => 'The Last Name field is required.',
      'lastname.regex' => 'The Last Name field must only contain letters, period, and hyphen.',
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
      'birthdate.before' => 'The Activity Coordinator must be atleast 18 years old',
      'city.required' => 'The City field is required.',
      'city.regex' => 'The City field must only contain letters.',
      'street.regex' => 'The Street field must only contain letters, numbers, period, hyphen and comma.',
      'barangay.regex' => 'The Barangay field must only contain letters, numbers, period, hyphen and comma.',
      'zip.min' => 'The Zip field must be at least 4 characters.',
      'zip.max' => 'The Zip field may not be greater than 4 characters.',
      'zip.regex' => 'The Zip field must only contain numbers.',
      'username.unique' => 'The Username you registered is already in use.',
      'username.required' => 'The Username field is required.',
      'username.alpha_dash' => 'The Username may only contain letters, numbers, dashes and underscores.'
    ]);
      session()->flash('new','New Employee Created!');
      $pw = str_random(8);
      $user = new ActivityCoordinator();
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
      $user->password = Hash::make($pw);
      $user->status = $request->input('status');
      $user->save();

      $contacts = new Contacts();
      $contacts->userID = $user->userID;
      $contacts->cellNo = $request->input('cellNo');
      $contacts->tellNo = $request->input('tellNo');
      $contacts->save();

      return $this->postEmail($request);
    }

    public function postEmail(Request $request)
    {
      return $this->sendResetLinkEmail($request);
    }

    public function sendResetLinktoEmail(Request $request, $token)
    {
      $this->validateSendResetLinkEmail($request);
      $broker = $this->getBroker();

      $response = Password::broker($broker)->sendResetLink(
          $this->getSendResetLinkEmailCredentials($request),
          $this->resetEmailBuilder()
      );

      switch ($response)
        {
            case Password::RESET_LINK_SENT:
                return $this->getSendResetLinkEmailSuccessResponse($response);
            case Password::INVALID_USER:
            default:
                return $this->getSendResetLinkEmailFailureResponse($response);
        }
    }

    protected function broker()
    {
       return Password::broker('activitycoordinators');
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
        //
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
        //
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
