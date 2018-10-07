<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use DB;

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

    return view('usersCatalog.donation', compact('products1'));
  }

  public function shopCatalog()
  {
    $products2 = Products::SELECT('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','2')
    -> where('status','Activated')
    -> sortable()
    -> get();

    return view('usersCatalog.shop', compact('products2'));
  }

}
