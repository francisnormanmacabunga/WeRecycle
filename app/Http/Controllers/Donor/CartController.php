<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Order;
use App\Models\Donor;
use Auth;
use DB;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:donor');
    }

    public function index()
    {
       $cartItems=Cart::instance('shop')->content();
       return view('Donor/Cart.index',compact('cartItems'));
    }

    public function addItem($id)
    {
      session()->flash('notif','Item has been added to cart!');
      $products = Products::find($id);
      Cart::instance('shop')->add($products->productsID,$products->productname,1,$products->price);
      return back();
    }

    public function update(Request $request, $id)
    {
      Cart::instance('shop')->update($id,$request->qty);
      return back();
    }

    public function destroy($id)
    {
      Cart::instance('shop')->remove($id);
      return back();
    }

    public function checkout()
    {
      $donor = Auth::user();
      $cartItems=Cart::instance('shop')->content();

      $order = new Order();
      $order->userID = $donor->userID;
      $order->type= 'Shop';
      $order->cart = $cartItems;
      $order->status = 'Inactive';
      $order->save();

      $test3 = Order::where('userID', $donor->userID)->first();
      return redirect()->route('cart.checkout');

      /*$test = order::SELECT('*')
      -> where('userID',$donor->userID)
      -> get();*/
      //$test2 = order::find();
      //$ordertable = DB::select('select * from orders where userID = ?', [$donor->userID]);
     }

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

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

   public function create()
   {

   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

   public function store(Request $request)
   {
       //
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function show($id)
   {

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit($id)
   {

   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

}
