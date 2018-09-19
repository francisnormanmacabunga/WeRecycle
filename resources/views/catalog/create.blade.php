@extends('layouts.backend')
@include('inc.navbar5')

@section('content')

  <div class="py-5 text-center">
        <h3>Add item details here!</h3>
        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>
      <div class="container col-md-9 center-align">
        <h4 class="mb-3">Fill out form</h4>
        {{ Form::open(array('action' => 'CatalogController@store', 'method' => 'post', 'files' => true, 'enctype' =>"multipart/form-data")) }}
            <div class="row">
            <div class="col-md-6 mb-3">
              {{Form::label('productname','Item Name')}}
              {{Form::text('productname','', ['class' => 'form-control'])}}
            </div>
            <div class="col-md-6 mb-3">
              {{Form::label('productstypeID','Item Type')}}
              {{Form::select('productstypeID', ['1' => 'Donation', '2' => 'Shop'], null, ['placeholder' => 'Choose type of item', 'class' => 'form-control'])}}
            </div>
            </div>
            <div class="mb-3">
              {{Form::label('description','Description')}}
              {{Form::textarea('description','', ['class' => 'form-control'])}}
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                {{Form::label('price','Price')}}
                {{Form::number('price','', ['class' => 'form-control'])}}
              </div>
              <div class="col-md-6 mb-3">
                {{Form::label('productimage','Image')}}
                {{Form::file('productimage',['class' => 'form-control'])}}
              </div>
            </div>
              {{Form::hidden('status','Activated', ['class' => 'form-control'])}}
            <hr class="mb-4">
            {{Form::submit('Save item',['class' => 'btn btn-primary btn-lg btn-block'])}}
          {!! Form::close() !!}
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
