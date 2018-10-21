@extends('layouts.frontend')

@section('content')
  <div class="jumbotron mt-3 text-center">
    <h3>Welcome to landing page!</h3>
    <p class="lead">This is WeRecycle!!</p>

    <div class="row">
          <div class="container col-md-4 center-align">
        <h4 class="d-flex justify-content-between align-items-center mb-3">

        </h4>
        <ul class="list-group mb-3">


          <li class="list-group-item d-flex justify-content-between">
            <span>Volunteers attending</span>
            <strong>{{ $volunteersCount->count() }}</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Volunteers needed</span>
            <strong>10</strong>
          </li>
        </ul>


      </div>
    </div>

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
