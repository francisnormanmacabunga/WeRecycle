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
      $donationhistory = Transaction::all();
      return view('ProgramDirector/History.donationHistory',compact('cartItems'))->with(['donationhistory' => $donationhistory ]);
    }

}
