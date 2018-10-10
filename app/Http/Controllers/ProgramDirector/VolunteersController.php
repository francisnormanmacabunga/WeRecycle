<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Order;
use DB;

class VolunteersController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:programdirector');
    }

    public function requests()
    {
      return view('ProgramDirector/ManageVolunteers.requests');
    }

    public function orders()
    {
      $order = Transaction::all();





      return view('ProgramDirector/ManageVolunteers.orders',compact('order'));

      //$order->cart = $all;
      //$all =  unserialize(base64_decode(Cart::content()));
      //$all = Cart::content();
      //$all = Unserialize(Cart::content());
      //$all = Cart::content();
      //$order->cart = $all;
      //return view('ProgramDirector/ManageVolunteers.orders',compact('cc'));

    }

}
