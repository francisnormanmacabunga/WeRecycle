@extends('layouts.frontend')
@include('layouts.admin-nav')


@section('content')

    <div class="row">
      <div class="col-lg-3">
      <h4>Manage Shop Catalog</h4>
      <div class="list-group">
          <a href="/admin/managedonation" class="list-group-item">Manage Donation Catalog</a>
          <a href="/admin/manageshop" class="list-group-item">Manage Shop Catalog</a>
      </div>
      </div>

    <div class="col-md-9">
    <div class="row">

      @if(count($products2) > 0)
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
        @foreach ($products2 as $products)
        <tr>
          <td>{{$products->productstype}}</td>
          <td>{{$products->productname}}</td>
          <td><img src="{{ asset('images/' . $products->productimage) }}" width="200" height="200"></td>
          <td>{{$products->price}}</td>
          <td>{{$products->description}}</td>
          <td>{{date('F d, Y, h:i:sa', strtotime($products->created_at))}}</td>
          <td>{{$products->status}}</td>
          <th><a class="btn btn-block btn-primary" href="/admin/catalog/{{$products->productsID}}/edit" role="button">Update Status </a></th>
        </tr>
        @endforeach
      </table>
    @else
    <div align="center" style="color:red;">
      <br>
      <br>
      <h5 style="font-family:serif;">No records in donation catalog found.</h5>
    </div>
    @endif
    </div>
  </div>
</div>
@endsection
