<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Donor;

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
      -> paginate(10);
      } else {
      $donation = Transaction::select('*')
      -> where('type', 'Donate')
      -> sortable()
      -> paginate(10);
      }

      return view('ProgramDirector/History.donationHistory')->with(['donation' => $donation]);

      }
  }
