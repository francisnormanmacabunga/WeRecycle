<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

  public function __construct()
  {
    $this->middleware('guest:admin', ['except' => ['adminLogout']]);
  }

  public function showLoginForm()
  {
    return view('Admin/Auth.admin-login');
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

  public function adminLogout()
  {
    Auth::guard('admin')->logout();
    //return redirect(\URL::previous());
    return redirect('/admin');
  }

}
