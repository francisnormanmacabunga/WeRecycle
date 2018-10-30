<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\Products;
use DB;


class CatalogImageController extends Controller

{
      public function __construct()
      {
        $this->middleware('auth:admin');
      }

      public function edit($id)
      {
        $products = Products::find($id);
        return view('Admin/Catalog.editimage', compact('products'));
      }


      public function update(Request $request, $id)
      {
        $this->validate($request, [
        'productimage' => 'required|mimes:jpeg,jpg,png|image|max:5000'
      ],
      [
        'productimage.required' => 'New product image is required, or else GO BACK.',
        'productimage.mimes' => 'Image must be in JPG/JPEG or PNG format',
        'productimage.max' => 'Image must be less than 5MB.'
      ]);

        $validator = Validator::make($request->all(), [
        'productimage' => 'max:1'

      ]);
        $filename = $request->file('productimage')->getClientOriginalName();
        $moveImage = $request->file('productimage')->move('images', $filename);

        $products = Products::find($id);
        $products->productimage = $filename;

        $products->save();
        return redirect('/admin/managedonation')->with('success', 'Image updated');
      }
}
