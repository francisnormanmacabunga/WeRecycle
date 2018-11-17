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
                <div>
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="{{asset('assets/images/ac-logo.png')}}" alt="logo" /></span>
                    </div>
                    <!-- Form -->
                    @if ($errors->has('email'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
                    @endif
                    @if ($errors->has('password'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                    @endif
                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('activitycoordinator.password.request') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white btn-rounded" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input style="width: 300px" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} btn-rounded" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" id="email" type="email" name="email" value="{{ $email ?? old('email') }}"
                                      required autofocus>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white btn-rounded" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} btn-rounded"placeholder="New Password"
                                    aria-label="Password" aria-describedby="basic-addon1" id="password" type="password" name="password"
                                    data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true" required>


                                    </div>
                                    <div id="popover-password">
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
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white btn-rounded" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input class="form-control btn-rounded" placeholder=" Confirm Password" aria-label="Password" aria-describedby="basic-addon1" id="password-confirm" type="password" name="password_confirmation" required>
                                </div>
                              </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-block btn-lg btn-success btn-rounded" type="submit">{{ __('Reset Password') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

                    $('#result').addClass('text-danger').text('Very Week');
                    $('#password-strength').css('width', '10%');
                } else if (strength == 2) {
                    $('#result').addClass('good');
                    $('#password-strength').removeClass('progress-bar-danger');
                    $('#password-strength').addClass('progress-bar-warning');
                    $('#result').addClass('text-warning').text('Week')
                    $('#password-strength').css('width', '60%');
                    return 'Week'
                } else if (strength == 4) {
                    $('#result').removeClass()
                    $('#result').addClass('strong');
                    $('#password-strength').removeClass('progress-bar-warning');
                    $('#password-strength').addClass('progress-bar-success');
                    $('#result').addClass('text-success').text('Strength');
                    $('#password-strength').css('width', '100%');

                    return 'Strong'
                }

            }

        });
    </script>
</body>

</html>
