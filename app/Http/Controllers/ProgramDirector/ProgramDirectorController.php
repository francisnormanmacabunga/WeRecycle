<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramDirectorController extends Controller
{
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
      $this->middleware('auth:programdirector');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('pages.indexPD');
    }

}
