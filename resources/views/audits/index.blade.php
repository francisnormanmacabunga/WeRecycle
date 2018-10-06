@extends('layouts.frontend')
@include('layouts.admin-nav')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <tr>
          <th>Date</th>
          <th>Username</th>
          <th>Type of Account</th>
          <th>Activity</th>
          <th>Properties</th>
          <th>Subject</th>
        </tr>
@foreach ($lastActivity as $lastActivitys)


        <tr>
          <td> {{$lastActivitys->updated_at}} </td>
          <td> {{$lastActivitys->causer['username']}} </td>
          <td> {{$lastActivitys->causer_type}} </td>
          <td> {{$lastActivitys->description}} </td>
          <td> {{$lastActivitys->properties}} </td>
          <td> {{$lastActivitys->subject['username']}} </td>
        </tr>
@endforeach
      </table>
    </div>
  </div>







@endsection
