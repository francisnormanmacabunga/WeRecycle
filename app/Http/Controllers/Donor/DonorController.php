<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use  App\Models\Points;
class DonorController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:donor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      //$id = Auth::user()->userID;
      $width = Points::where('userID',Auth::user()->userID);
        return view('pages.indexUser')->with('width',$width);
    }

}
