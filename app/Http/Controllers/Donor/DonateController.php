<?php

namespace App\Http\Controllers\Donor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Products;
use App\order;
use App\donor;
use Auth;
use DB;
class DonateController extends Controller
{

public function __construct(){
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
       return view('donate.index',compact('cartItems'));
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
       session()->flash('notif','Item has been added to donation list!');
       $products = Products::find($id);
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
       Cart::update($id,['qty'=>$request->qty,"options"=>['size'=>$request->size]]);
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
        $order->type= 'Donate';
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

  //$test3 = order::where('userID', $donor->userID)->first();

  //$ordertable = DB::select('select * from orders where userID = ?', [$donor->userID]);
  return redirect()->route('dcheckout');
  }

}
