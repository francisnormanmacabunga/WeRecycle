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
      //$request = Transaction::where('type', 'Donate');
      $request = Transaction::SELECT('*')
      -> where('type', 'Donate')
      -> get();

      return view('ProgramDirector/ManageVolunteers.requests',compact('request'));
    }

    public function orders()
    {
<<<<<<< HEAD
      $order = Transaction::all();
=======
      $order = Transaction::SELECT('*')
      -> where('type', 'Shop')
      -> get();

>>>>>>> 186cbc137e03df50510da76e4dc38d15a60d3195
      return view('ProgramDirector/ManageVolunteers.orders',compact('order'));
    }

}
