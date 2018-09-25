<?php

namespace App\Http\Controllers\ACAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ACLoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest:activitycoordinator');
  }

  public function showLoginForm()
  {
    return view('ac-auth.ac-login');
  }

  public function login(Request $request)
  {
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required'
    ]);


    if (Auth::guard('activitycoordinator')->attempt(['username' => $request->username,
    'password' => $request->password, 'usertypeID' => 3], $request->remember))

    {
      return redirect()->intended(route('ac.dashboard'));
    }

    return redirect()->back()->withInput($request->only('username','remember'));
  }

}
