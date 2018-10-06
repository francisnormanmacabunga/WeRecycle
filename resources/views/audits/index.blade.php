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
        </tr>
        @foreach ($activity as $activitys)
        <tr>
          <td>{{ $activity->changes() }}</td>

        </tr>
        @endforeach
      </table>
    </div>
  </div>

@endsection
