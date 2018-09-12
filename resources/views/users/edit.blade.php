@extends('layouts.app')
@include('inc.navbar3')

@section('content')

  {!! Form::open(['action' => ['DonorsController@update', $donors['userID']], 'method' => 'POST' ]) !!}
  <div class="row">
    <div class="col-md-12">
      <br/>
      <h3 align="center">Update Account</h3>




        <div class="row">
          <div class="col-md-6 mb-3">
            {{Form::label('username','Username')}}
            {{Form::text('username',$donors['username'], ['class' => 'form-control'])}}
          </div>
        </div>
          <div class="row">
          <div class="col-md-6 mb-3">
            {{Form::label('firstname','First Name')}}
            {{Form::text('firstname', $donors['firstname'], ['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}
          </div>
          <div class="col-md-6 mb-3">
            {{Form::label('lastname','Last Name')}}
            {{Form::text('lastname',$donors['lastname'], ['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}
          </div>
        </div>
        <div class="mb-3">
          {{Form::label('email','Email')}}
          {{Form::email('email',$donors['email'], ['class' => 'form-control', 'placeholder' => 'you@example.com'])}}
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            {{Form::label('cellNo','Cellphone Number')}}
            {{Form::number('cellNo',$donors->contacts['cellNo'], ['class' => 'form-control'])}}
          </div>
          <div class="col-md-6 mb-3">
            {{Form::label('tellNo','Telephone Number')}}
            {{Form::text('tellNo',$donors->contacts['tellNo'], ['class' => 'form-control'])}}
          </div>
        </div>
        <div class="mb-3">
          {{Form::label('birthdate','Birthdate')}}
          {{Form::date('birthdate',$donors['birthdate'], ['class' => 'form-control'])}}
        </div>
        <div class="mb-3">
          {{Form::label('city','City')}}
          {{Form::text('city',$donors['city'], ['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}
        </div>
        <div class="row">
          <div class="col-md-5 mb-3">
            {{Form::label('street','Street')}}
            {{Form::text('street',$donors['street'], ['class' => 'form-control'])}}
          </div>
          <div class="col-md-4 mb-3">
            {{Form::label('barangay','Barangay')}}
            {{Form::text('barangay',$donors['barangay'], ['class' => 'form-control'])}}
          </div>
          <div class="col-md-3 mb-3">
            {{Form::label('zip','Zip')}}
            {{Form::number('zip',$donors['zip'], ['class' => 'form-control'])}}
          </div>
        </div>
      </div>
        <hr class="mb-4">
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Save',['class' => 'btn btn-primary btn-lg btn-block'])}}
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
    </div>
  </div>

@endsection
