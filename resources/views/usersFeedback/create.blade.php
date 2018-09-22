@extends('layouts.frontend')
@include('inc.navbar1')

@section('content')

    <div class="py-5 text-center">
          <h3>Any comments/suggestions?</h3>
          <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>
          <div class="container col-md-9 center-align">
            <h4 class="mb-3">Fill out form</h4>

            {!! Form::open(['action' => 'FeedbacksController@store', 'method' => 'POST' ]) !!}
              <div class="row">
                <div class="col-md-6 mb-3">
                  {{Form::label('feedback','Feedback')}}
                  {{Form::textArea('feedback','', ['class' => 'form-control', 'placeholder' => 'Message', 'maxlength' => '2000'])}}
                </div>
              </div>
                <div class="row">
                <div class="col-md-3 mb-3">
                  {{Form::label('rating','Rating')}}
                  {{Form::number('rating','', ['class' => 'form-control', 'placeholder' => 'Rate'])}}
                </div>
              </div>
              <hr class="mb-4">
              {{Form::submit('Send',['class' => 'btn btn-primary btn-lg btn-block'])}}
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
