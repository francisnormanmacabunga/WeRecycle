<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\productsTable;
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
}
