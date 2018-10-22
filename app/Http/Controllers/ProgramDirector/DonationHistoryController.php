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
        $donation = Transaction::SELECT('*')
        -> where('type', 'Donate')
        -> sortable()
        -> paginate();

        return view('ProgramDirector/History.donationHistory')->with(['donation' => $donation]);
      }


        public function donationHistoryS()
        {
          $donation = Transaction::SELECT('*')
          -> where('status', 'Shipping')
          -> where('type', 'Donate')
          -> sortable()
          -> paginate();

          return view('ProgramDirector/History.donationHistoryS')->with(['donation' => $donation]);
        }


        public function donationHistoryD()
        {
          $donation = Transaction::SELECT('*')
          -> where('Status', 'Delivered')
          -> where('type', 'Donate')
          -> sortable()
          -> paginate();

          return view('ProgramDirector/History.donationHistoryD')->with(['donation' => $donation]);
          }


          public function donationHistoryC()
          {
            $donation = Transaction::SELECT('*')
            -> where('status', 'Cancelled')
            -> where('type', 'Donate')
            -> sortable()
            -> paginate();

            return view('ProgramDirector/History.donationHistoryC')->with(['donation' => $donation]);
            }



      public function donationPDF(Request $request)
      {
        $donation = Transaction::SELECT('*')
        -> where('type', 'Donate')
        -> get();
        $pdf = PDF::loadView('ProgramDirector/History.donationPDF', compact('donation'));
        return $pdf->download('DonationHistory.pdf');
      }

      public function donationPDFS(Request $request)
      {
        $donation = Transaction::SELECT('*')
        -> where('type', 'Donate')
        -> where('status', 'Shipping')
        -> get();
        $pdf = PDF::loadView('ProgramDirector/History.donationPDFS', compact('donation'));
        return $pdf->download('Shipping-DonationHistory.pdf');
      }

      public function donationPDFD(Request $request)
      {
        $donation = Transaction::SELECT('*')
        -> where('type', 'Donate')
        -> where('status', 'Delivered')
        -> get();
        $pdf = PDF::loadView('ProgramDirector/History.donationPDFD', compact('donation'));
        return $pdf->download('Delivered-DonationHistory.pdf');
      }

      public function donationPDFC(Request $request)
      {
        $donation = Transaction::SELECT('*')
        -> where('type', 'Donate')
        -> where('status', 'Cancelled')
        -> get();
        $pdf = PDF::loadView('ProgramDirector/History.donationPDFC', compact('donation'));
        return $pdf->download('Cancelled-DonationHistory.pdf');
      }








  }
