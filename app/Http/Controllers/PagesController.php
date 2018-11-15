<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;
use DB;

class PagesController extends Controller
{
  
  public function __construct()
  {
      $this->middleware('auth:donor');
  }

    public function index()
    {
      $volunteersCount = Volunteer::SELECT('*')
      ->where('status', 'Activated')
      ->where('usertypeID', '2')
      ->get();
      return view('pages.index', compact('volunteersCount'));
    }

    public function index2()
    {
      $volunteersCount = Volunteer::SELECT('*')
      ->where('status', 'Activated')
      ->where('usertypeID', '2')
      ->get();
      return view('pages.index2', compact('volunteersCount'));
    }

    public function faqs()
    {
      return view('pages.faqs');
    }
}
