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

    <!--@foreach($cartItems as $item)
    <tr>
<<<<<<< HEAD:resources/views/program_directors/donationHistory.blade.php
<?php  ?>
      <td>{{$donationhistory[0]['fname']}}</td>
=======

      <td>{{$donationhistory['fname']}}</td>
>>>>>>> 266e8d37e45fba61e019f3d07cf512f3efe6884e:resources/views/Donor/History/donationHistory.blade.php
      <td></td>
      <td>{{$item->name}},{{$item->price}},{{$item->qty}}</td>
      <td></td>
      <td>{{$donationhistory['created_at']}}</td>
      <td>{{$donationhistory['status']}}</td>
    </tr>
    @endforeach -->
  </table>



</div>
</div>
</div>

@endsection
