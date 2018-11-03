<!DOCTYPE html>
<html dir="ltr">
<head>
  <!-- <style>
  body  {
    background-size: contain;
    background-size: cover;
  background-image: url('/assets/images/test.jpg');

  }
  </style>-->
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Inconsolata|Rubik:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/styles-merged.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>

<header role="banner" class="probootstrap-header">
  <div class="container">
      <nav>
        <ul class="probootstrap-main-nav">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li class="active"><a href="{{ url('/createApplicant') }}">Apply</a></li>
        </ul>
      </nav>
  </div>
</header>

@include('navbar.header')
<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background-color: #35281e">
                <div>
                  <br />
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="{{asset('assets/images/reg-logo.png')}}" alt="logo" /></span>
                    </div>
                    <br />
                    <div class="container-fluid">
                    <!-- Form -->
                    @include('inc.messages')
                    {!! Form::open(['action' => 'Guest\ApplicantsController@store', 'method' => 'POST' ]) !!}
                      @csrf
                      <div class="row">
                        <div class="col-md-3">
                              <label style="color: white">First Name</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" onkeypress="return !validNo(this,event)" placeholder="First Name" aria-describedby="basic-addon1"  type="text" name="firstname" required autofocus>
                                </div>
                                <label style="color: white">Last Name</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" placeholder="Last Name" onkeypress="return !validNo(this,event)" aria-describedby="basic-addon1" name="lastname" required>
                                </div>
                                <label style="color: white">Email</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" placeholder="you@example.com" aria-describedby="basic-addon1" type="email" name="email" required>
                                </div>
                                <label style="color: white">Cellphone Number</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" placeholder="+63XXXXXXXXXX" aria-describedby="basic-addon1" type="text" name="cellNo" required>
                                </div>
                                <label style="color: white">Telephone Number</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" placeholder="XXXXXXX" aria-describedby="basic-addon1" type="number" name="tellNo" required>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <label style="color: white">Birthdate</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" aria-describedby="basic-addon1" type="date" name="birthdate" required>
                                </div>
                                <label style="color: white">City</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" placeholder="City" onkeypress="return !validNo(this,event)" aria-describedby="basic-addon1" type="text" name="city" required>
                                </div>
                                <label style="color: white">Street</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" placeholder="Street" aria-describedby="basic-addon1" type="text" name="street" required>
                                </div>
                                <label style="color: white">Barangay</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" placeholder="XXX" aria-describedby="basic-addon1" type="text" name="barangay" required>
                                </div>
                                <label style="color: white">Zip</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" placeholder="XXXX" aria-describedby="basic-addon1" type="number" name="zip" required>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <label style="color: white">Username</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" type="text" name="username" required autofocus>
                                </div>

                                <br />
                                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                  <div class="col-md-6 pull-center">
                                  {!! app('captcha')->display() !!}
                                  @if ($errors->has('g-recaptcha-response'))
                                  <span class="help-block">
                                  <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                  </span>
                                  @endif
                                </div>
                                </div>
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                {{Form::hidden('usertypeID','2', ['class' => 'form-control'])}}
                                {{Form::hidden('password','ApplicantAccount', ['class' => 'form-control'])}}
                                {{Form::hidden('status','Applied', ['class' => 'form-control'])}}
                                <center style="color: white">By clicking Register Profile, you agree to our <a class="btn-outline-light" href="{{ url('/terandcond') }}">Terms and Conditions</a>.</center>
                                <br />
                                <div style="float:center;">
                                  <button class="btn btn-rounded btn-block btn-success" type="submit">{{ __('Apply as Volunteer') }}</button>
                                </div>
                              </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    @include('navbar.login')
</body>
</html>
