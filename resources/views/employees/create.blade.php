@extends('layouts.backend')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
          <a class="navbar-brand" href="{{ url('/admin') }}">
              {{ config('app.name', 'Laravel') }}
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">


                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Employee</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="/admin/createEmployee"> Create Employee Account </a>
                    <a class="dropdown-item" href="/admin/employees"> Manage Employee Account </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalog</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="/admin/createCatalog"> Create Catalog </a>
                    <a class="dropdown-item" href="/admin/catalog"> Manage Catalog </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Feedback</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="/admin/feedback"> Manage Feedback</a>
                  </div>
                </li>

              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
          <!--            <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li> -->
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->username }} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
      </div>
  </nav>

@section('content')

    <div class="py-5 text-center">
          <h3>Create Employee account!</h3>
          <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>
        <div class="container col-md-9 center-align">
          <h4 class="mb-3">Fill out form</h4>
            {!! Form::open(['action' => 'EmployeesController@store', 'method' => 'POST' ]) !!}
              <div class="row">
                <div class="col-md-5 mb-3">
                  {{Form::label('firstname','First Name')}}
                  {{Form::text('firstname','', ['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}
                </div>
                <div class="col-md-4 mb-3">
                  {{Form::label('lastname','Last Name')}}
                  {{Form::text('lastname','', ['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}
                </div>
                <div class="col-md-3 mb-3">
                  {{Form::label('usertypeID','User Type')}}
                  {{Form::select('usertypeID', ['3' => 'Activity Coordinator', '4' => 'Program Director'], null, ['placeholder' => 'Choose user type', 'class' => 'form-control'])}}
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
                {{Form::hidden('password','EmployeeAccount', ['class' => 'form-control'])}}
                {{Form::hidden('status','Activated', ['class' => 'form-control'])}}
              <hr class="mb-4">
              {{Form::submit('Register profile',['class' => 'btn btn-primary btn-lg btn-block'])}}
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
