<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body>
    <div id="main-wrapper">
        @include('navbar.admin-navbar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Create Employee Account</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">

              @if(session()->has('new'))
              <div class="content">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>{{session()->get('new')}}</strong>
                </div>
              </div>
              @endif
              
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/createAC') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Activity Coordinator</span></a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="{{ url('/admin/createPD') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Program Director</span></a> </li>
                </ul>
                {!! Form::open(['action' => 'Admin\ProgramDirectorController@store', 'method' => 'POST' ]) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>First Name <label style="color:red;">*</label> </label>
                                        <input type="text" name="firstname" class="form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}" onkeypress="return !validNo(this,event)" placeholder="First Name" required>
                                        @if ($errors->has('firstname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                </br>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Last Name <label style="color:red;">*</label> </label>
                                        <input type="text" name="lastname" class="form-control {{ $errors->has('lastname') ? ' is-invalid' : '' }}" id="lname" onkeypress="return !validNo(this,event)" placeholder="Last Name" required>
                                        @if ($errors->has('lastname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                </br>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Email <label style="color:red;">*</label> </label>
                                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email1" placeholder="you@example.com" required>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                </br>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Cellphone Number <label style="color:red;">*</label> </label>
                                        <input type="text" name="cellNo" class="form-control {{ $errors->has('cellNo') ? ' is-invalid' : '' }}" id="cono1" placeholder="+63XXXXXXXXXX" required>
                                        @if ($errors->has('cellNo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cellNo') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                </br>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Telephone Number</label>
                                        <input type="number" name="tellNo" class="form-control {{ $errors->has('tellNo') ? ' is-invalid' : '' }}" id="cono1" placeholder="XXXXXXX">
                                        @if ($errors->has('tellNo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tellNo') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Birthdate <label style="color:red;">*</label> </label>
                                        <input type="date" name="birthdate" class="form-control {{ $errors->has('birthdate') ? ' is-invalid' : '' }}" required>
                                        @if ($errors->has('birthdate'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('birthdate') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>City <label style="color:red;">*</label> </label>
                                        <input type="text" name="city" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" id="email1" onkeypress="return !validNo(this,event)" placeholder="City" required>
                                        @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                </br>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Street <label style="color:red;">*</label> </label>
                                        <input type="text" name="street" class="form-control {{ $errors->has('street') ? ' is-invalid' : '' }}" id="email1" placeholder="Street" required>
                                        @if ($errors->has('street'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('street') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                </br>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Barangay <label style="color:red;">*</label> </label>
                                        <input type="text" name="barangay" class="form-control {{ $errors->has('barangay') ? ' is-invalid' : '' }}" id="email1" placeholder="Barangay" required>
                                        @if ($errors->has('barangay'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('barangay') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                </br>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Zip <label style="color:red;">*</label> </label>
                                        <input type="number" name="zip" class="form-control {{ $errors->has('zip') ? ' is-invalid' : '' }}" placeholder="Zip" required>
                                        @if ($errors->has('zip'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('zip') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                </br>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Username <label style="color:red;">*</label> </label>
                                        <input type="text" name="username" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="@Username" required>
                                        @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <br />
                                <div style="float:right;">
                                    <button type="submit" class="btn btn-outline-success">Register</button>
                                </div>
                                <br />
                                <br />
                                <br />
                                {{Form::hidden('usertypeID','4', ['class' => 'form-control'])}}
                                {{Form::hidden('status','Activated', ['class' => 'form-control'])}}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
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
