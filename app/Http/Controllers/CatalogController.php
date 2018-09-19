<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productsTable;
use Illuminate\Support\Facades\Input;
use DB;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products1 = DB::table('products')
      ->select('*')
      -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
      -> where('productstype.productstypeID','1')

      ->get();

      $products2 = DB::table('products')
      ->select('*')
      -> join('productstype', 'productstype.productstypeID', '=', 'products.productstypeID')
      -> where('productstype.productstypeID','2')
      ->get();

      return view('catalog.index', compact('products1', 'products2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $filename = $request->file('productimage')->getClientOriginalName();
     $moveImage = $request->file('productimage')->move('images', $filename);

      $products = new productsTable();
      $products->productstypeID = $request->input('productstypeID');
      $products->productname = $request->input('productname');
      $products->productimage = $filename;
      $products->description = $request->input('description');
      $products->price = $request->input('price');
      $products->status = $request->input('status');

      $products->save();
      return redirect('/catalog')->with('success', 'Item added');
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
      $products = productsTable::find($id);
      return view('catalog.edit', compact('products'));
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
      $products = productsTable::find($id);
      $products->status = $request->input('status');
      $products->save();
      return redirect('/catalog')->with('success', 'Item updated');
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
