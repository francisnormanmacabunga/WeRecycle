<!DOCTYPE html>
<html dir="ltr">
<head>
    <title>Administrator</title>
    <link href="https://fonts.googleapis.com/css?family=Inconsolata|Rubik:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles-merged.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>

<header role="banner" class="probootstrap-header">
  <div class="container">
      <a href="{{ url('/home') }}" class="probootstrap-logo"><img src="{{asset('assets/images/logo.png')}}" alt="logo"/></a>

      <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
      <div class="mobile-menu-overlay"></div>

      <nav role="navigation" class="probootstrap-nav hidden-xs">
        <ul class="probootstrap-main-nav">
          <li><a href="{{ url('/activitycoordinator/login') }}">Activity Coordinator</a></li>
          <li class="active"><a href="{{ url('/admin/login') }}">Administrator</a></li>
          <li><a href="{{ url('/programdirector/login') }}">Program Director</a></li>
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

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="{{ asset('assets/images/admin-logo.png') }}" alt="logo" /></span>
                    </div>
                    @if(session()->has('alert'))
                    <div class="alert alert-danger" role="alert">{{session()->get('alert')}}</div>
                    @endif
                    <!-- Form -->
                      <form class="form-horizontal m-t-20" id="loginform" method="POST" action="{{ route('admin.login.submit') }}" aria-label="{{ __('Login') }}">
                          @csrf
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white btn-rounded" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} btn-rounded" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" value="{{ old('username') }}" required autofocus>
                                    @if ($errors->has('username'))
                                        <div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white btn-rounded" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} btn-rounded" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-success btn-block float-right btn-rounded" type="submit">{{ __('Login') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
@include('navbar.login')
</body>
</html>
