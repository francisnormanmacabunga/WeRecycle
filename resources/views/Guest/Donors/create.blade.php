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
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background-color: #1B4D3E">
                <div>
                  <br />
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="{{asset('assets/images/reg-logo.png')}}" alt="logo" /></span>
                    </div>
                    <br />
                    <div class="container-fluid">
                    <!-- Form -->
                    @include('inc.messages')
                    {!! Form::open(['action' => 'Guest\DonorsController@store', 'method' => 'POST' ]) !!}
                      @csrf
                      <div class="row">
                        <div class="col-md-4">
                              <label style="color: white">First Name</label>
                                <div class="input-group mb-3">
                                    <input class="form-control btn-rounded" onkeypress="return !validNo(this,event)" placeholder="First Name" aria-describedby="basic-addon1"  type="text" name="firstname" required autofocus>
                                </div>
                                <label style="color: white">Last Name</label>
                                <div class="input-group mb-3">
                                    <input class="form-control btn-rounded" placeholder="Last Name" aria-describedby="basic-addon1" name="lastname" required>
                                </div>
                                <label style="color: white">Email</label>
                                <div class="input-group mb-3">
                                    <input class="form-control btn-rounded" placeholder="you@example.com" aria-describedby="basic-addon1" type="email" name="email" required>
                                </div>
                                <label style="color: white">Cellphone Number</label>
                                <div class="input-group mb-3">
                                    <input class="form-control btn-rounded" placeholder="+63XXXXXXXXXX" aria-describedby="basic-addon1" type="number" name="cellNo" required>
                                </div>
                                <label style="color: white">Telephone Number</label>
                                <div class="input-group mb-3">
                                    <input class="form-control btn-rounded" placeholder="XXX-XXXX" aria-describedby="basic-addon1" type="number" name="tellNo" required>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <label style="color: white">Birthdate</label>
                                <div class="input-group mb-3">
                                    <input class="form-control btn-rounded" aria-describedby="basic-addon1" type="date" name="birthdate" required>
                                </div>
                                <label style="color: white">City</label>
                                <div class="input-group mb-3">
                                    <input class="form-control btn-rounded" placeholder="City" onkeypress="return !validNo(this,event)" aria-describedby="basic-addon1" type="text" name="city" required>
                                </div>
                                <label style="color: white">Street</label>
                                <div class="input-group mb-3">
                                    <input class="form-control btn-rounded" placeholder="Street" aria-describedby="basic-addon1" type="text" name="street" required>
                                </div>
                                <label style="color: white">Barangay</label>
                                <div class="input-group mb-3">
                                    <input class="form-control btn-rounded" placeholder="XXX" aria-describedby="basic-addon1" type="number" name="barangay" required>
                                </div>
                                <label style="color: white">Zip</label>
                                <div class="input-group mb-3">
                                    <input class="form-control btn-rounded" placeholder="XXXX" aria-describedby="basic-addon1" type="number" name="zip" required>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <label style="color: white">Username</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white btn-rounded" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input class="form-control btn-rounded" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" type="text" name="username" required autofocus>
                                </div>
                                <label style="color: white">Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white btn-rounded" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input class="form-control btn-rounded" placeholder="New Password" aria-label="Password" aria-describedby="basic-addon1" id="password" type="password" name="password" required>
                                </div>
                                <label style="color: white">Confirm Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white btn-rounded" id="basic-addon2"><i class="ti-check-box"></i></span>
                                    </div>
                                    <input class="form-control btn-rounded" placeholder=" Confirm Password" aria-label="Password" aria-describedby="basic-addon1" id="password-confirm" type="password" name="password_confirmation" required>
                                </div>
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
                                {{Form::hidden('usertypeID','1', ['class' => 'form-control'])}}
                                {{Form::hidden('status','Activated', ['class' => 'form-control'])}}
                                <div style="float:right;">
                                  <button class="btn btn-block btn-success btn-rounded" type="submit">{{ __('Register') }}</button>
                                </div>
                              </div>
                        {!! Form::close() !!}
                      </div>\\
                    </div>
                  </div>
                </div>
              </div>
    @include('navbar.login')
</body>
</html>
