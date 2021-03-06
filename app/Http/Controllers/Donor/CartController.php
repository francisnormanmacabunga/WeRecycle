<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Order;
use App\Models\Donor;
use App\Models\Reward;
use Auth;
use DB;
use App\Models\Points;
class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:donor');
    }

    public function index()
    {
       $width = Points::where('userID',Auth::user()->userID)->first();
       $cartItems=Cart::instance('shop')->content();
       return view('Donor/Cart.index',compact('cartItems'))->with('width',$width);
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

    public function checkout(Request $request)
    {
      $donor = Auth::user();
      $cartItems=Cart::instance('shop')->content();
      $code = $request->dcode;
      $qty = Cart::count();
//dd($qty);


if (count($cartItems) > 0) {

  if($qty <= 0 || $qty <= 15){

    if ($code == '') {

    $total = Cart::instance('shop')->subtotal();

      $order = new Order();
      $order->userID = $donor->userID;
      $order->type= 'Shop';
      $order->cart = $cartItems;
      $order->price = $total;
      $order->status = 'Inactive';
      $order->save();


      return redirect()->route('cart.checkout');

    }else{
      //$reward = Reward::SELECT('select code from reward where code = ?',[$code]);
      $reward = Reward::Where('code', $code)->where('status','Activated')->get();

    if(count($reward) > 0){
      $total = Cart::instance('shop')->subtotal();
      $discount = Cart::instance('shop')->subtotal() * 0.10;

    $order = new Order();
    $order->userID = $donor->userID;
    $order->type= 'Shop';
    $order->cart = $cartItems;
    $order->discountedprice = $total - $discount;
    $order->status = 'Inactive';
    $order->code = $request->input('dcode');
    $order->save();


    return redirect()->route('cart.checkout');
    }else {
    session()->flash('notie','Invalid/Incorrect Code');
     return view('Donor/Cart.index',compact('cartItems'));
    }


    }

  }else {
    session()->flash('notell','More than 15 items in cart.');
    return back();
  }

}else{
    session()->flash('notell','No items in cart!');
    return back();
}

}
      /*$test = order::SELECT('*')
      -> where('userID',$donor->userID)
      -> get();*/
      //$test2 = order::find();
      //$ordertable = DB::select('select * from orders where userID = ?', [$donor->userID]);


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
