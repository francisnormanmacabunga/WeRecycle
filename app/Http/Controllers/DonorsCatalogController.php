<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\productsTable;

class DonorsCatalogController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:donor');
  }
  
  public function donationCatalog(){

    $products1 = productsTable::SELECT('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','1')
    -> where('status','Activated')
    -> sortable()
    -> get();

    return view('usersCatalog.donation', compact('products1'));
  }

  public function shopCatalog(){

    $products2 = productsTable::SELECT('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','2')
    -> where('status','Activated')
    -> sortable()
    -> get();

    return view('usersCatalog.shop', compact('products2'));
  }
}
