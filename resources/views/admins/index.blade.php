@extends('layouts.admin-nav')



@section('content')

  <div class="jumbotron mt-3 text-center">
    <h3>Welcome {{ Auth::user()->username }}!</h3>
    <p class="lead">This is the backend!</p>
  </div>

@endsection
