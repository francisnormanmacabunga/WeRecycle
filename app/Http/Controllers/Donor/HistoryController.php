<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Auth;
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
      $user = Auth::user();
      $donationHistory = DB::SELECT('select * from transactions where userID =?',[$user->userID]);
      return view('Donor/History.donationHistory', compact('donationHistory'));
    }

    public function transactionHistory()
    {
      return view('Donor/History.transactionHistory', compact('transactionHistory'));
    }

}
