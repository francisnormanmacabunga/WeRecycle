<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Order;
use Auth;
use DB;

class DonateCheckoutController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:donor');
    }

    public function index()
    {
      $donor = Auth::user();
      $order = Order::where('userID', $donor->userID)->first();
      //$cartItems=Cart::content(); //bago
      $cartItems=Cart::content();
      //$cartItems = unserialize($order->cart);
      return view('Donor/Donate/Checkout.index',compact('cartItems'))->with(['order' => $order ]);
    }

    public function confirm($id)
    {
      $donor = Auth::user();
      $order = Order::where('userID', $donor->userID)->first();
      $cartItems=Cart::content();

      $trans = new Transaction;
      $trans->userID = $order->userID;
      $trans->type = $order->type;
      //$trans->cart = serialize($cartItems); old

      $trans->cart = $cartItems; 
      $trans->fname = $order->fname;
      $trans->lname = $order->lname;
      $trans->street = $order->street;
      $trans->barangay = $order->barangay;
      $trans->city = $order->city;
      $trans->zip = $order->zip;
      $trans->status = 'Active';
      $trans->save();

      Cart::destroy();
      DB::table('orders')->where('userID',$donor->userID)->delete();
      return redirect('/donor');
    }

    /*public function edit($id)
    {
      $donor = Auth::user();
      $order = DB::select('select * from orders where userID = ?', [$donor->userID]);
      return view('checkout.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
      $order = Order::find($id);
      $order->city = $request->input('city');
      $order->street = $request->input('street');
      $order->barangay = $request->input('barangay');
      $order->zip = $request->input('zip');
      $order->push();
      return redirect('/donor/donors')->with('success','Profile updated');
    }*/

    /*public function __construct()
    {
      $this->middleware('auth:donor');

      $this->middleware('guest', ['only'=> [
        'create',
        'store'
        ]]);

      $this->middleware('auth:donor', ['except'=> [
        'create',
        'store'
        ]]);
    }*/

    /*public function checkout()
    {
      $donor = Auth::user();
      $test3 = order::where('userID', $donor->userID)->first();
      return view('checkout.index',compact('test3'))->with(['test3' => $test3 ]);
    }*/
}
