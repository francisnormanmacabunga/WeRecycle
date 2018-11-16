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
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Inconsolata|Rubik:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>

<header role="banner" class="probootstrap-header">
  <div class="container">
      <nav>
        <ul class="probootstrap-main-nav">
          <li><a href="{{ url('/home') }}">Home</a></li>
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
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background-color: #654321">
                <div>

                  <br />
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="{{asset('assets/images/reg-logo.png')}}" alt="logo" /></span>
                    </div>
                    <br />
                    <div class="container-fluid">
                    <!-- Form -->

                    {!! Form::open(['action' => 'Guest\ApplicantsController@store', 'method' => 'POST' ]) !!}
                      @csrf
                        <dl class="row">
                          @if(session()->has('notif'))
                          <div class="container">
                        <div class="content">
                          <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>{{session()->get('notif')}}</strong>
                          </div>
                          <br />
                        </div>
                        </div>
                        @endif
                        @if(session()->has('notiff'))
                        <div class="container">
                      <div class="content">
                        <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <strong>{{session()->get('notiff')}}</strong>
                        </div>
                        <br />
                      </div>
                      </div>
                      @endif
                          <div class="col-md-4">

                          <label style="color: white">First Name</label>
                          <div class="input-group mb-3">
                          <dd class="col-sm-10">
                            <input class="btn-rounded form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" onkeypress="return !validNo(this,event)" placeholder="First Name" aria-describedby="basic-addon1"  type="text" name="firstname" required autofocus>
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
                            <input class="btn-rounded form-control {{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="Last Name" onkeypress="return !validNo(this,event)" aria-describedby="basic-addon1" name="lastname" required>
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

                        <label style="color: white">Zip</label>
                        <div class="input-group mb-3">
                        <dd class="col-sm-10">
                          <input class="btn-rounded form-control {{ $errors->has('zip') ? ' is-invalid' : '' }}" placeholder="Zip" onkeypress="return !validNo(this,event)" aria-describedby="basic-addon1" type="text" name="zip" required>
                          @if ($errors->has('zip'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('zip') }}</strong>
                          </span>
                          @endif
                        </dd>
                      </div>

                        </div>
                                <div class="col-md-4">
                                  <label style="color: white">Username</label>
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
                                                <h5 class="modal-title" id="exampleModalLabel">VOLUNTEER AGREEMENT</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true ">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                              <p>This Volunteer Agreement is a description of the arrangement between us, WeRecycle (non-profit startup organization), and you (the volunteer) in relation to your voluntary work.  The intention of this agreement is to assure you that we appreciate your volunteering with us and to indicate our commitment to do the best we can to make your volunteer experience with us a positive and rewarding one.</p>
                                              <h3><strong>Part 1</strong></h3>

                                              We, WeRecycle, accept the voluntary service of (name of volunteer) beginning (date).
                                               Volunteer must be at least 15 years old.
                                              Your part as a volunteer is to get recyclables from the homes of people in the area of Malibay, Pasay. Segregate recyclables, make fertilizers, and deliver recyclables.
                                              <br><br>
                                    <h3>We commit to the following:</h3>
                                    <h5><strong>1. Supervision, support and flexibility</strong></h5>
                                      <ul>
                                      <li>To define appropriate standards of our services, to communicate them to you, and to encourage and support you to achieve and maintain them as part of your voluntary work.</li>
                                      <li>To do our best to help you develop your volunteering role with us and to be flexible in how we use your volunteering.</li>
                                    </ul>

                                    <h5><strong>2. Expenses</strong></h5>
                                      <ul>
                                      <li>To reimburse the following expenses incurred by you in doing your voluntary work in accordance with the procedures:
                                    </li>
                                      <li>Special clothing, where this is provided by you;
                                    </li>
                                    </ul>

                                    <h5><strong>3. Problems</strong></h5>
                                      <ul>
                                      <li>Any injuries acquired by the volunteer while doing volunteer work will not be covered or insured by WeRecycle.</li>
                                    </ul>

                                    <h5><strong>4. Confidentiality</strong></h5>
                                      <ul>
                                      <li>The volunteer acknowledges that, in the course of performing and fulfilling his/her duties hereunder, he/she may have access to and be entrusted with confidential information concerning the present and contemplated financial status and activities of WeRecycle, the Volunteer agrees with WeRecycle that he/she will not, during the continuance of this agreement, disclose any of such confidential information to any person, firm or corporation, except as required in the normal course of his engagement.</li>
                                    </ul>

                                    <h5><strong>5. Termination</strong></h5>
                                      <ul>
                                      <li>WeRecycle may terminate the Volunteer  at any time for just cause at common law, in which case the Employee is not entitled to any advance notice of termination or compensation in lieu of notice.</li>
                                      <li>The Volunteer may terminate his service at any time by providing WeRecycle with at least five (5) days advance notice of his/her intention to resign.</li>
                                    </ul>
                                      <h3><strong>Part 2</strong></h3>
                                      <ul>
                                      <h5><strong>I, (name of volunteer), agree to be a volunteer with WeRecycle and commit to the following:</strong></h5>
                                      <li>To help WeRecycle fulfil its recycling business.</li>
                                      <li>To perform my volunteering role to the best of my ability</li>
                                      <li>To adhere to the organisation’s rules, procedures and standards. </li>
                                      <li>To maintain the confidential information of the organisation and of its clients.</li>
                                      <li>To meet the time commitments and standards undertaken, other than in exceptional circumstances, and provide reasonable notice so that alternative arrangement can be made.</li>
                                      <li>To provide primary contacts, who may be contacted, and to agree to a police check being carried out where necessary.</li>
                                    </ul>

                                    <h5><i>My agreed voluntary time commitment is from 9am - 5pm Saturday.</i></h5>

                                    <h5><i>This agreement is binding in honour only. Neither of us intends any employment relationship to be created either now or at any time in the future.</i></h5>

                                    <h5><i>By proceeding to the next page this means you have agreed to our agreement.</i></h5>
                                            </div>
                                    </div>
                                  </div>
                                </div>
                                <br />
                                <div style="float:center;">
                                  <button class="btn btn-rounded btn-block btn-success" type="submit">{{ __('Apply as Volunteer') }}</button>
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
