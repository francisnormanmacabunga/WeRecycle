<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\Products;
use DB;

class CatalogController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
      return view('Admin/Catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
      $this->validate($request, [
      'productname' => 'required|regex:/^[A-Za-z. -]+$/',
      'productstypeID' => 'required',
      'description' => 'required',
      'productimage' => 'required|mimes:jpeg,jpg,png|image|max:200',
      'category' => 'required'
    ],
    [
      'productname.required' => 'Product name is required field.',
      'productname.regex' => 'Product name must only contain letters and period.',
      'productstypeID.required' => 'Item Type is a required field.',
      'description.required' => 'Item description is a required field.',
      'description.regex' => 'Item description must only contain letters and period',
      //'price.min' => 'Price must be greater than 0.',
      'productimage.required' => 'Product image is required',
      'productimage.mimes' => 'Image must be in JPG/JPEG or PNG format',
      'productimage.max' => 'Image must be less than 200kb.',
      'category.required' => 'Product Category is required.'
    ]);

      $validator = Validator::make($request->all(), [
      'productimage' => 'max:1'


      ]);
      $filename = $request->file('productimage')->getClientOriginalName();
      $moveImage = $request->file('productimage')->move('images', $filename);

      $products = new Products();
      $products->productstypeID = $request->input('productstypeID');
      $products->productname = $request->input('productname');
      $products->productimage = $filename;
      $products->description = $request->input('description');
      $products->price = $request->input('price');
      $products->status = 'Activated';
      $products->category = $request->input('category');

      $products->save();
      return redirect('/admin/managedonation')->with('success', 'Item added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
      $products = Products::find($id);
      return view('Admin/Catalog.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
      $this->validate($request, [
      'productname' => 'regex:/^[A-Za-z. -]+$/',
      'description' => 'regex:/^[A-Za-z. -]+$/',
      'price' => 'min:0|required',
    ],
    [
      'productname.regex' => 'Product name must only contain letters and period.',
      'description.regex' => 'Item description must only contain letters and period.',
      'price.min' => 'Price must be greater than 0.',
    ]);

      $products = Products::find($id);
      $products->productname = $request->input('productname');
      $products->price = $request->input('price');
      $products->description = $request->input('description');
      $products->status = $request->input('status');

      $products->save();
      return redirect('/admin/managedonation')->with('success', 'Item updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
    }

}
