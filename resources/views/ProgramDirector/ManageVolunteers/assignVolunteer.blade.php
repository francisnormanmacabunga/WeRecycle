@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')

  {!! Form::open(['action' => 'ProgramDirector\AssignVolunteerController@store', 'method' => 'POST' ]) !!}

    <div class="row">
      <div class="col-md-6 mb-3">
        {{Form::label('firstname','First Name')}}
        {{Form::text('volunteer','', ['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}
      </div>



    <hr class="mb-4">
    {{Form::submit('Apply as Volunteer',['class' => 'btn btn-primary btn-lg btn-block'])}}
   {!! Form::close() !!}

@endsection
