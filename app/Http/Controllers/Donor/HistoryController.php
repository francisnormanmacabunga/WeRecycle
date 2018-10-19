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

      $donor = Auth::user();
      $donation = Transaction::where('userID', $donor->userID)
      -> where('type', 'Donate')
      -> sortable()
      -> get();
      return view('Donor/History.donationHistory')->with(['donation' => $donation]);

    }

    public function transactionHistory()
    {
      $donor = Auth::user();
      $shop = Transaction::where('userID', $donor->userID)
      -> where('type', 'Shop')
      -> sortable()
      -> get();
      return view('Donor/History.transactionHistory')->with(['shop' => $shop]);
    }

    public function cancel(Request $request,$transid){
        $id = $request->transid;
        $trans = Transaction::where('transid',$id)->first();
        $trans->status = 'Cancelled';
        $trans->push();
        return back();
    }
}
