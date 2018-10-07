@extends('layouts.frontend')
@include('layouts.admin-nav')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <tr>
          <th>Date</th>
          <th>Causer's Username</th>
          <th>Causer Type of Account</th>
          <th>Activity</th>
          <th>Subject's Username</th>
          <th>Subject Type of Account</th>
        </tr>
        @foreach ($lastActivity as $lastActivitys)
        <tr>
          <td> {{date('F d, Y, h:i:sa', strtotime($lastActivitys->updated_at))}} </td>
          <td> {{$lastActivitys->causer['username']}} </td>
          <td> {{$lastActivitys->causer_type}} </td>
          <td> {{$lastActivitys->description}} </td>
          <td> {{$lastActivitys->subject['username']}} </td>
          <td> {{$lastActivitys->subject_type}} </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>

@endsection
