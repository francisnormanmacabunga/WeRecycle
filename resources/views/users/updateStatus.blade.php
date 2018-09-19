@extends('layouts.frontend')
@include('inc.navbar3')

@section('content')

  {!! Form::open(['action' => ['DonorsStatusController@update', $donors['userID']], 'method' => 'POST' ]) !!}

  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3>Deactivate your profile, {{$donors->firstname}}!</h3>
  </div>
  <div class="container col-md-6 center-align">
    <div class="card-deck mb-3 ">
      <div class="card mb-4 shadow-sm">
        <div class="card-header text-center">
          <h4 class="my-0 font-weight-normal">User profile</h4>
        </div>
        <div class="card-body text-center">
          <h1 class="card-title pricing-card-title text-center">{{$donors->firstname}} {{$donors->lastname}}</h1>
          <hr style="margin:5px 0 5px 0;"><br>
          <div class="text-center">
            <h5>Are you sure you want to deactivate your account?</h5>
            {{Form::hidden('status', 'Deactivated',['class' => 'form-control'])}}
            {{Form::hidden('_method','PUT')}}
          </div>
          <hr style="margin:5px 0 5px 0;"><br>
          {{Form::submit('Yes',['class' => 'btn btn-lg btn-block btn-danger'])}}
          <a class="btn btn-lg btn-block btn-primary" href="/donors" role="button">No </a>
          </div>


          {!! Form::close() !!}
        </div>
      </div>
    </div>

@endsection
