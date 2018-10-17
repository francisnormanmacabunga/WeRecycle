@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')


<div class="row">
  <div class="col-lg-3">
  <h3>Requests Messages</h3>
  <div class="list-group">
    <a href="/programdirector/messageOrders" class="list-group-item">Orders Messages</a>
    <a href="/programdirector/messageRequests" class="list-group-item">Requests Messages</a>
    <a href="/programdirector/messageDonors" class="list-group-item">Donors Messages</a>
  </div>

  </div>
  <div class="col-lg-9">
    <div class="row">
          @if(count($messagerequests) > 0)
          <table class="table table-bordered" class="fixed">
            <br/>
            <br>
            <br>
            <tr>
              <th>@sortablelink('created_at', 'Date')</th>
              <th>Assigned Volunteer</th>
              <th>Message</th>
            </tr>
            @foreach ($messagerequests as $messagerequest)
            <tr>
              <td> {{date('F d, Y, h:i:sa', strtotime($messagerequest->created_at))}} </td>
              <td>{{$messagerequest->volunteer->firstname}} {{$messagerequest->volunteer->lastname}}</td>
              <td> {{$messagerequest->message}} </td>
            </tr>
            @endforeach
        </table>
        @else
        <div align="center" style="color:red;">
          <br>
          <br>
          <h5 style="font-family:serif;">No messages found.</h5>
        </div>
        @endif
      </div>
      </div>

@endsection
