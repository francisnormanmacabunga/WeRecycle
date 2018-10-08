@extends('layouts.frontend')
@include('layouts.donor-nav')

@section('content')

<div>
    <div class="row">

          <h1>Donation History</h1>
          <table class="table table-bordered">
        <tr>
          <th>Type of donation</th>
          <th>Weight</th>
          <th>Assigned Volunteer</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
        @foreach ($donationHistory as $history)
          <tr>
            <td>{{$history->userID}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        @endforeach
      </table>
    </div>
  </div>
</div>

@endsection
