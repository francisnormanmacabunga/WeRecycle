<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>WeRecycle</title>
    <meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="{{asset('donor/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor/vendor/slick/slick.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor/vendor/MagnificPopup/magnific-popup.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor/css/util.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('donor/css/main.css')}}">
<!--===============================================================================================-->
</head>

<!-- Header -->
<header class="header-v2">
  <!-- Header desktop -->
  <div class="container-menu-desktop trans-03">
    <div class="wrap-menu-desktop">
      <nav class="limiter-menu-desktop p-l-45">

        <div class="wrap-menu-desktop how-shadow1">
          <nav class="limiter-menu-desktop container">

            <!-- Logo desktop -->
            <a href="{{url('/')}}" class="logo">
              <img src="{{asset('assets/images/shop-logo.png')}}">
            </a>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m">
              <!-- Menu desktop -->
              <div class="menu-desktop">
                <ul class="main-menu">
                  <li>
                    <a style="color:#1B4D3E" href="{{url('/')}}">Home</a>
                  </li>
                  <li>
                    <a style="color:#1B4D3E" href="{{url('/createDonor')}}">Register</a>
                  </li>
                  <li>
                    <a style="color:#1B4D3E" href="{{url('/donor/login')}}">Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </nav>
      </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
      <!-- Logo moblie -->
      <div class="logo-mobile">
        <a href="{{url('/donor')}}"><img src="{{asset('assets/images/shop-logo.png')}}"></a>
      </div>

      <!-- Button show menu -->
      <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile">
      <ul class="main-menu-m">
        <li>
          <a href="{{url('/')}}">Home</a>
        </li>
        <li>
          <a href="{{url('/createDonor')}}">Register</a>
        </li>
        <li>
          <a href="{{url('/donor/login')}}">Login</a>
        </li>
      </ul>
    </div>

</header>
