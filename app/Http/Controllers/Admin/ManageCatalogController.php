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
    if (request()->has('category')){
      $products1 = Products::Select('*')
      -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
      -> where('category', request('category'))
      -> where('productstype.productstypeID','1')
      -> sortable()
      -> paginate(10)->appends('category', request('category'));
    } else {
      $products1 = Products::Select('*')
      -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
      -> where('productstype.productstypeID','1')
      -> sortable()
      -> paginate(10);
    }

    /*$products1 = Products::Select('*')
    -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
    -> where('productstype.productstypeID','1')
    -> sortable()
    -> paginate(10);*/

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

}
