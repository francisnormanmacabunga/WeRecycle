<?php

namespace App\Http\Controllers\Donor\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DonorLoginController extends Controller
{

  public function __construct()
  {
    $this->middleware('guest:donor' ,['except' => ['donorLogout']]);
  }

  public function showLoginForm()
  {
    return view('Donor/Auth.donor-login');
  }

  public function login(Request $request)
  {
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required'
    ]);
    if (Auth::guard('donor')->attempt(['username' => $request->username,
    'password' => $request->password, 'usertypeID' => 1, 'status' => 'Activated'], $request->remember))
    {
      return redirect()->intended(route('donor.dashboard'));
    }
    session()->flash('alert','Incorrect username/password!');
    return redirect()->back()->withInput($request->only('username','remember'));
  }

  public function donorLogout()
  {
    Auth::guard('donor')->logout();
    //return redirect('/');
    return redirect(\URL::previous());
  }

}
