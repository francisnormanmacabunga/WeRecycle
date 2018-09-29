<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\productsTable;

class ManageCatalogController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function manageDonation(){

    //DONATION
    $products1 = DB::table('products')
    ->select('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','1')
    ->get();

      return view('catalog.manageDonation', compact('products1'));
  }

  public function manageShop(){

    //SHOP
    $products2 = DB::table('products')
    ->select('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','2')
    ->get();


      return view('catalog.manageshop', compact('products2'));
  }




}
