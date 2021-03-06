<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Donor;
use PDF;
use Illuminate\Support\Carbon;

class DonationHistoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:programdirector');
    }

      public function donationHistory()
      {
        $donation = Transaction::orderBy('updated_at', 'desc')
        -> where('type', 'Donate')
        -> sortable()
        -> get();
        return view('ProgramDirector/History.donationHistory')->with(['donation' => $donation]);
      }


        public function donationHistoryS()
        {
          $donation = Transaction::orderBy('updated_at', 'desc')
          -> where('status', 'Dispatched')
          -> where('type', 'Donate')
          -> sortable()
          -> get();

          return view('ProgramDirector/History.donationHistoryS')->with(['donation' => $donation]);
        }


        public function donationHistoryD()
        {
          $donation = Transaction::orderBy('updated_at', 'desc')
          -> where('Status', 'Accepted')
          -> where('type', 'Donate')
          -> sortable()
          -> get();

          return view('ProgramDirector/History.donationHistoryD')->with(['donation' => $donation]);
          }


          public function donationHistoryC()
          {
            $donation = Transaction::orderBy('updated_at', 'desc')
            -> where('status', 'Cancelled')
            -> where('type', 'Donate')
            -> sortable()
            -> get();

            return view('ProgramDirector/History.donationHistoryC')->with(['donation' => $donation]);
            }

            public function donationHistoryP()
            {
              $donation = Transaction::orderBy('updated_at', 'desc')
              -> where('status', 'Processing')
              -> where('type', 'Donate')
              -> sortable()
              -> get();

              return view('ProgramDirector/History.donationHistoryP')->with(['donation' => $donation]);
              }



      public function donationPDF(Request $request)
      {
        date_default_timezone_set('Asia/Manila');
        $start = Carbon::parse($request->start)->startOfDay();
        $end = Carbon::parse($request->end)->endOfDay();

        $donation = Transaction::where('type', 'Donate')
        -> whereBetween('updated_at', array(new Carbon($start), new Carbon($end)))
        -> orderBy('updated_at', 'desc')
        -> get();

        $pdf = PDF::loadView('ProgramDirector/History.donationPDF', compact('donation'));
        return $pdf->download('DonationHistory.pdf');
      }



      public function donationPDFP(Request $request)
      {
        date_default_timezone_set('Asia/Manila');
        $start = Carbon::parse($request->start)->startOfDay();
        $end = Carbon::parse($request->end)->endOfDay();

        $donation = Transaction::orderBy('updated_at', 'desc')
        -> whereBetween('updated_at', array(new Carbon($start), new Carbon($end)))
        -> where('type', 'Donate')
        -> where('status', 'Processing')
        -> get();

        $pdf = PDF::loadView('ProgramDirector/History.donationPDFP', compact('donation'));
        return $pdf->download('Processing-DonationHistory.pdf');
      }

      public function donationPDFS(Request $request)
      {
        date_default_timezone_set('Asia/Manila');
        $start = Carbon::parse($request->start)->startOfDay();
        $end = Carbon::parse($request->end)->endOfDay();

        $donation = Transaction::orderBy('updated_at', 'desc')
        -> whereBetween('updated_at', array(new Carbon($start), new Carbon($end)))
        -> where('type', 'Donate')
        -> where('status', 'Dispatched')
        -> get();
        $pdf = PDF::loadView('ProgramDirector/History.donationPDFS', compact('donation'));
        return $pdf->download('Dispatched-DonationHistory.pdf');
      }

      public function donationPDFD(Request $request)
      {
        date_default_timezone_set('Asia/Manila');
        $start = Carbon::parse($request->start)->startOfDay();
        $end = Carbon::parse($request->end)->endOfDay();

        $donation = Transaction::orderBy('updated_at', 'desc')
        -> whereBetween('updated_at', array(new Carbon($start), new Carbon($end)))
        -> where('type', 'Donate')
        -> where('status', 'Accepted')
        -> get();
        $pdf = PDF::loadView('ProgramDirector/History.donationPDFD', compact('donation'));
        return $pdf->download('Accepted-DonationHistory.pdf');
      }

      public function donationPDFC(Request $request)
      {
        date_default_timezone_set('Asia/Manila');
        $start = Carbon::parse($request->start)->startOfDay();
        $end = Carbon::parse($request->end)->endOfDay();

        $donation = Transaction::orderBy('updated_at', 'desc')
        -> whereBetween('updated_at', array(new Carbon($start), new Carbon($end)))
        -> where('type', 'Donate')
        -> where('status', 'Cancelled')
        -> get();
        $pdf = PDF::loadView('ProgramDirector/History.donationPDFC', compact('donation'));
        return $pdf->download('Cancelled-DonationHistory.pdf');
      }

  }
