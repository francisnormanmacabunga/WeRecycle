<!DOCTYPE html>
<html dir="ltr">

<head>
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
  <link href="https://fonts.googleapis.com/css?family=Inconsolata|Rubik:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>

<header role="banner" class="probootstrap-header">
  <div class="container">
      <nav>
        <ul class="probootstrap-main-nav">
          <li><a href="{{ url('/home') }}">Home</a></li>
          <li class="active"><a href="{{ url('/createDonor') }}">Register</a></li>
          <li><a href="{{ url('/donor/login') }}">Login</a></li>
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
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background-color: #1B4D3E">
                <div>
                  <br />
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="{{asset('assets/images/reg-logo.png')}}" alt="logo" /></span>
                    </div>
                    <br />
                    <div class="container-fluid">
                    <!-- Form -->

                    {!! Form::open(['action' => 'Guest\DonorsController@store', 'method' => 'POST' ]) !!}
                      @csrf
                      <dl class="row">
                        <div class="col-md-4">
                              <label style="color: white">First Name</label>
                                <div class="input-group mb-3">
                                  <dd class="col-sm-10">
                                    <input class="btn-rounded form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}" onkeypress="return !validNo(this,event)" placeholder="First Name" aria-describedby="basic-addon1"  type="text" name="firstname" required autofocus>
                                    @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                    @endif
                                  </dd>
                                </div>
                                <label style="color: white">Last Name</label>
                                <div class="input-group mb-3">
                                  <dd class="col-sm-10">
                                    <input class="btn-rounded form-control {{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="Last Name" aria-describedby="basic-addon1" name="lastname" required>
                                    @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                  </dd>
                                </div>
                                <label style="color: white">Email</label>
                                <div class="input-group mb-3">
                                  <dd class="col-sm-10">
                                    <input class="btn-rounded form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="you@example.com" aria-describedby="basic-addon1" type="email" name="email" required>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                  </dd>
                                </div>
                                <label style="color: white">Cellphone Number</label>
                                <div class="input-group mb-3">
                                  <dd class="col-sm-10">
                                    <input class="btn-rounded form-control {{ $errors->has('cellNo') ? ' is-invalid' : '' }}" placeholder="+63XXXXXXXXXX" aria-describedby="basic-addon1" type="text" name="cellNo" required>
                                    @if ($errors->has('cellNo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cellNo') }}</strong>
                                    </span>
                                    @endif
                                  </dd>
                                </div>
                                <label style="color: white">Telephone Number</label>
                                <div class="input-group mb-3">
                                  <dd class="col-sm-10">
                                    <input class="btn-rounded form-control {{ $errors->has('tellNo') ? ' is-invalid' : '' }}" placeholder="XXXXXXX" aria-describedby="basic-addon1" type="number" name="tellNo" required>
                                    @if ($errors->has('tellNo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tellNo') }}</strong>
                                    </span>
                                    @endif
                                  </dd>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <label style="color: white">Birthdate</label>
                                <div class="input-group mb-3">
                                  <dd class="col-sm-10">
                                    <input class="btn-rounded form-control {{ $errors->has('birthdate') ? ' is-invalid' : '' }}" aria-describedby="basic-addon1" type="date" name="birthdate" required>
                                    @if ($errors->has('birthdate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                    @endif
                                  </dd>
                                </div>
                                <label style="color: white">City</label>
                                <div class="input-group mb-3">
                                  <dd class="col-sm-10">
                                    <input class="btn-rounded form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="City" onkeypress="return !validNo(this,event)" aria-describedby="basic-addon1" type="text" name="city" required>
                                    @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                  </dd>
                                </div>
                                <label style="color: white">Street</label>
                                <div class="input-group mb-3">
                                  <dd class="col-sm-10">
                                    <input class="btn-rounded form-control {{ $errors->has('street') ? ' is-invalid' : '' }}" placeholder="Street" aria-describedby="basic-addon1" type="text" name="street" required>
                                    @if ($errors->has('street'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                    @endif
                                  </dd>
                                </div>
                                <label style="color: white">Barangay</label>
                                <div class="input-group mb-3">
                                  <dd class="col-sm-10">
                                    <input class="btn-rounded form-control {{ $errors->has('barangay') ? ' is-invalid' : '' }}" placeholder="Barangay" aria-describedby="basic-addon1" type="text" name="barangay" required>
                                    @if ($errors->has('barangay'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('barangay') }}</strong>
                                    </span>
                                    @endif
                                  </dd>
                                </div>
                                <label style="color: white">Zip</label>
                                <div class="input-group mb-3">
                                  <dd class="col-sm-10">
                                    <input class="btn-rounded form-control {{ $errors->has('zip') ? ' is-invalid' : '' }}" placeholder="XXXX" aria-describedby="basic-addon1" type="text" name="zip" required>
                                    @if ($errors->has('zip'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                    @endif
                                  </dd>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <label style="color: white">Credentials</label>
                                <div class="input-group mb-3">
                                  <dd class="col-sm-12">
                                    <input class="btn-rounded form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" type="text" name="username" required autofocus>
                                    @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                  </dd>
                                </div>

                                <div class="input-group mb-3">
                                  <dd class="col-sm-12">
                                    <input class="btn-rounded form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password"
                                    aria-label="Password" aria-describedby="basic-addon1" id="password" type="password" name="password"
                                    data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true" required>
                                    <div id="popover-password">
                                      <br />
                                        <p style="color: white">Password Strength: <span id="result"> </span></p>
                                        <div class="progress">
                                            <div id="password-strength" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                            </div>
                                        </div>
                                        <ul style="color: white" class="list-unstyled">
                                            <li class=""><span class="low-upper-case"><i class="fa fa-file-text" aria-hidden="true"></i></span>&nbsp; 1 lowercase &amp; 1 uppercase</li>
                                            <li class=""><span class="one-number"><i class="fa fa-file-text" aria-hidden="true"></i></span> &nbsp;1 number (0-9)</li>
                                            <li class=""><span class="one-special-char"><i class="fa fa-file-text" aria-hidden="true"></i></span> &nbsp;1 Special Character (!@#$%^&*).</li>
                                            <li class=""><span class="eight-character"><i class="fa fa-file-text" aria-hidden="true"></i></span>&nbsp; Atleast 8 Character</li>
                                          </ul>
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                  </dd>

                                </div>

                                <div class="input-group mb-3">
                                  <dd class="col-sm-12">
                                    <input class="btn-rounded form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Confirm Password" aria-label="Password" aria-describedby="basic-addon1" id="password-confirm" type="password" name="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                  </dd>

                                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                  <div class="col-md-6 pull-center">
                                  {!! app('captcha')->display() !!}
                                  @if ($errors->has('g-recaptcha-response'))
                                  <span class="help-block">
                                  <strong style="color: red">{{ $errors->first('g-recaptcha-response') }}</strong>
                                  </span>
                                  @endif
                                </div>
                                </div>

                                </div>
                                {{Form::hidden('usertypeID','1', ['class' => 'form-control'])}}
                                {{Form::hidden('status','Activated', ['class' => 'form-control'])}}
                                <div style="color: white; text-align: center">
                                  <div class="custom-control custom-checkbox mr-sm-2">
                                      <input type="checkbox" class="custom-control-input" id="customControlAutosizing1" required>
                                      <label class="custom-control-label" for="customControlAutosizing1">By checking this box, you agree to our <a class="btn-outline-light" href="#" data-toggle="modal" data-target="#Modal1">Terms and Conditions</a>.</label>
                                  </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">TERMS AND CONDITIONS</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true ">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                              <p>These Website Standard Terms and Conditions written on this webpage shall manage your use of this website. These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written within this document. Users must not use the Website if the user disagree with any of the following Website Standard Terms and Conditions.</p>
                                    <h3><strong>Restrictions</strong></h3>

                                      Users are specifically restricted from all of the following:
                                      <ul>
                                      <li>using this Website in any way that is or may be damaging to this Website;</li>
                                      <li>using this Website in any way that impacts user access to this Website;</li>
                                      <li>using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</li>
                                      <li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li>
                                      <li>Certain areas of this Website are restricted from being accessed by the User; WeRecycle may further restrict access to the user to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.</li>
                                    </ul>

                                    <ul>
                                      <li><strong>Your Content</strong></li>
                                      <p>Stated within the Website Standard Terms and Conditions, “Your Content” shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant WeRecycle a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.
                                      Your Content must be your own and must not be invading any third-party’s rights. WeRecycle reserves the right to remove any of Your Content from this Website at any time without notice.</p>

                                      <li><strong>No warranties</strong></li>
                                      <p>This Website is provided “as is,” with all faults and flaws, and WeRecycle express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising the user.</p>

                                      <li><strong>Limitation of liability</strong></li>
                                      <p>In no event shall WeRecycle, nor any of its administrators and volunteers, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  WeRecycle, including its administrators and volunteers shall not be held liable for any indirect,
                                        consequential or special liability arising out of or in any way related to your use of this Website.</p>

                                      <li><strong>Indemnification</strong></li>
                                      <p>You hereby indemnify to the fullest extent WeRecycle from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your
                                        breach of any of the provisions of these Terms.</p>

                                      <li><strong>Severability</strong></li>
                                      <p>If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.</p>

                                      <li><strong>Variation of Terms</strong></li>
                                      <p>WeRecycle is permitted to revise these Terms at any time as it sees fit, and by using this Website users are expected to review these Terms on a regular basis.</p>

                                      <li><strong>Entire Agreement</strong></li>
                                      <p>These Terms constitute the entire agreement between WeRecycle and the user in relation to the use of this Website, and supersede all prior agreements and understandings.</p>

                                      <li><strong>Governing Law & Jurisdiction</strong></li>
                                      <p>These Terms will be governed by and interpreted in accordance with the laws of the Republic of the Philippines, and you submit to the non-exclusive jurisdiction of the courts
                                         situated within Pasay for the resolution of any legal disputes.</p>
                                    </ul>
                                            </div>
                                    </div>
                                  </div>
                                </div>
                                <br />
                                <div style="float:center;">
                                  <button class="btn btn-rounded btn-block btn-success" type="submit">{{ __('Register') }}</button>
                                </div>
                              </dl>
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
