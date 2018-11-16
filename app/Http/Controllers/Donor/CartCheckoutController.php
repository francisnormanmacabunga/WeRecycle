<?php
namespace App\Http\Controllers\Donor;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Reward;
use App\Models\Order;
use Auth;
use DB;
use App\Models\Points;
class CartCheckoutController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:donor');
    }

    public function index()
    {
      $width = Points::where('userID',Auth::user()->userID)->first();
      $donor = Auth::user();
      $order = Order::where('userID', $donor->userID)->first();
      $cartItems= Cart::instance('shop')->content();
    return view('Donor/Cart/Checkout.index',compact('cartItems'))->with(['order' => $order ])->with(['donor' => $donor])->with(['width' => $width]);
    }

    public function confirm($id)
    {
      $donor = Auth::user();
      $order = Order::where('userID', $donor->userID)->orderBy('created_at', 'desc')->first();
      if ($order->code == '') {
        $trans = new Transaction;
        $trans->userID = $order->userID;
        $trans->cart = $order->cart;
        $trans->price = $order->price;
        $trans->discountedprice = $order->discountedprice;
        $trans->type = $order->type;
        $trans->status = 'Processing';
        $trans->code = $order->code;
        $trans->save();

        cart::instance('shop')->destroy();

        DB::table('orders')->where('userID',$donor->userID)->delete();
        session()->flash('notif','Order Process Successful!');
        return redirect('/donor');
      }else {
        $trans = new Transaction;
        $trans->userID = $order->userID;
        $trans->cart = $order->cart;
        $trans->price = $order->price;
        $trans->discountedprice = $order->discountedprice;
        $trans->type = $order->type;
        $trans->status = 'Processing';
        $trans->code = $order->code;
        $trans->save();

        cart::instance('shop')->destroy();

        DB::table('orders')->where('userID',$donor->userID)->delete();

        $code = Reward::where('code',$order->code)->first();
        $code->status = 'Deactivated';
        $code->push();

        session()->flash('notif','Order Process Successful!');
        return redirect('/donor');
      }

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

    /*public function checkout()
    {
      $donor = Auth::user();
      $test3 = order::where('userID', $donor->userID)->first();
      return view('checkout.index',compact('test3'))->with(['test3' => $test3 ]);
    }*/

    /*public function __construct()
    {
      $this->middleware('guest', ['only'=> [
        'create',
        'store'
        ]]);

      $this->middleware('auth:donor', ['except'=> [
        'create',
        'store'
        ]]);
     }*/

}
