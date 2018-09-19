@extends('layouts.backend')
@include('inc.navbar5')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <br/>
      <h3 align="center">Shop Catalog</h3>
      <br/>
      <br/>
      <table class="table table-bordered">
        <tr>
          <th>Item Type</th>
          <th>Name</th>
          <th>Preview</th>
          <th>Price</th>
          <th>Description</th>
          <th>Date Created</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        @foreach ($products1 as $product)
        <tr>
          <th>{{$product->productstype}}</th>
          <th>{{$product->productname}}</th>
          <th> <img src="{{ asset('images/' . $product->productimage) }}"> </th>
          <th>{{$product->price}}</th>
          <th>{{$product->description}}</th>
          <td>{{date('F d, Y, h:i:sa', strtotime($product->created_at))}}</td>
          <th>{{$product->status}}</th>
          <th><a class="btn btn-lg btn-block btn-primary" href="/catalog/{{$product->productsID}}/edit" role="button">Update item </a></th>
        </tr>
      @endforeach
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <br/>
      <h3 align="center">Donation Catalog</h3>
      <br/>
      <br/>
      <table class="table table-bordered">
        <tr>
          <th>Item Type</th>
          <th>Name</th>
          <th>Preview</th>
          <th>Price</th>
          <th>Description</th>
          <th>Date Created</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        @foreach ($products2 as $product)
        <tr>
          <th>{{$product->productstype}}</th>
          <th>{{$product->productname}}</th>
          <th> <img src="{{ asset('images/' . $product->productimage) }}"> </th>
          <th>{{$product->price}}</th>
          <th>{{$product->description}}</th>
          <td>{{date('F d, Y, h:i:sa', strtotime($product->created_at))}}</td>
          <th>{{$product->status}}</th>
          <th><a class="btn btn-lg btn-block btn-primary" href="/catalog/{{$product->productsID}}/edit" role="button">Update item </a></th>
        </tr>
      @endforeach
      </table>
    </div>
  </div>

@endsection
