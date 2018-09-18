@extends('layouts.frontend')
@include('inc.navbar3')

@section('content')

  {!! Form::open(['action' => ['ProgramDirectorsPasswordController@update', $donors['userID']], 'method' => 'POST' ]) !!}

  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3>Update your profile, {{$donors->firstname}}!</h3>
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
          <dl class="row">
            <dt class="col-sm-6">Update Password:</dt>
            <dd class="col-sm-5">{{Form::password('password', ['class' => 'form-control'])}}</dd>
            <dt class="col-sm-6">Confirm Password:</dt>
            <dd class="col-sm-5">{{Form::password('password_confirmation', ['class' => 'form-control'])}}</dd>
          </dl>
          <hr style="margin:5px 0 5px 0;"><br>
          {{Form::submit('Save',['class' => 'btn btn-lg btn-block btn-primary'])}}
          <a class="btn btn-lg btn-block btn-primary" href="/program_directors" role="button">Back </a>
          </div>
          {{Form::hidden('_method','PUT')}}
          {!! Form::close() !!}
        </div>
      </div>
    </div>

@endsection
