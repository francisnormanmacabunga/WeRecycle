<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MessageOrders;
use App\Models\MessageRequests;
use App\Models\MessageDonors;

class MessageController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:programdirector');
  }

  public function messageOrders()
  {
    $messageorders = MessageOrders::SELECT('*')
    -> sortable()
    -> get();
    return view('ProgramDirector/History.messageOrders')->with(['messageorders' => $messageorders]);
  }

  public function messageRequests()
  {
    $messagerequests = MessageRequests::SELECT('*')
    -> sortable()
    -> get();
    return view('ProgramDirector/History.messageRequests')->with(['messagerequests' => $messagerequests]);
  }

  public function MessageDonors()
  {
    $messagedonors = MessageDonors::SELECT('*')
    -> sortable()
    -> get();
    return view('ProgramDirector/History.MessageDonors')->with(['messagedonors' => $messagedonors]);
  }


}
