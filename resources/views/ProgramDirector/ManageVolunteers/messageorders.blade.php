@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')


<div class="row">
  <div class="col-lg-3">
  <h3>Orders Messages</h3>
  <div class="list-group">
    <a href="/programdirector/messageorders" class="list-group-item">Orders Messages</a>
    <a href="/programdirector/messagerequests" class="list-group-item">Requests Messages</a>
  </div>

  </div>
  <div class="col-lg-9">
    <div class="row">

          <table class="table table-bordered" class="fixed">
            <br/>
            <br>
            <br>
            <tr>
              <th>Transaction ID</th>
              <th>Assigned Volunteer</th>
              <th>Message</th>
            </tr>
            @foreach ($messageorders as $messageorder)
            <tr>
              <td> {{$messageorder->transaction[transid]}} </td>
              <td> {{$messageorder->user->firstname}} {{$messages->user->lastname}} </td>
              <td> {{$messageorder->message}} </td>
            </tr>
            @endforeach
        </table>
      </div>
      </div>

@endsection
