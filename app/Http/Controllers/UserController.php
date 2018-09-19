<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;
use Hash;

class UserController extends Controller
{
  public function userLogin(request $request){
  $uname = $request ->input('username');
  //$password = md5($request ->input('password'));
  $password = Hash::check($request ->input('password'));
  $data = DB::select('select userID from user where username=? and password=?',[$uname,$password]);
  if (count($data) == 1){
    session(['username'=>$request->input('username')]);
    return view('pages.indexUser')->with('username',$request -> input('username'));
  }else {
    return view('pages.index');
  }

}

public function userLogout(request $request){
$request -> session()->flush('username');
return view('pages.index');
}
}
