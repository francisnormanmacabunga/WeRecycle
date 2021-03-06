<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;

class ShopController extends Controller
{

    public function shopCatalog()
    {
      $products2 = Products::SELECT('*')
      -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
      -> where('productstype.productstypeID','2')
      -> where('status','Activated')
      -> sortable()
      -> get();

      return view('Guest.shop', compact('products2'));
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


      return view('Guest.donation', compact('products1'));
    }

}
