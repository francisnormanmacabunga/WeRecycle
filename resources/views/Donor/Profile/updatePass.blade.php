<!DOCTYPE html>
<html dir="ltr" lang="en">
      @include('navbar.donor')
      <head>
          <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
          <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
          <link rel="stylesheet" type="text/css" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}">
          <!-- Custom CSS -->
          <link href="{{ asset('assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
      </head>
<body>
  <!-- Title page -->
  <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('donor-design/images/profile.jpg')}});">
    <h2 class="ltext-105 cl0 txt-center">
      Update Password
    </h2>
  </section>
    <div id="main-wrapper">
            <!-- Card -->
            <div class="card">
              <div class="container">
              <div class="page-breadcrumb">
                 <div class="row">
                     <div class="col-12 d-flex no-block align-items-center">
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Profile</a></li>
                                     <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                 </ol>
                             </nav>
                     </div>
                 </div>
             </div>
           </div>
           <div class="container col-md-4 center-align">
               <div class="card-deck mb-3 ">
                   <div class="card mb-4 shadow-sm">
                       <div class="card-header text-center">
                           {!! Form::open(['action' => ['Donor\DonorsPasswordController@update', $donors['userID']], 'method' => 'POST' ]) !!}
                           <h4 class="my-0 font-weight-normal">Update your password, {{$donors->firstname}}!</h4>
                       </div>
                       <div class="card-body text-center">
                           <h1 class="card-title pricing-card-title text-center">{{$donors->firstname}} {{$donors->lastname}}</h1>
                           <hr style="margin:5px 0 5px 0;"><br>
                           <dl class="row">
                             <div class="input-group mb-3">
                               <dt class="col-sm-6">Update Password:</dt>

                                 <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                 aria-label="Password" aria-describedby="basic-addon1" id="password" type="password" name="password"
                                 data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true" required>


                                 @if ($errors->has('password'))
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $errors->first('password') }}</strong>
                                 </span>
                                 @endif
                               </div>
                               <div class="input-group mb-3">
                               <dt class="col-sm-6">Confirm Password:</dt>
                               <input class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                               aria-label="Password" aria-describedby="basic-addon1" id="password" type="password" name="password_confirmation"
                               data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true" required>
                                 @if ($errors->has('password_confirmation'))
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $errors->first('password_confirmation') }}</strong>
                                 </span>
                                 @endif
                               </div>
                           </dl>
                           <div id="popover-password">
                               <p>Password Strength: <span id="result"> </span></p>
                               <div class="progress">
                                   <div id="password-strength" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                   </div>
                               </div>
                               <ul class="list-unstyled">
                                   <li class=""><span class="low-upper-case"><i class="fa fa-file-text" aria-hidden="true"></i></span>&nbsp; 1 lowercase &amp; 1 uppercase</li>
                                   <li class=""><span class="one-number"><i class="fa fa-file-text" aria-hidden="true"></i></span> &nbsp;1 number (0-9)</li>
                                   <li class=""><span class="one-special-char"><i class="fa fa-file-text" aria-hidden="true"></i></span> &nbsp;1 Special Character (!@#$%^&*).</li>
                                   <li class=""><span class="eight-character"><i class="fa fa-file-text" aria-hidden="true"></i></span>&nbsp; Atleast 8 Character</li>
                                 </ul>
                           </div>
                           <hr style="margin:5px 0 5px 0;"><br>
                           <input type="submit" value="Save Changes" class="btn btn-success btn-block btn-lg" onclick="if(confirm('Are you sure?')) saveandsubmit(event);" />
                       </div>
                       {{Form::hidden('_method','PUT')}}
                       {!! Form::close() !!}
                   </div>
               </div>
           </div>
            </div>
    </div>
    @include('navbar.donor-footer')
    @include('navbar.footer')
    <script>
    $(document).ready(function() {
            $('#email').blur(function() {
                var email = $('#email').val();
                if (IsEmail(email) == false) {
                    $('#sign-up').attr('disabled', true);
                    $('#popover-email').removeClass('hide');
                } else {
                    $('#popover-email').addClass('hide');
                }
            });
            $('#password').keyup(function() {
                var password = $('#password').val();
                if (checkStrength(password) == false) {
                    $('#sign-up').attr('disabled', true);
                }
            });
            $('#confirm-password').blur(function() {
                if ($('#password').val() !== $('#confirm-password').val()) {
                    $('#popover-cpassword').removeClass('hide');
                    $('#sign-up').attr('disabled', true);
                } else {
                    $('#popover-cpassword').addClass('hide');
                }
            });
            $('#contact-number').blur(function() {
                if ($('#contact-number').val().length != 10) {
                    $('#popover-cnumber').removeClass('hide');
                    $('#sign-up').attr('disabled', true);
                } else {
                    $('#popover-cnumber').addClass('hide');
                    $('#sign-up').attr('disabled', false);
                }
            });
            $('#sign-up').hover(function() {
                if ($('#sign-up').prop('disabled')) {
                    $('#sign-up').popover({
                        html: true,
                        trigger: 'hover',
                        placement: 'below',
                        offset: 20,
                        content: function() {
                            return $('#sign-up-popover').html();
                        }
                    });
                }
            });

            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }

            function checkStrength(password) {
                var strength = 0;


                //If password contains both lower and uppercase characters, increase strength value.
                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                    strength += 1;
                    $('.low-upper-case').addClass('text-success');
                    $('.low-upper-case i').removeClass('fa-file-text').addClass('fa-check');
                    $('#popover-password-top').addClass('hide');


                } else {
                    $('.low-upper-case').removeClass('text-success');
                    $('.low-upper-case i').addClass('fa-file-text').removeClass('fa-check');
                    $('#popover-password-top').removeClass('hide');
                }

                //If it has numbers and characters, increase strength value.
                if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
                    strength += 1;
                    $('.one-number').addClass('text-success');
                    $('.one-number i').removeClass('fa-file-text').addClass('fa-check');
                    $('#popover-password-top').addClass('hide');

                } else {
                    $('.one-number').removeClass('text-success');
                    $('.one-number i').addClass('fa-file-text').removeClass('fa-check');
                    $('#popover-password-top').removeClass('hide');
                }

                //If it has one special character, increase strength value.
                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                    strength += 1;
                    $('.one-special-char').addClass('text-success');
                    $('.one-special-char i').removeClass('fa-file-text').addClass('fa-check');
                    $('#popover-password-top').addClass('hide');

                } else {
                    $('.one-special-char').removeClass('text-success');
                    $('.one-special-char i').addClass('fa-file-text').removeClass('fa-check');
                    $('#popover-password-top').removeClass('hide');
                }

                if (password.length > 7) {
                    strength += 1;
                    $('.eight-character').addClass('text-success');
                    $('.eight-character i').removeClass('fa-file-text').addClass('fa-check');
                    $('#popover-password-top').addClass('hide');

                } else {
                    $('.eight-character').removeClass('text-success');
                    $('.eight-character i').addClass('fa-file-text').removeClass('fa-check');
                    $('#popover-password-top').removeClass('hide');
                }




                // If value is less than 2

                if (strength < 2) {
                    $('#result').removeClass()
                    $('#password-strength').addClass('progress-bar-danger');

                    $('#result').addClass('text-danger').text('Very Weak');
                    $('#password-strength').css('width', '10%');
                } else if (strength == 2) {
                    $('#result').addClass('good');
                    $('#password-strength').removeClass('progress-bar-danger');
                    $('#password-strength').addClass('progress-bar-warning');
                    $('#result').addClass('text-warning').text('Weak')
                    $('#password-strength').css('width', '60%');
                    return 'Week'
                } else if (strength == 4) {
                    $('#result').removeClass()
                    $('#result').addClass('strong');
                    $('#password-strength').removeClass('progress-bar-warning');
                    $('#password-strength').addClass('progress-bar-success');
                    $('#result').addClass('text-success').text('Strong');
                    $('#password-strength').css('width', '100%');

                    return 'Strong'
                }

            }

        });
    </script>
</body>
</html>
