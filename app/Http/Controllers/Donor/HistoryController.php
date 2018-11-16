<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\PointsLog;
use App\Models\Reward;
use Auth;
use Cart;
use DB;
use App\Models\Points;
class HistoryController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:donor');
    }

    public function donationHistory()
    {
 $width = Points::where('userID',Auth::user()->userID)->first();
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
      return view('Donor/History.donationHistory')->with(['donation' => $donation])->with('width',$width);

    }

    public function transactionHistory()
    {
       $width = Points::where('userID',Auth::user()->userID)->first();
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
      return view('Donor/History.transactionHistory')->with(['shop' => $shop])->with('width',$width);
    }

    public function pointHistory()
    {
       $width = Points::where('userID',Auth::user()->userID)->first();
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
      return view('Donor/History.pointHistory')->with(['point' => $point])->with('width',$width);
    }


    public function discountcodlist(){
       $width = Points::where('userID',Auth::user()->userID)->first();
      $donor = Auth::user();
      $dcodes = Reward::orderBy('updated_at', 'desc')
      -> where('userID', $donor->userID)
      -> paginate(10);

        return view('Donor/History.dcodes')->with(['dcodes' => $dcodes])->with('width',$width);
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
