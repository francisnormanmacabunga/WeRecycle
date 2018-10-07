<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\userTable;

class PagesController extends Controller
{

    public function index()
    {
      $volunteersCount = userTable::SELECT('*')
      ->where('status', 'Activated')
      ->where('usertypeID', '2')
      ->get();
      return view('pages.index', compact('volunteersCount'));
    }

    public function createApplicant()
    {
      return view('applicants.create');
    }

    public function createDonor(){
      return view('Donor/Profile.create');
    }

    public function index2()
    {
      $volunteersCount = userTable::SELECT('*')
      ->where('status', 'Activated')
      ->where('usertypeID', '2')
      ->get();

      return view('pages.index2', compact('volunteersCount'));
    }

}
