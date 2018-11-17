@include('navbar.header')

<!DOCTYPE html>
<html dir="ltr">

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
            <div class="auth-box" style="background-color: #35281e">
                <div id="loginform">
                    @if ($errors->has('email'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="text-center">
                        <span class="text-white">Enter your e-mail address below and we will send you instructions on how to recover a password.</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form method="POST" class="col-12" action="{{ route('activitycoordinator.password.email') }}" aria-label="{{ __('Reset Password') }}">
                            @csrf
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white btn-rounded" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg btn-rounded" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" name="email"
                                  value="{{ old('email') }}" required>
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20 p-t-20">
                                <div class="col-12">
                                    <a class="btn btn-danger btn-rounded" href="{{ url('/activitycoordinator/login') }}" id="to-login" name="action">Back</a>
                                    <button class="btn btn-info float-right btn-rounded" type="submit" name="action">{{ __('Recover') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
