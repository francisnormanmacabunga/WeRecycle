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
      @if(count($shop) > 0)
      <table class="table table-bordered" class="fixed">
        <tr>
          <th>Name of Volunteer</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Amount</th>
          <th>@sortablelink('created_at', 'Date')</th>
          <th>Status</th>
        </tr>
        @foreach ($shop as $shops)
          @php
            $cart = json_decode($shops->cart);
          @endphp
        <tr>
          <td>{{$shops->volunteer['firstname']}} {{$shops->volunteer['lastname']}}</td>
          @foreach($cart as $item)
          <td>{{$item->name}}</td>
          <td>{{$item->qty}}</td>
          <td>{{$item->price}}</td>
          @endforeach
        <td>{{date('F d, Y, h:i:sa', strtotime($shops->created_at))}}</td>
          <td>{{$shops->status}}</td>

        </tr>
        @endforeach
    </table>
  @else
  <div align="center" style="color:red;">
    <h4 style="font-family:serif;">No orders found.</h4>
  </div>
  @endif
  </div>
</div>

@endsection
