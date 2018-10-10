<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DB;

class PagesController extends Controller
{

    public function index()
    {
      $volunteersCount = Employee::SELECT('*')
      ->where('status', 'Activated')
      ->where('usertypeID', '2')
      ->get();
      return view('pages.index', compact('volunteersCount'));
    }

    public function index2()
    {
      $volunteersCount = Employee::SELECT('*')
      ->where('status', 'Activated')
      ->where('usertypeID', '2')
      ->get();
      return view('pages.index2', compact('volunteersCount'));
    }

}
