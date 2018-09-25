<?php

namespace App\Http\Controllers\PDAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PDLoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest:programdirector');
  }

  public function showLoginForm()
  {
    return view('pd-auth.pd-login');
  }

  public function login(Request $request)
  {
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required'
    ]);

    if (Auth::guard('programdirector')->attempt(['username' => $request->username,
    'password' => $request->password, 'usertypeID' => 4], $request->remember))

    {
      return redirect()->intended(route('pd.dashboard'));
    }

    return redirect()->back()->withInput($request->only('username','remember'));
  }

}
