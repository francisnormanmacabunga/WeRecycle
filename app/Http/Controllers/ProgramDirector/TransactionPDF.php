<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use PDF;
use Illuminate\Support\Carbon;

class TransactionPDF extends Controller
{


  public function __construct()
  {
    $this->middleware('auth:programdirector');
  }


  public function transactionPDFR(Request $request)
  {
    date_default_timezone_set('Asia/Manila');
    $start = Carbon::parse($request->start)->startOfDay();
    $end = Carbon::parse($request->end)->endOfDay();

    $request = Transaction::orderBy('updated_at', 'desc')
    -> whereBetween('updated_at', array(new Carbon($start), new Carbon($end)))
    -> where('type', 'Donate')
    -> get();
    $pdf = PDF::loadView('ProgramDirector/Transactions.requestsPDF', compact('request'));
    return $pdf->download('Request-Transaction.pdf');
  }

  public function transactionPDFO(Request $request)
  {
    date_default_timezone_set('Asia/Manila');
    $start = Carbon::parse($request->start)->startOfDay();
    $end = Carbon::parse($request->end)->endOfDay();

    $order = Transaction::orderBy('updated_at', 'desc')
    -> whereBetween('updated_at', array(new Carbon($start), new Carbon($end)))
    -> where('type', 'Shop')
    -> get();
    $pdf = PDF::loadView('ProgramDirector/Transactions.ordersPDF', compact('order'));
    return $pdf->download('Order-Transaction.pdf');
  }

}
