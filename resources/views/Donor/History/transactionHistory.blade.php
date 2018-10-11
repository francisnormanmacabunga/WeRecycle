@extends('layouts.frontend')
@include('layouts.donor-nav')

@section('content')

<div class="row">
  <div class="col-lg-3">
  <h3>Orders History</h3>
  <div class="list-group">
      <a href="/donor/donationhistory" class="list-group-item">Donation History</a>
      <a href="/donor/transactionhistory" class="list-group-item">Orders History</a>
  </div>

  </div>
  <div class="col-lg-9">
    <div class="row">

      <table class="table table-bordered" class="fixed">
        <tr>
          <th>Name of Volunteer</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Amount</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
        @foreach ($shop as $shops)
          @php
            $cart = json_decode($shops->cart);
          @endphp
        <tr>
          <td>Sample: Carlo</td>
          @foreach($cart as $item)
          <td>{{$item->name}}</td>
          <td>{{$item->qty}}</td>
          <td>{{$item->price}}</td>
          @endforeach
          <td>{{$shops->created_at}}</td>
          <td>{{$shops->status}}</td>

        </tr>
        @endforeach
    </table>
  </div>
</div>

@endsection
