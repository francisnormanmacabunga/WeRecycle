<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\productsTable;
use App\order;
use App\donor;
use Auth;
class CartController extends Controller
{

  public function __construct()
  {
      //$this->middleware('auth:donor');

      $this->middleware('guest', ['only'=> [
        'create',
        'store'
        ]]);

        $this->middleware('auth:donor', ['except'=> [
          'create',
          'store'
          ]]);
  }

  public function index()
   {
       $cartItems=Cart::content();
       return view('cart.index',compact('cartItems'));
   }

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

   public function addItem($id)
   {
       session()->flash('notif','Item has been added to cart!');
       $products = productsTable::find($id);
       Cart::add($products->productsID,$products->productname,1,$products->price);

       return back();
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
//        dd(Cart::content());
//        dd($request->all());

       Cart::update($id,$request->qty);
       return back();
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Cart::remove($id);
       return back();
   }

   public function checkout()
   {
$donor = Auth::user();
$order = new order();
$cartItems=Cart::content();

$order->userID = $donor->userID;
$order->cart = serialize($cartItems);
$order->fname = $donor->firstname;
$order->lname = $donor->lastname;
$order->username = $donor->username;
$order->email = $donor->email;
$order->street = $donor->street;
$order->barangay = $donor->barangay;
$order->city = $donor->city;
$order->zip = $donor->zip;
$order->save();
 session()->flash('notif','checkout successful!');
cart::destroy();
return back();
}
}
