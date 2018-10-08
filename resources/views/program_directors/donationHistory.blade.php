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
<<<<<<< HEAD
      <th>Quantity</th>
=======
      <th>Order(name,price,quantity)</th>
>>>>>>> 7c09f817fd697c5588b1f9c1892f03ce0cdcdb38
      <th>Assigned Volunteer</th>
      <th>Date</th>
      <th>Status</th>
    </tr>
<<<<<<< HEAD
    @foreach ($donationhistory as $history)
    <tr>
      <td>{{$history->users->username}}</td>
      <td>{{$history->users->username}}</td>
      <td>{{$history->fname}}</td>
      <td>James Pramono</td>
      <td>{{$history->created_at}}</td>
      <td>Delivered</td>
=======

    @foreach($cartItems as $item)
    <tr>
<?php  ?>
      <td>{{$donationhistory[0]['fname']}}</td>
      <td></td>
      <td>{{$item->name}},{{$item->price}},{{$item->qty}}</td>
      <td></td>
      <td>{{$donationhistory[0]['created_at']}}</td>
      <td>{{$donationhistory[0]['status']}}</td>
>>>>>>> 7c09f817fd697c5588b1f9c1892f03ce0cdcdb38
    </tr>
    @endforeach
  </table>



</div>
</div>
</div>
@endsection
