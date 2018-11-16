<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Points;
use Cart;

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
      $cartItems=Cart::instance('shop')->content();
      $cartItems1=Cart::content();
      $width = Points::where('userID',Auth::user()->userID)->first();
        return view('pages.indexUser',compact('cartItems','cartItems1'))->with('width',$width);
    }

    public function faqs()
    {

      $cartItems=Cart::instance('shop')->content();
      $cartItems1=Cart::content();
      $width = Points::where('userID',Auth::user()->userID)->first();
      return view('pages.faqs',compact('cartItems','cartItems1'))->with('width',$width);
    }

}
