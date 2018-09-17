@extends('layouts.frontend')
@include('inc.navbar3')

@section('content')

  {!! Form::open(['action' => ['ActivityCoordinatorsController@update', $donors['userID']], 'method' => 'POST' ]) !!}

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
            <dt class="col-sm-6">First Name:</dt>
            <dd class="col-sm-5">{{Form::text('firstname', $donors->firstname,['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}</dd>
            <dt class="col-sm-6">Last Name:</dt>
            <dd class="col-sm-5">{{Form::text('lastname', $donors->lastname,['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}</dd>
            <dt class="col-sm-6">Username:</dt>
            <dd class="col-sm-5">{{Form::text('username', $donors->username,['class' => 'form-control'])}}</dd>
            <dt class="col-sm-6">Password:</dt>
            <dd class="col-sm-4">{{$donors->password}}</dd>
            <dt class="col-sm-6">Email:</dt>
            <dd class="col-sm-5">{{Form::email('email', $donors->email,['class' => 'form-control'])}}</dd>
            <dt class="col-sm-6">Birthdate:</dt>
            <dd class="col-sm-5">{{Form::date('birthdate', $donors->birthdate,['class' => 'form-control'])}}</dd>
            <dt class="col-sm-6">Street:</dt>
            <dd class="col-sm-5">{{Form::text('street', $donors->street,['class' => 'form-control'])}}</dd>
            <dt class="col-sm-6">City:</dt>
            <dd class="col-sm-5">{{Form::text('city', $donors->city,['class' => 'form-control'])}}</dd>
            <dt class="col-sm-6">Barangay:</dt>
            <dd class="col-sm-5">{{Form::text('barangay', $donors->barangay,['class' => 'form-control'])}}</dd>
            <dt class="col-sm-6">Cellphone:</dt>
            <dd class="col-sm-5">{{Form::number('cellNo', $donors->contacts->cellNo,['class' => 'form-control'])}}</dd>
            <dt class="col-sm-6">Telephone:</dt>
            <dd class="col-sm-5">{{Form::number('tellNo', $donors->contacts->tellNo,['class' => 'form-control'])}}</dd>
          </dl>
          <hr style="margin:5px 0 5px 0;"><br>
          {{Form::submit('Save',['class' => 'btn btn-lg btn-block btn-primary'])}}
          <a class="btn btn-lg btn-block btn-primary" href="/activity_coordinators" role="button">Back </a>
          </div>
          {{Form::hidden('_method','PUT')}}
          {!! Form::close() !!}
        </div>
      </div>
    </div>

@endsection