<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>WeRecycle™</title>
    <meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/vendor/slick/slick.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/vendor/MagnificPopup/magnific-popup.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/css/util.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('donor-design/css/main.css')}}">
<!--===============================================================================================-->
</head>

<!-- Header -->
<header class="header-v2">
  <!-- Header desktop -->
  <div class="container-menu-desktop trans-03">
    <div class="wrap-menu-desktop">
      <nav class="limiter-menu-desktop p-l-45">

        <!-- Logo desktop -->
        <a href="{{url('/donor')}}" class="logo">
          <img src="{{asset('assets/images/shop-logo.png')}}">
        </a>

        <!-- Menu desktop -->
        <div class="menu-desktop">
          <ul class="main-menu">
            <li>
              <a style="color:#1B4D3E" href="{{ url('/donor') }}">Home</a>
            </li>

            <li>
              <a style="color:#1B4D3E" href="{{ url('/donor/shopCatalog') }}">Catalog</a>
            </li>

            <li>
              <a style="color:#1B4D3E" href="{{ url('/donor/createFeedback') }}">Feedback</a>
            </li>
          </ul>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
          <div class="flex-c-m h-full p-lr-19">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{Cart::instance('shop')->count()}}">
              <a href="{{ url('/donor/cart') }}" title="Shopping cart"><i style="color:#1B4D3E" class="zmdi zmdi-shopping-cart"></i></a>
            </div>
          </div>
          <div class="flex-c-m h-full p-lr-19">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{Cart::instance('default')->count()}}g">
              <a href="{{ url('/donor/donate') }}" title="Donation list"><i style="color:#1B4D3E" class="zmdi zmdi-shopping-basket"></i></a>
            </div>
          </div>
          <div class="flex-c-m h-full p-lr-19">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
               <h6 style="color:#1B4D3E">{{ Auth::user()->username }}</h6>
            </div>
          </div>
        </div>



      </nav>
      </div>
    </div>

  <!-- Header Mobile -->
  <div class="wrap-header-mobile">
      <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
        <i class="zmdi zmdi-menu"></i>
      </div>

    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
      <div class="flex-c-m h-full p-lr-19">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{Cart::instance('shop')->count()}}">
          <a href="{{ url('/donor/cart') }}" title="Donation list"><i style="color:#1B4D3E" class="zmdi zmdi-shopping-cart"></i></a>
        </div>
      </div>
      <div class="flex-c-m h-full p-lr-19">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{Cart::instance('default')->count()}}g">
          <a href="{{ url('/donor/donate') }}" title="Shopping cart"><i style="color:#1B4D3E" class="zmdi zmdi-shopping-basket"></i></a>
        </div>
      </div>
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
        <a href="{{ url('/donor') }}">Home</a>
      </li>

      <li>
        <a href="{{ url('/donor/shopCatalog') }}">Catalog</a>
      </li>

      <li>
        <a href="{{ url('/donor/createFeedback') }}">Feedback</a>
      </li>
      <li>
        <a href="{{ url('/donor/donors') }}">
          View Profile
        </a>
      </li>
      <li>
        <a href="{{ url('/donor/transactionhistory') }}">
        History
        </a>
      </li>

      <li>
        <a href="{{ route('donor.logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
          <i class="zmdi zmdi-power"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('donor.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
  </div>
</header>

<!-- Sidebar -->
<aside class="wrap-sidebar js-sidebar">
  <div class="s-full js-hide-sidebar"></div>

  <div class="sidebar flex-col-l p-t-22 p-b-25">
    <div class="flex-r w-full p-b-30 p-r-27">
      <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
        <i class="zmdi zmdi-close"></i>
      </div>
    </div>

    <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
      <ul class="sidebar-link w-full">
        <li class="p-b-13">
          <a href="{{ url('/donor/donors') }}" class="stext-102 cl2 hov-cl1 trans-04">
            View Profile
          </a>
        </li>

        <li class="p-b-13">
          <a href="{{ url('/donor/transactionhistory') }}" class="stext-102 cl2 hov-cl1 trans-04">
          History
          </a>
        </li>

        <li class="p-b-13">
          <a href="{{ url('/donor/discount') }}" class="stext-102 cl2 hov-cl1 trans-04">
          My Discount Codes
          </a>
        </li>
        <br>
        <li class="p-b-13">
          <a href="{{ route('donor.logout') }}" class="btn btn-danger btn-rounded"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <i class="zmdi zmdi-power"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('donor.logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>

      <div class="sidebar-gallery w-full p-tb-30">
        <span class="mtext-101 cl5">
          {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
        </span>
        <br />
        Your current points is: {{$width['pointsaccumulated']}}%

        <div class="w3-light-grey">
          <div class="w3-container w3-green" style="max-width:100%; width:{{$width['pointsaccumulated']}}%" max="100%" min="0%">{{$width['pointsaccumulated']}}%</div>
        </div>
      </div>
    </div>
  </div>
</aside>
