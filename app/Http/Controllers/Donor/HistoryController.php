<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\transaction;
use App\userTable;
use Cart;
use DB;

class HistoryController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:donor');
    }

    public function donationHistory()
    {

      return view('Donor/History.donorHistory', compact('donorHistory'));
    }

    public function transactionHistory()
    {
      return view('Donor/History.transactionHistory', compact('transactionHistory'));
    }

}
