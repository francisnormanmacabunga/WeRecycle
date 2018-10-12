@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')

  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered" class="fixed">
        <br/>
        <h3><strong>Task History</strong></h3>
        <br>
        <br>
        <tr>
          <th>Transaction ID</th>
          <th>Assigned Volunteer</th>
          <th>Message</th>
        </tr>
        @foreach ($message as $messages)
        <tr>
          <td> {{$messages->transaction->transid}} </td>
          <td> {{$messages->user->firstname}} {{$messages->user->lastname}} </td>
          <td> {{$messages->message}} </td>
        </tr>
        @endforeach
    </table>
  </div>
</div>

@endsection
