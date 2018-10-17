<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MessageOrders;
use App\Models\MessageRequests;
use App\Models\MessageDonors;

class MessageController extends Controller
{

  public function messageOrders()
  {
    $messageorders = MessageOrders::all();
    return view('ProgramDirector/History.messageOrders',compact('messageorders'));
  }

  public function messageRequests()
  {
    $messagerequests = MessageRequests::all();
    return view('ProgramDirector/History.messageRequests',compact('messagerequests'));
  }

  public function MessageDonors()
  {
    $messagedonors = MessageDonors::all();
    return view('ProgramDirector/History.MessageDonors',compact('messagedonors'));
  }


}
