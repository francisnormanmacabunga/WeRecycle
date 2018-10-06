<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaction;
use App\userTable;
use DB;
use Cart;


class HistoryController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:programdirector', ['only'=> [
      'donationHistory', 'transactionHistory',
      ]]);

      $this->middleware('auth:donor', ['except'=> [
       'donationHistory', 'transactionHistory',
        ]]);

  }

  public function donationHistory()
   {



     //$donationhistory = transaction::with('users')->find($id)->users;
     //return View::make('program_directors.donationHistory', compact('donationhistory'))->with('users', $donationhistory)m

      // $test = $donationhistory = transaction::all();
      //$donationhistory = DB::SELECT('select * from transactions')->all();
      $donationhistory = transaction::all();
      $cartItems = unserialize(base64_decode($donationhistory['2']['cart']));





      //return view('program_directors.donationHistory', compact('donationhistory'));


       return view('program_directors.donationHistory',compact('cartItems'))->with(['donationhistory' => $donationhistory ]);
   }

   public function transactionHistory()
    {
        return view('program_directors.transactionHistory', compact('transactionHistory'));
    }

    public function donorHistory()
     {
         return view('users.donorHistory', compact('donorHistory'));
     }
}
