<?php

namespace App\Http\Controllers\Donor;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Requests;
use App\Models\Donor;
use Auth;
use DB;

class DonateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:donor');
    }

    public function index()
    {
       $cartItems=Cart::content();
       return view('Donor/Donate.index',compact('cartItems'));
    }

    public function addItem($id)
    {
      session()->flash('notif','Item has been added to donation list!');
      $products = Products::find($id);
      Cart::add($products->productsID,$products->productname,1,$products->price);
      return back();
    }

    public function update(Request $request, $id)
    {
      Cart::update($id,['qty'=>$request->qty,"options"=>['size'=>$request->size]]);
      return back();
    }

    public function destroy($id)
    {
      Cart::remove($id);
      return back();
    }

    public function checkout()
    {

      $donor = Auth::user();
      $cartItems=Cart::content();
      $qty = Cart::count();


    if ($qty < 1000 || $qty > 10000) {

      session()->flash('notif','Donated Items is less the 1000g/1 Kilo.');
      return back();

    }else {

      $request = new Requests();
      $request->userID = $donor->userID;
      $request->type = 'Donate';
      $request->cart = $cartItems;
      $request->quantity = $qty;
      $request->status = 'Inactive';
      $request->save();

      return redirect()->route('donate.checkout');

    }


      //return redirect()->route('dcheckout');
      /*$test = order::SELECT('*')
      -> where('userID',$donor->userID)
      -> get();*/
      //$test2 = order::find();
      //$test3 = order::where('userID', $donor->userID)->first();
      //$requesttable = DB::select('select * from orders where userID = ?', [$donor->userID]);
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

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

}
