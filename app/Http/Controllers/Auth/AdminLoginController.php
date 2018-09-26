<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest:admin');
  }

  public function showLoginForm()
  {
    return view('auth.admin-login');
  }

  public function login(Request $request)
  {
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required'
    ]);

    if (Auth::guard('admin')->attempt(['username' => $request->username,
    'password' => $request->password, 'usertypeID' => 5], $request->remember))

    {
      return redirect()->intended(route('admin.dashboard'));
    }

    session()->flash('alert', 'Incorrect username/password!');
    return redirect()->back()->withInput($request->only('username','remember'));

  }

}
