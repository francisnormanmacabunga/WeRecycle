@include('navbar.headreset')

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
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background-image:url('../../../assets/images/background/ac.gif'); background-size: cover">
            <div class="auth-box" style="background-color: rgba(0,0,0,0)">
                <div>
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="../../../assets/images/pd-logo.png" alt="logo" /></span>
                    </div>
                    <!-- Form -->
                    @if ($errors->has('email'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
                    @endif
                    @if ($errors->has('password'))
                            <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                    @endif
                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('programdirector.password.request') }}" aria-label="{{ __('Reset Password') }}">
                      @csrf
                      <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password" aria-label="Password" aria-describedby="basic-addon1" id="password" type="password" name="password" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input class="form-control" placeholder=" Confirm Password" aria-label="Password" aria-describedby="basic-addon1" id="password-confirm" type="password" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">{{ __('Reset Password') }}</button>
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
    @include('navbar.loginreset')
</body>
</html>
