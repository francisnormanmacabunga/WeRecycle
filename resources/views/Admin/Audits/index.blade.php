@extends('layouts.frontend')
@include('layouts.admin-nav')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <tr>
          <th>Date</th>
          <th>Causer</th>
          <th>Action</th>
          <th>Subject</th>
          <th>Subject Type</th>
        </tr>
        @foreach ($lastActivity as $lastActivitys)
        <tr>
          <td> {{date('F d, Y, h:i:sa', strtotime($lastActivitys->updated_at))}} </td>
          <td> {{$lastActivitys->causer['username']}} </td>
          <td> {{$lastActivitys->description}} </td>
          <td> {{$lastActivitys->subject['username']}} </td>
          <td> {{$lastActivitys->log_name}} </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>

@endsection
