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
          <th>Status</th>
        </tr>
        @foreach ($order as $orders)
        <tr>
          <td> {{$orders->fname}} {{$orders->lname}} </td>
          <td> Barangay: {{$orders->barangay}}, {{$orders->street}}, {{$orders->city}}, Zip: {{$orders->zip}} </td>
          <td> {{$orders->status}} </td>
        </tr>
        @endforeach
    </table>
    <table class="table table-bordered" class="fixed">
      <tr>
        <th>Item Name</th>
      </tr>
      <tr>
        <td>{{$orders->cart}}</td>
      </tr>
    </table>
    </div>
    </div>
  </div>

@endsection
