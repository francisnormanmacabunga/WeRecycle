@extends('layouts.frontend')
@include('layouts.pd-nav')


@section('content')

  <div class="row">
    <div class="col-md-12">
      <br/>
      <h3><strong>User feedback</strong></h3>
      <br>
      <br>
      @if(count($feedbacks) > 0)
      <table class="table table-bordered">
        <tr>
          <th>Username</th>
          <th>Feedback</th>
          <th>@sortablelink('rating', 'Rating')</th>
          <th>Date Applied</th>
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
      @else
      <div align="center" style="color:red;">
        <h4 style="font-family:serif;">No feedbacks found.</h4>
      </div>
      @endif
    </div>
  </div>

@endsection
