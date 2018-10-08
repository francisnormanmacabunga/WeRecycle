<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ManageCatalogController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function manageDonation()
  {
    //DONATION
    $products1 = DB::table('products')
    ->select('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','1')
    ->get();

    return view('Admin/Catalog.manageDonation', compact('products1'));
  }

  public function manageShop()
  {
    //SHOP
    $products2 = DB::table('products')
    ->select('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','2')
    ->get();

    return view('Admin/Catalog.manageshop', compact('products2'));
  }

}
