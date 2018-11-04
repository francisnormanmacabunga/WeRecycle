<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use PDF;

class TransactionPDF extends Controller
{


  public function __construct()
  {
    $this->middleware('auth:programdirector');
  }


  public function transactionPDFR(Request $request)
  {
    $request = Transaction::orderBy('updated_at', 'desc')
    -> where('type', 'Donate')
    -> get();
    $pdf = PDF::loadView('ProgramDirector/Transactions.requestsPDF', compact('request'));
    return $pdf->download('Request-Transaction.pdf');
  }

  public function transactionPDFO(Request $request)
  {
    $order = Transaction::orderBy('updated_at', 'desc')
    -> where('type', 'Shop')
    -> get();
    $pdf = PDF::loadView('ProgramDirector/Transactions.ordersPDF', compact('order'));
    return $pdf->download('Order-Transaction.pdf');
  }

}
