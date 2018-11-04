<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\PointsLog;
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
      if (request()->has('status')){
      $donation = Transaction::where('userID', $donor->userID)
      -> where('status',request('status'))
      -> where('type', 'Donate')
      -> sortable()
      -> get();
      } else {
        $donation = Transaction::where('userID', $donor->userID)
        -> where('type', 'Donate')
        -> sortable()
        -> get();
}
      return view('Donor/History.donationHistory')->with(['donation' => $donation]);

    }

    public function transactionHistory()
    {
      $donor = Auth::user();
      if (request()->has('status')){
      $shop = Transaction::where('userID', $donor->userID)
      -> where('status',request('status'))
      -> where('type', 'Shop')
      -> sortable()
      -> get();
      } else {
        $shop = Transaction::where('userID', $donor->userID)
        -> where('type', 'Shop')
        -> sortable()
        -> get();
      }
      return view('Donor/History.transactionHistory')->with(['shop' => $shop]);
    }

    public function pointHistory()
    {
      $donor = Auth::user();
      if (request()->has('status')){
      $point = PointsLog::SELECT('*')
      -> where('activity',request('status'))
      -> where('userID', $donor->userID)
      -> sortable()
      -> paginate(10)->appends('activity', request('status'));
      } else {
      $point = PointsLog::SELECT('*')
      -> where('userID', $donor->userID)
      -> sortable()
      -> paginate(10);
      }

      /*
      $donor = Auth::user();
      $point = PointsLog::where('userID', $donor->userID)
      -> sortable()
      -> get();*/
      return view('Donor/History.pointHistory')->with(['point' => $point]);
    }

    public function cancel(Request $request,$transid){
        $id = $request->transid;
        $trans = Transaction::where('transid',$id)->first();
        $trans->status = 'Cancelled';
        $trans->push();
        return back();
    }
}
