@extends('layouts.backend')
@include('inc.navbar6')
@section('content')

  <div class="jumbotron mt-3 text-center">
    <h3>Welcome to Administrtator's Landing Page</h3>
    <p class="lead">This is the backend part!</p>
    <a class="btn btn-success btn-lg" href="/admin/login" role="button">Login </a>
    <a class="btn btn-success btn-lg" href="/" role="button">Go back </a>
  </div>

@endsection
