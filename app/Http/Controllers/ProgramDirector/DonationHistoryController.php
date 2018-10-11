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

      $donation = Transaction::SELECT('*')
      -> where('type', 'Donate')
      -> sortable()
      -> get();

      return view('ProgramDirector/History.donationHistory')->with(['donation' => $donation]);

      }
  }
