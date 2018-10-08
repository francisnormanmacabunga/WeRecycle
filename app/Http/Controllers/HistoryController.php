<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaction;
use App\userTable;
use DB;

use App\order;



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

      $donationhistory = transaction::all();
      return view('program_directors.donationHistory',compact('donationhistory'));

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
