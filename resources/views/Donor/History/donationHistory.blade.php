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
        @foreach ($cartItems as $history)
          <tr>
<<<<<<< HEAD
            <td>{{$history->name}}</td>
            <td>{{$history->price}}</td>
            <td></td>

=======
            <td>{{$history->type}}</td>
            <td></td>
            <td></td>
            <td>{{$history->created_at}}</td>
            <td>{{$history->status}}</td>
>>>>>>> 3becd2aba54edb257147d1a62543f105bafcce6a
        @endforeach
        <td>{{$history->created_at}}</td>
        <td>{{$history->status}}</td>
      </table>
    </div>
  </div>
</div>

@endsection
