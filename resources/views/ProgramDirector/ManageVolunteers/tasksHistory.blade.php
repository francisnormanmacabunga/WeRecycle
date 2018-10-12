@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')

  <div class="col-lg-9">
    <div class="row">
      <table class="table table-bordered" class="fixed">
        <tr>
          <th>MessageID</th>
          <th>Assigned Volunteer</th>
          <th>Message</th>
        </tr>
        @foreach ($message as $messages)
        <tr>
          <td> {{$messages->messageID}} </td>
          <td> {{$messages->userID}} </td>
          <td> {{$messages->message}} </td>
        </tr>
        @endforeach
    </table>
  </div>
</div>

@endsection
