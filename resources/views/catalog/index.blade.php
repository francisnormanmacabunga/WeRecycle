@extends('layouts.frontend')
@include('layouts.admin-nav')


@section('content')


  <div class="row">
    <div class="col-md-12">
      <br/>
      <h2 align="center">Manage Catalog</h2>
      <br>
      <br>
      @if(count($products1) > 0)
      <table class="table table-bordered">
        @foreach ($products1 as $products)
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
        <tr>
          <td>{{$products->productstype}}</td>
          <td>{{$products->productname}}</td>
          <td><img src="{{ asset('images/' . $products->productimage) }}"></td>
          <td>{{$products->price}}</td>
          <td>{{$products->description}}</td>
          <td>{{date('F d, Y, h:i:sa', strtotime($products->created_at))}}</td>
          <td>{{$products->status}}</td>
          <th><a class="btn btn-lg btn-block btn-primary" href="/admin/catalog/{{$products->productsID}}/edit" role="button">Update Status </a></th>
        </tr>
        @endforeach
      </table>
    @else
      <h3 style="color:red;" align="center">No records in donation catalog found.</h3>
    @endif
    </div>
  </div>



  <div class="row">
    <div class="col-md-12">
      <br/>
      <h2 align="center">Manage Catalog</h2>
      <br>
      <br>
      @if(count($products2) > 0)
      <table class="table table-bordered">
        @foreach ($products2 as $products)
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
        <tr>
          <td>{{$products->productstype}}</td>
          <td>{{$products->productname}}</td>
          <td><img src="{{ asset('images/' . $products->productimage) }}"></td>
          <td>{{$products->price}}</td>
          <td>{{$products->description}}</td>
          <td>{{date('F d, Y, h:i:sa', strtotime($products->created_at))}}</td>
          <td>{{$products->status}}</td>
          <th><a class="btn btn-lg btn-block btn-primary" href="/admin/catalog/{{$products->productsID}}/edit" role="button">Update Status </a></th>
        </tr>
        @endforeach
      </table>
    @else
      <h3 style="color:red;" align="center">No records in donation catalog found.</h3>
    @endif
    </div>
  </div>



@endsection
