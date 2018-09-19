<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\contactsTable;

class DonorsCatalogController extends Controller
{
  public function donationCatalog(){

    return view('usersCatalog.donation');
  }

  public function shopCatalog(){

  }
}
