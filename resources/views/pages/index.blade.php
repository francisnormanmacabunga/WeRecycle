@extends('layouts.frontend')
@include('inc.navbar1')
@section('content')
  <div class="jumbotron mt-3 text-center">
    <h3>Welcome to landing page!</h3>
    <p class="lead">This is WeRecycle!!</p>


    <a class="btn btn-lg btn-primary" href="/createApplicant" role="button">Apply as a Volunteer </a>
  </div>

  <div class="jumbotron mt-3 text-center">
    <h3>Temporary Links</h3>
    <p class="lead">Under Construction!</p>
    <a class="btn btn-success btn-lg" href="/activitycoordinator/login" role="button">Go to AC Page</a>
    <a class="btn btn-success btn-lg" href="/programdirector/login" role="button">Go to PD Page</a>
    <a class="btn btn-success btn-lg" href="/admin/login" role="button">Go to Admin Page</a>
  </div>
@endsection
