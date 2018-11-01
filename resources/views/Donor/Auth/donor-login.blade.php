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
          <li><a href="{{ url('/createDonor') }}">Register</a></li>
          <li class="active"><a href="{{ url('/donor/login') }}">Login</a></li>
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
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background-color: #1B4D3E">
            <div class="auth-box" style="background-color: #1B4D3E">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="{{asset('assets/images/donor-logo.png')}}" alt="logo" /></span>
                    </div>
                    @if(session()->has('alert'))
                    <div class="alert alert-danger" role="alert">{{session()->get('alert')}}</div>
                    @endif
                    @if ($errors->has('username'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div>
                    @endif
                    @if ($errors->has('password'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                    @endif
                    <!-- Form -->

                      <form class="form-horizontal m-t-20" id="loginform" method="POST" action="{{ route('donor.login.submit') }}" aria-label="{{ __('Login') }}">
                          @csrf

                            <div align="center">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white btn-rounded" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} btn-rounded" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" value="{{ old('username') }}" required autofocus>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white btn-rounded" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} btn-rounded" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                        <div align="center">
                      <a href="/createDonor"><font color="white">Don't have an account? Register here.</font></a>
                    </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-success btn-rounded float-right" type="submit">{{ __('Login') }}</button>
                                        <a class="btn btn-info btn-rounded" href="{{ route('donor.password.request') }}"><i class="fa fa-lock m-r-5"></i> {{ __('Forgot Password?') }}</a>
                                        <br />
                                        <br />

                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('navbar.login')
</body>
</html>
