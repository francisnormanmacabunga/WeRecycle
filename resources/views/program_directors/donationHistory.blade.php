@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')


<div>
<div class="row">

      <h1>Donation History</h1>

      <table class="table table-bordered">
      <tr>
      <th>Username</th>
      <th>Type of donation</th>
      <th>Quantity</th>
      <th>Assigned Volunteer</th>
      <th>Date</th>
      <th>Status</th>
    </tr>
    @foreach ($donationhistory as $history)
    <tr>
      <td>{{$history->users->username}}</td>
      <td>{{$history->users->username}}</td>
      <td>{{$history->fname}}</td>
      <td>James Pramono</td>
      <td>{{$history->created_at}}</td>
      <td>Delivered</td>
    </tr>
    @endforeach
  </table>



</div>
</div>
</div>
@endsection
