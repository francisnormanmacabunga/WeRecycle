@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')


<div class="row">
  <div class="col-lg-3">
  <h3>Orders Messages</h3>
  <div class="list-group">
    <a href="/programdirector/messageOrders" class="list-group-item">Orders Messages</a>
    <a href="/programdirector/messageRequests" class="list-group-item">Requests Messages</a>
    <a href="/programdirector/messageDonors" class="list-group-item">Donors Messages</a>
  </div>

  </div>
  <div class="col-lg-9">
    <div class="row">

          <table class="table table-bordered" class="fixed">
            <br/>
            <br>
            <br>
            <tr>
              <th>Date</th>
              <th>Assigned Volunteer</th>
              <th>Message</th>
            </tr>
            @foreach ($messageorders as $messageorder)
            <tr>
              <td> {{date('F d, Y, h:i:sa', strtotime($messageorder->created_at))}} </td>
              <td> {{$messageorder->volunteer->firstname}} {{$messageorder->volunteer->lastname}} </td>
              <td> {{$messageorder->message}} </td>
            </tr>
            @endforeach
        </table>
      </div>
      </div>

@endsection
