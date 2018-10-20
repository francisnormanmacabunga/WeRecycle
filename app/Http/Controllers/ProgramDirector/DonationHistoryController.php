<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Donor;
use PDF;

class DonationHistoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:programdirector');
    }

    public function donationHistory()
    {
      if (request()->has('status')){
      $donation = Transaction::SELECT('*')
      -> where('status',request('status'))
      -> where('type', 'Donate')
      -> sortable()
      -> paginate();
      } else {
      $donation = Transaction::select('*')
      -> where('type', 'Donate')
      -> sortable()
      -> paginate();

      }
$status = 'Shipping';
$asd = 'Cancelled';
$dsa = 'Delivered';
      return view('ProgramDirector/History.donationHistory')->with(['donation' => $donation])->with(['status' => $status])->with(['asd' => $asd])->with(['dsa' => $dsa]);

      }

      public function donationPDF(Request $request)
      {

        $donation = Transaction::SELECT('*')
        //-> where('status',request('status'))
        -> where('type', 'Donate')
        -> get();





        $pdf = PDF::loadView('ProgramDirector/History.donationPDF', compact('donation'));

        return $pdf->download('DonationHistory.pdf');
      }
  }
