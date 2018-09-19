@extends('layouts.backend')
@include('inc.navbar5')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <br/>
      <h3 align="center">User feedback</h3>
      <br>
      <br>
      <table class="table table-bordered">
        <tr>
          <th>Username</th>
          <th>Feedback</th>
          <th>Rating</th>
          <th>@sortablelink('created_at', 'Date Applied')</th>
          <th>Action</th>
        </tr>
        @foreach ($feedbacks as $feedback)
          <tr>
            <td>{{$feedback->username}}</td>
            <td>{{$feedback->feedback}}</td>
            <td>{{$feedback->rating}}</td>
            <td>{{date('F d, Y, h:i:sa', strtotime($feedback->created_at))}}</td>
          </tr>
        @endforeach

      </table>

    </div>
  </div>

@endsection
