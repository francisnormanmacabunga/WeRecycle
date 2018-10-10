@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')

  <div class="row">
    <div class="col-lg-3">
    <div class="list-group">
      <a href="/programdirector/viewRequests" class="list-group-item">View Requests</a>
      <a href="/programdirector/viewOrders" class="list-group-item">View Orders</a>
    </div>
    </div>
    <div class="col-md-9">
    <div class="row">
      <table class="table table-bordered" class="fixed">
        <tr>
          <th>Name</th>
          <th>Address</th>
          <th>Item Type</th>
          <th>Item Name</th>
          <th>Item Price</th>
          <th>Item Quantity</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        @foreach ($request as $requests)
          @php
            $cart = json_decode($requests->cart);
          @endphp
        <tr>
          <td> {{$requests->fname}} {{$requests->lname}} </td>
          <td> Barangay: {{$requests->barangay}}, {{$requests->street}}, {{$requests->city}}, Zip: {{$requests->zip}} </td>
          <td> {{$requests->type}} </td>
          @foreach($cart as $item)
          <td>{{$item->name}}</td>
          <td>{{$item->price}}</td>
          <td>{{$item->qty}}</td>
          @endforeach
          <td> {{$requests->status}} </td>
          <th><a class="btn btn-block btn-primary" href="" role="button">Assign Volunteer</a></th>
        </tr>
        @endforeach
    </table>
    </div>
    </div>
  </div>

@endsection
