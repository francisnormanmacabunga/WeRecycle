<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body>
    <div id="main-wrapper">
        @include('navbar.ac-navbar')
        <div class="page-wrapper">
            <!-- Card -->
            <div class="card">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h4 class="page-title"></h4>
                        </div>
                    </div>
                </div>
                <div class="container col-md-6 center-align">
                    <div class="card-deck mb-3 ">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header text-center">
                                {!! Form::open(['action' => ['ActivityCoordinator\ActivityCoordinatorsController@update', $donors['userID']], 'method' => 'POST' ]) !!}
                                <h4 class="my-0 font-weight-normal">Update your profile, {{$donors->firstname}}!</h4>
                            </div>
                            <div class="card-body text-center">
                                <h1 class="card-title pricing-card-title text-center">{{$donors->firstname}} {{$donors->lastname}}</h1>
                                <hr style="margin:5px 0 5px 0;"><br>
                                <dl class="row">
                                    <dt class="col-sm-6">First Name:</dt>
                                    <dd class="col-sm-5">{{Form::text('firstname', $donors->firstname,['class' => 'form-control'.($errors->has('firstname') ? ' is-invalid' : ''), 'onkeypress' => 'return !validNo(this,event)'])}}
                                      @if ($errors->has('firstname'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('firstname') }}</strong>
                                      </span>
                                      @endif
                                    </dd>
                                    <dt class="col-sm-6">Last Name:</dt>
                                    <dd class="col-sm-5">{{Form::text('lastname', $donors->lastname,['class' => 'form-control'.($errors->has('lastname') ? ' is-invalid' : ''), 'onkeypress' => 'return !validNo(this,event)'])}}
                                      @if ($errors->has('lastname'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('lastname') }}</strong>
                                      </span>
                                      @endif
                                    </dd>
                                    <dt class="col-sm-6">Username:</dt>
                                    <dd class="col-sm-5">{{Form::text('username', $donors->username,['class' => 'form-control'.($errors->has('username') ? ' is-invalid' : '')])}}
                                      @if ($errors->has('username'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('username') }}</strong>
                                      </span>
                                      @endif
                                    </dd>
                                    <dt class="col-sm-6">Email:</dt>
                                    <dd class="col-sm-5">{{Form::email('email', $donors->email,['class' => 'form-control'.($errors->has('email') ? ' is-invalid' : '')])}}
                                      @if ($errors->has('email'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                      @endif
                                    </dd>
                                    <dt class="col-sm-6">Birthdate:</dt>
                                    <dd class="col-sm-5">{{Form::date('birthdate', $donors->birthdate,['class' => 'form-control'.($errors->has('birthdate') ? ' is-invalid' : '')])}}
                                      @if ($errors->has('birthdate'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('birthdate') }}</strong>
                                      </span>
                                      @endif
                                    </dd>
                                    <dt class="col-sm-6">Street:</dt>
                                    <dd class="col-sm-5">{{Form::text('street', $donors->street,['class' => 'form-control'.($errors->has('street') ? ' is-invalid' : '')])}}
                                      @if ($errors->has('street'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('street') }}</strong>
                                      </span>
                                      @endif
                                    </dd>
                                    <dt class="col-sm-6">City:</dt>
                                    <dd class="col-sm-5">{{Form::text('city', $donors->city,['class' => 'form-control'.($errors->has('city') ? ' is-invalid' : '')])}}
                                      @if ($errors->has('city'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('city') }}</strong>
                                      </span>
                                      @endif
                                    </dd>
                                    <dt class="col-sm-6">Barangay:</dt>
                                    <dd class="col-sm-5">{{Form::text('barangay', $donors->barangay,['class' => 'form-control'.($errors->has('barangay') ? ' is-invalid' : '')])}}
                                      @if ($errors->has('barangay'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('barangay') }}</strong>
                                      </span>
                                      @endif
                                    </dd>
                                    <dt class="col-sm-6">Cellphone:</dt>
                                    <dd class="col-sm-5">{{Form::text('cellNo', $donors->contacts->cellNo,['class' => 'form-control'.($errors->has('cellNo') ? ' is-invalid' : ''), 'placeholder' => '+63XXXXXXXXXX'])}}
                                      @if ($errors->has('cellNo'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('cellNo') }}</strong>
                                      </span>
                                      @endif
                                    </dd>
                                    <dt class="col-sm-6">Telephone:</dt>
                                    <dd class="col-sm-5">{{Form::number('tellNo', $donors->contacts->tellNo,['class' => 'form-control'.($errors->has('tellNo') ? ' is-invalid' : '')])}}
                                      @if ($errors->has('tellNo'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('tellNo') }}</strong>
                                      </span>
                                      @endif
                                    </dd>
                                </dl>
                                <hr style="margin:5px 0 5px 0;"><br>
                                <input type="button" value="Save Changes" class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#Modal2" />
                                <a class="btn btn-lg btn-block btn-danger" href="{{ url('/activitycoordinator/activity_coordinators') }}" role="button">Back </a>
                                <!-- Modal -->
                                <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to save changes?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{Form::hidden('_method','PUT')}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                Copyright &copy; 2018 WeRecycle
            </footer>
        </div>
    </div>
    @include('navbar.footer')
</body>

</html>
