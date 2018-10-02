<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
  public function donationHistory()
   {
       return view('program_directors.donationHistory', compact('donationhistory'));
   }

   public function transactionHistory()
    {
        return view('program_directors.transactionHistory', compact('transactionHistory'));
    }
}
