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
<<<<<<< HEAD:resources/views/program_directors/donationHistory.blade.php
    @foreach ($donationhistory as $history)
    <tr>
      <td>{{$history->users->username}}</td>
      <td>{{$history->users->username}}</td>
      <td>{{$history->fname}}</td>
      <td>James Pramono</td>
      <td>{{$history->created_at}}</td>
      <td>Delivered</td>
=======

    <!--@foreach($cartItems as $item)
    <tr>

      <td>{{$donationhistory['fname']}}</td>
      <td></td>
      <td>{{$item->name}},{{$item->price}},{{$item->qty}}</td>
      <td></td>
      <td>{{$donationhistory['created_at']}}</td>
      <td>{{$donationhistory['status']}}</td>
>>>>>>> 266e8d37e45fba61e019f3d07cf512f3efe6884e:resources/views/Donor/History/donationHistory.blade.php
    </tr>
    @endforeach -->
  </table>



</div>
</div>
</div>

@endsection
