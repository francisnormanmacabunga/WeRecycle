@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')

  <div class="row">
    <div class="col-lg-3">
    <div class="list-group">
      <h3>View Request</h3>
      <a href="/programdirector/requests" class="list-group-item">View Requests</a>
      <a href="/programdirector/orders" class="list-group-item">View Orders</a>
    </div>
    </div>
    <div class="col-md-9">
    <div class="row">
      @if(count($request) > 0)
      <table class="table table-bordered" class="fixed">
        <tr>
          <th>Date</th>
          <th>Name</th>
          <th>Address</th>
          <th>Item Type</th>
          <th>Item Name</th>
          <th>Item Quantity</th>
          <th>Status</th>
          <th>Assigned Volunteer</th>
          <th>Action</th>
        </tr>
        @foreach ($request as $requests)
          @php
            $cart = json_decode($requests->cart);
          @endphp
        <tr>
          <td> {{date('F d, Y, h:i:sa', strtotime($requests->created_at))}} </td>
          <td> {{$requests->donor->firstname}} {{$requests->donor->lastname}} </td>
          <td> Barangay: {{$requests->donor->barangay}}, {{$requests->donor->street}}, {{$requests->donor->city}}, Zip: {{$requests->donor->zip}} </td>
          <td> {{$requests->type}} </td>
          @foreach($cart as $item)
          <td>{{$item->name}}</td>
          <td>{{$item->qty}}</td>
          @endforeach
          <td> {{$requests->status}} </td>
          <td> {{$requests->volunteer['firstname']}} {{$requests->volunteer['lastname']}}</td>
          <th>
            <a class="btn btn-block btn-primary" href="/programdirector/sendSMS-V-R" role="button">Message Volunteer</a>
            <a class="btn btn-block btn-primary" href="/programdirector/sendSMS-D-R" role="button">Message Donor</a>
            <a class="btn btn-block btn-primary" href="/programdirector/requests/{{$requests->transid}}/edit" role="button">Manage Transaction</a>
          </th>
        </tr>
        @endforeach
    </table>
  @else
  <div align="center" style="color:red;">
    <h4 style="font-family:serif;">Nothing found.</h4>
  </div>
  @endif
    </div>
    </div>
  </div>

@endsection
