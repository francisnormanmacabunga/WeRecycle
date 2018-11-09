<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use DB;
use Auth;
<<<<<<< HEAD
=======

>>>>>>> 92ee42754aede2aa6bd509cf44e02c10dde97bae
class DonorsCatalogController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:donor');
  }

  public function donationCatalog()
  {
    $products1 = Products::SELECT('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','1')
    -> where('status','Activated')
    -> sortable()
    -> get();

    return view('Donor/Catalog.donation', compact('products1'));
  }

  public function shopCatalog()
  {
    $products2 = Products::SELECT('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','2')
    -> where('status','Activated')
    -> sortable()
    -> get();

    return view('Donor/Catalog.shop', compact('products2'));
  }

<<<<<<< HEAD
  public function backtoshopcat(){
    $products1 = Products::SELECT('*')
=======
  public function backtoshopcat()
  {
    $products2 = Products::SELECT('*')
>>>>>>> 92ee42754aede2aa6bd509cf44e02c10dde97bae
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','2')
    -> where('status','Activated')
    -> sortable()
    -> get();

    $donor = Auth::user();
    DB::table('orders')->where('userID',$donor->userID)->delete();
<<<<<<< HEAD

    return view('Donor/Catalog.donation', compact('products1'));

  }

  public function backtodoncat(){
=======
    return view('Donor/Catalog.shop', compact('products2'));
  }

  public function backtodoncat()
  {
>>>>>>> 92ee42754aede2aa6bd509cf44e02c10dde97bae
    $products1 = Products::SELECT('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','1')
    -> where('status','Activated')
    -> sortable()
    -> get();

    $donor = Auth::user();
    DB::table('request')->where('userID',$donor->userID)->delete();
<<<<<<< HEAD

    return view('Donor/Catalog.donation', compact('products1'));

=======
    return view('Donor/Catalog.donation', compact('products1'));
>>>>>>> 92ee42754aede2aa6bd509cf44e02c10dde97bae
  }

}
