<?php

namespace App\Http\Controllers\ActivityCoordinator\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ACLoginController extends Controller
{

  public function __construct()
  {
    $this->middleware('guest:activitycoordinator', ['except' => ['activitycoordinatorLogout']]);
  }

  public function showLoginForm()
  {
    return view('ActivityCoordinator/Auth.ac-login');
  }

  public function login(Request $request)
  {
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required'
    ]);
    if (Auth::guard('activitycoordinator')->attempt(['username' => $request->username,
    'password' => $request->password, 'usertypeID' => 3, 'status' => 'Activated'], $request->remember))
    {
      return redirect()->intended(route('ac.dashboard'));
    }
    session()->flash('alert', 'Incorrect username/password!');
    return redirect()->back()->withInput($request->only('username','remember'));
  }

  public function activitycoordinatorLogout()
  {
    Auth::guard('activitycoordinator')->logout();
    return redirect('/');
  }

}
