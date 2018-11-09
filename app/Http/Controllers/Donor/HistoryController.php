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
      $donation = Transaction::orderBy('updated_at', 'desc')
      -> where('userID', $donor->userID)
      -> where('status',request('status'))
      -> where('type', 'Donate')
      -> paginate(10)->appends('status', request('status'));
      } else {
        $donation = Transaction::orderBy('updated_at', 'desc')
        -> where('userID', $donor->userID)
        -> where('type', 'Donate')
        -> paginate(10);
}
      return view('Donor/History.donationHistory')->with(['donation' => $donation]);

    }

    public function transactionHistory()
    {
      $donor = Auth::user();
      if (request()->has('status')){
      $shop = Transaction::orderBy('updated_at', 'desc')
      -> where('userID', $donor->userID)
      -> where('status',request('status'))
      -> where('type', 'Shop')
      -> paginate(10)->appends('status', request('status'));

      } else {
        $shop = Transaction::orderBy('updated_at', 'desc')
        -> where('userID', $donor->userID)
        -> where('type', 'Shop')
        -> paginate(10);
      }
      return view('Donor/History.transactionHistory')->with(['shop' => $shop]);
    }

    public function pointHistory()
    {
      $donor = Auth::user();
      if (request()->has('activity')){
      $point = PointsLog::SELECT('*')
      -> where('activity',request('activity'))
      -> where('userID', $donor->userID)
      -> sortable()
      -> paginate(10)->appends('activity', request('activity'));
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

    public function cancel(Request $request,$transid)
    {
        $id = $request->transid;
        $trans = Transaction::where('transid',$id)->first();
        $trans->status = 'Cancelled';
        $trans->push();
        return back();
    }

}
