@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')

  <div class="row">
    <div class="col-lg-3">
    <div class="list-group">
      <a href="/programdirector/requests" class="list-group-item">View Requests</a>
      <a href="/programdirector/orders" class="list-group-item">View Orders</a>
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
          <th>Assigned Volunteer</th>
          <th>Action</th>
        </tr>
        @foreach ($order as $orders)
          @php
            $cart = json_decode($orders->cart);
          @endphp
        <tr>
          <td> {{$orders->user->firstname}} {{$orders->user->lastname}} </td>
          <td> Barangay: {{$orders->user->barangay}}, {{$orders->user->street}}, {{$orders->user->city}}, Zip: {{$orders->user->zip}} </td>
          <td> {{$orders->type}} </td>
          @foreach($cart as $item)
          <td>{{$item->name}}</td>
          <td>{{$item->price}}</td>
          <td>{{$item->qty}}</td>
          @endforeach
          <td> {{$orders->status}} </td>
          <td> {{$messageOrder->user->firstname}} </td>
          <th>
            <a class="btn btn-block btn-primary" href="/programdirector/sendSMS-V-O/transactionID={{$orders->transid}}" role="button">Assign Volunteer</a>
            <a class="btn btn-block btn-primary" href="/programdirector/orders/{{$orders->transid}}/edit" role="button">Update Status</a>
          </th>
        </tr>
        @endforeach
    </table>

    </div>
  </div>

@endsection
