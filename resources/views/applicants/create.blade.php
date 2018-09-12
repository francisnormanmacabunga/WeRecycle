@extends('layouts.app')
@include('inc.navbar1')

@section('content')

    <div class="py-5 text-center">
          <h3>Apply as a Volunteer!</h3>
          <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>
        <div class="row">
          <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Counter</span>
            </h4>
            <ul class="list-group mb-3">
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h5 class="my-0">This is the counter</h5>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Volunteers going</h6>
                  <small class="text-muted">Accepted applicants who confirmed</small>
                </div>
                <span class="text-muted">8</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">Remaining volunteers</h6>
                  <small class="text-muted">Remaining slots available</small>
                </div>
                <span class="text-muted">5</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <h6 class="my-0">Volunteers needed</h6>
                <strong>20</strong>
              </li>
            </ul>
          </div>
          <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Fill out form</h4>

            {!! Form::open(['action' => 'ApplicantsController@store', 'method' => 'POST' ]) !!}
              <div class="row">
                <div class="col-md-6 mb-3">
                  {{Form::label('firstname','First Name')}}
                  {{Form::text('firstname','', ['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}
                </div>
                <div class="col-md-6 mb-3">
                  {{Form::label('lastname','Last Name')}}
                  {{Form::text('lastname','', ['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}
                </div>
              </div>
              <div class="mb-3">
                {{Form::label('email','Email')}}
                {{Form::email('email','', ['class' => 'form-control', 'placeholder' => 'you@example.com'])}}
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  {{Form::label('cellNo','Cellphone Number')}}
                  {{Form::number('cellNo','', ['class' => 'form-control'])}}
                </div>
                <div class="col-md-6 mb-3">
                  {{Form::label('tellNo','Telephone Number')}}
                  {{Form::text('tellNo','', ['class' => 'form-control'])}}
                </div>
              </div>
              <div class="mb-3">
                {{Form::label('birthdate','Birthdate')}}
                {{Form::date('birthdate','', ['class' => 'form-control'])}}
              </div>
              <div class="mb-3">
                {{Form::label('city','City')}}
                {{Form::text('city','', ['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}
              </div>
              <div class="row">
                <div class="col-md-5 mb-3">
                  {{Form::label('street','Street')}}
                  {{Form::text('street','', ['class' => 'form-control'])}}
                </div>
                <div class="col-md-4 mb-3">
                  {{Form::label('barangay','Barangay')}}
                  {{Form::text('barangay','', ['class' => 'form-control'])}}
                </div>
                <div class="col-md-3 mb-3">
                  {{Form::label('zip','Zip')}}
                  {{Form::number('zip','', ['class' => 'form-control'])}}
                </div>
              </div>
              <div class="mb-3">
                {{Form::label('username','Username')}}
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  {{Form::text('username','', ['class' => 'form-control'])}}
                </div>
              </div>
                {{Form::hidden('usertypeID','2', ['class' => 'form-control'])}}
                {{Form::hidden('password','ApplicantAccount', ['class' => 'form-control'])}}
                {{Form::hidden('status','Applied', ['class' => 'form-control'])}}
              <hr class="mb-4">
              {{Form::submit('Apply as Volunteer',['class' => 'btn btn-primary btn-lg btn-block'])}}
            {!! Form::close() !!}

          </div>
        </div>
        <footer class="my-5 pt-5 text-muted text-center text-small">
          <p class="mb-1">&copy; 2017-2018 Company Name</p>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
          </ul>
        </footer>
@endsection
