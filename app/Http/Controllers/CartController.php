<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\productsTable;
use App\order;
use App\donor;
use Auth;
use DB;
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
       $cartItems=Cart::instance('shop')->content();
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
       Cart::instance('shop')->add($products->productsID,$products->productname,1,$products->price);


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
        $order = new order();
        $cartItems=Cart::instance('shop')->content();

        $order->userID = $donor->userID;
        $order->type= 'Shop';
        $order->cart = serialize($cartItems);
        $order->fname = $donor->firstname;
        $order->lname = $donor->lastname;
        $order->street = $donor->street;
        $order->barangay = $donor->barangay;
        $order->city = $donor->city;
        $order->zip = $donor->zip;
        $order->status = 'Inactive';


        $order->save();


/*$test = order::SELECT('*')
-> where('userID',$donor->userID)
-> get();*/

//$test2 = order::find();

$test3 = order::where('userID', $donor->userID)->first();

//$ordertable = DB::select('select * from orders where userID = ?', [$donor->userID]);
return redirect()->route('checkout');
}
}
