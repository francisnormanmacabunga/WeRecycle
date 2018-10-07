@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')


<div>
<div class="row">

      <h1>Donation History</h1>

      <table class="table table-bordered">
      <tr>
      <th>Username</th>
      <th>Type of donation</th>
      <th>Order(name,price,quantity)</th>
      <th>Assigned Volunteer</th>
      <th>Date</th>
      <th>Status</th>
    </tr>

    @foreach($cartItems as $item)
    <tr>

      <td>{{$donationhistory[0]['fname']}}</td>
      <td></td>
      <td>{{$item->name}},{{$item->price}},{{$item->qty}}</td>
      <td></td>
      <td>{{$donationhistory[0]['created_at']}}</td>
      <td>{{$donationhistory[0]['status']}}</td>
    </tr>
    @endforeach
  </table>



</div>
</div>
</div>
@endsection
