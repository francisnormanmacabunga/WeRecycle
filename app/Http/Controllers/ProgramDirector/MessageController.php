<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MessageOrders;
use App\Models\MessageRequests;


class MessageController extends Controller
{

  public function messageOrders()
  {
    $messageorders = MessageOrders::all();
    return view('ProgramDirector/History.messageorders',compact('messageorders'));
  }

  public function messageRequests()
  {
    $messagerequests = MessageRequests::all();
    return view('ProgramDirector/History.messagerequests',compact('messagerequests'));
  }



}
