@extends('layouts.frontend')
@include('layouts.donor-nav')

@section('content')

<div class="row">

  <div class="col-md-12">
    <a href="/donor/pointhistory">
     <button style="float: right;">Reset</button>
    </a>
    <a href="/donor/pointhistory/?status=Purchased">
      <button style="float: right;">Sort by Purchased</button>
    </a>
    <a href="/donor/pointhistory/?status=Donated">
      <button style="float: right;">Sort by Donated</button>
    </a>
    <br>
    <br>
    <div class="row">
      @if(count($point) > 0)
      <table class="table table-bordered" class="fixed">
        <tr>
          <th>Activity</th>
          <th>Points Gained</th>
          <th>Time Gained</th>
        </tr>
        @foreach ($point as $points)
        <tr>
          <td>{{$points->activity}}</td>
          <td>{{$points->points}}</td>
          <td>{{date('F d, Y, h:i:sa', strtotime($points->created_at))}}</td>
        </tr>
        @endforeach
    </table>
  @else
  <div align="center" style="color:red;">
    <h4 style="font-family:serif;">No Points Earned.</h4>
  </div>
  @endif
  </div>
</div>

@endsection
