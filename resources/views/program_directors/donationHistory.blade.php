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
      <th>Order</th>
      <th>Assigned Volunteer</th>
      <th>Date</th>
      <th>Status</th>
    </tr>
    @foreach($cartItems as $item)
    <tr>
      <td>{{$item->userID}}</td>
      <td></td>
<table>
  
  <td>{{$item->name}}{{$item->price}}{{$item->qty}}</td>
</table>

      <td></td>
      <td>{{$item->created_at}}</td>
      <td>{{$item->status}}</td>
    </tr>
    @endforeach
  </table>



</div>
</div>
</div>
@endsection
