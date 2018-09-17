@extends('layouts.frontend')
@include('inc.navbar3')

@section('content')

  {!! Form::open(['action' => ['PasswordsController@update', $donors['userID']], 'method' => 'POST' ]) !!}

  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3>Update your profile, {{$donors->firstname}}!</h3>
  </div>

  <div class="container col-md-6 center-align">
    <div class="card-deck mb-3 ">
      <div class="card mb-4 shadow-sm">
        <div class="card-header text-center">
          <h4 class="my-0 font-weight-normal">Update Password</h4>
        </div>
        <div class="card-body text-center">
          <h1 class="card-title pricing-card-title text-center">{{$donors->firstname}} {{$donors->lastname}}</h1>
          <hr style="margin:5px 0 5px 0;"><br>
          <dl class="row">
            <dt class="col-sm-6">First Name:</dt>
            <dd class="col-sm-5">{{Form::text('firstname', '',['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}</dd>
            <dt class="col-sm-6">Last Name:</dt>
            <dd class="col-sm-5">{{Form::text('lastname', '',['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}</dd>
            <dt class="col-sm-6">Username:</dt>
          </dl>
          <hr style="margin:5px 0 5px 0;"><br>
          {{Form::submit('Save',['class' => 'btn btn-lg btn-block btn-primary'])}}
          <a class="btn btn-lg btn-block btn-primary" href="/donors" role="button">Back </a>
          </div>
          {{Form::hidden('_method','PUT')}}
          {!! Form::close() !!}
        </div>
      </div>
    </div>

@endsection
