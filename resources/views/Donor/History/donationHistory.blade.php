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
        @foreach($trans as $tran)
          <tr>
            <td></td>
            <td></td>
              @foreach($tran->cart as $item)
            <td></td>
              @endforeach
            <td></td>
            <td></td>


      </table>
          @endforeach
    </div>
  </div>
</div>

@endsection
