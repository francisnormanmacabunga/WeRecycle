<?php
namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Requests;
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
      $request = Requests::where('userID', $donor->userID)->first();
      $cartItems = Cart::content();
      return view('Donor/Donate/Checkout.index',compact('cartItems'))->with(['request' => $request])->with(['donor' => $donor]);
    }

    public function confirm($id)
    {
      $donor = Auth::user();
      $request = Requests::where('userID', $donor->userID)->first();
      $cartItems=Cart::content();

      $trans = new Transaction();
      $trans->userID = $request->userID;
      $trans->type = $request->type;
      $trans->cart = $cartItems;
      $trans->status = 'Processing';
      $trans->save();

      Cart::destroy();
      DB::table('request')->where('userID',$donor->userID)->delete();
      session()->flash('notif','Donation Process Successful!');
      return redirect('/donor');
    }

    /*public function edit($id)
    {
      $donor = Auth::user();
      $request = DB::select('select * from orders where userID = ?', [$donor->userID]);
      return view('checkout.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
      $request = Order::find($id);
      $request->city = $request->input('city');
      $request->street = $request->input('street');
      $request->barangay = $request->input('barangay');
      $request->zip = $request->input('zip');
      $request->push();
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
