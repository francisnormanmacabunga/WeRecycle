<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Points;
use DB;
use Auth;
use Cart;

class DonorsCatalogController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:donor');
  }

  public function donationCatalog()
  {
    if (request()->has('category')){
      $products1 = Products::SELECT('*')
      -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
      -> where('productstype.productstypeID','1')
      -> where('status','Activated')
      -> where('category',request('category'))
      -> sortable()
      -> get();
    } else {
      $products1 = Products::SELECT('*')
      -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
      -> where('productstype.productstypeID','1')
      -> where('status','Activated')
      -> sortable()
      -> get();
    }
    $cartItems=Cart::instance('shop')->content();
    $cartItems1=Cart::content();
       $width = Points::where('userID',Auth::user()->userID)->first();
    return view('Donor/Catalog.donation', compact('products1','cartItems','cartItems1'))->with('width',$width);
  }

  public function shopCatalog()
  {
    $products2 = Products::SELECT('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','2')
    -> where('status','Activated')
    -> sortable()
    -> get();

    $cartItems=Cart::instance('shop')->content();
    $cartItems1=Cart::content();
   $width = Points::where('userID',Auth::user()->userID)->first();
    return view('Donor/Catalog.shop', compact('products2','cartItems','cartItems1'))->with('width',$width);
  }

  public function backtoshopcat()
  {
    $products2 = Products::SELECT('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','2')
    -> where('status','Activated')
    -> sortable()
    -> get();

    $donor = Auth::user();
    DB::table('orders')->where('userID',$donor->userID)->delete();

    $cartItems=Cart::instance('shop')->content();
    $cartItems1=Cart::content();
       $width = Points::where('userID',Auth::user()->userID)->first();
    return view('Donor/Catalog.shop', compact('products2','cartItems','cartItems1'))->with('width',$width);
  }

  public function backtodoncat()
  {
    $products1 = Products::SELECT('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','1')
    -> where('status','Activated')
    -> sortable()
    -> get();

    $donor = Auth::user();
    DB::table('request')->where('userID',$donor->userID)->delete();
    $cartItems=Cart::instance('shop')->content();
    $cartItems1=Cart::content();
       $width = Points::where('userID',Auth::user()->userID)->first();
    return view('Donor/Catalog.donation', compact('products1','cartItems','cartItems1'))->with('width',$width);
  }

}
