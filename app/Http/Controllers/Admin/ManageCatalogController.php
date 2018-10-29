<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
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
    $products1 = Products::Select('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','1')
    -> sortable()
    -> paginate(10);

    return view('Admin/Catalog.manageDonation', compact('products1'));
  }

  public function manageShop()
  {
    //SHOP
    $products2 = Products::Select('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','2')
    -> sortable()
    -> paginate(10);

    return view('Admin/Catalog.manageshop', compact('products2'));
  }

public function sortby(){

  if (request()->has('status')){
  $products1 = Products::SELECT('*')
  -> where('category',request('status'))
  -> where('products.productstypeID','1')
  -> sortable()
  -> paginate(10)->appends('activity', request('status'));
  } else {
  $products1 = Products ::SELECT('*')
  -> where('products.productstypeID','1')
  -> sortable()
  -> paginate(10);
  }

  return view('Admin/Catalog.manageDonation')->with(['products1' => $products1]);

}

public function sortby1(){

  if (request()->has('status')){
  $products2   = Products::SELECT('*')
  -> where('category',request('status'))
  -> where('products.productstypeID','2')
  -> sortable()
  -> paginate(10)->appends('activity', request('status'));
  } else {
  $products2 = Products ::SELECT('*')
  -> where('products.productstypeID','2')
  -> sortable()
  -> paginate(10);
  }

  return view('Admin/Catalog.manageShop')->with(['products2' => $products2]);

}

}
