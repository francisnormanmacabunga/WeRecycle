<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>WeRecycle™</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link href="https://fonts.googleapis.com/css?family=Inconsolata|Rubik:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles-merged.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  </head>
  <body>



  <!-- START: header -->

  <div class="probootstrap-loader"></div>

  <header role="banner" class="probootstrap-header">
    <div class="container">
        <a href="{{ url('/home') }}" class="probootstrap-logo"><img src="{{asset('assets/images/logo.png')}}" alt="logo"/></a>

        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="{{ url('/faqs') }}">FAQs</a></li>
            <li><a href="{{ url('/donor/login') }}">Login</a></li>
            <li><a href="{{ url('/createDonor') }}">Register</a></li>
            <li><a href="{{ url('/activitycoordinator/login') }}">Employee</a></li>
          </ul>
        </nav>
    </div>
  </header>
  <!-- END: header -->
  <div class="probootstrap-main-content">
    <section class="probootstrap-slider flexslider">
      <ul class="slides">
         <!-- class="overlay" -->
        <li style="background-image: url(img/slideshow7.png);">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="probootstrap-slider-text text-center">
                  <h1 class="probootstrap-heading probootstrap-animate mb20">Save mother earth</h1>

                <strong>  <div class="probootstrap-animate probootstrap-sub-wrap mb30">Help by volunteering in our organization</div></strong>



                    <div class="probootstrap-animate probootstrap-sub-wrap mb30">
                      <div class="row" >
                      <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                          <span style="color:black">Volunteers attending</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <strong style="color:black">{{ $volunteersCount->count() }}</strong>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                          <span style="color:black">Volunteers needed</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <strong style="color:black">10</strong>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <p class="probootstrap-animate"><a href="{{ url('/createApplicant') }}" class="btn btn-ghost btn-ghost-white">Volunteer</a></p>
                </div>
              </div>
            </div>
          </div>
        </li>
        <!-- class="overlay" -->
        <li style="background-image: url(img/slideshow11.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="probootstrap-slider-text text-center">
                  <h1 class="probootstrap-heading probootstrap-animate mb20">Shop Organic Fertilizers</h1>
                  <p class="probootstrap-animate"><a href="{{ url('/shop') }}" class="btn btn-ghost btn-ghost-white">Catalog</a></p>
                </div>
              </div>
            </div>
          </div>
        </li>
        <!-- class="overlay" -->
        <li style="background-image: url(img/slideshow4.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="probootstrap-slider-text text-center">
                  <h1 class="probootstrap-heading probootstrap-animate mb20">Donate your wastes</h1>
                  <p class="probootstrap-animate"><a href="{{ url('/donation') }}" class="btn btn-ghost btn-ghost-white">Donate</a></p>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </section>
    <section class="probootstrap-section probootstrap-bg-white">
      <div class="container-fluid">
        <div class="section-heading text-center">
          <h2 class="mt0 mb0">Let's Build a Better Tomorrow</h2>
        </div>
      </div>

    </section>
    <section class="probootstrap-half reverse">
      <div id="about" class="image-wrap">
        <div class="image" style="background-image: url(img/slideshow12.jpg);"></div>
      </div>
      <div class="text">
        <p class="mb10 subtitle">About Us</p>
        <h3 class="mt0 mb40">Meet The Team</h3>
        <p align="justify">We are team ECO from De La Salle-College of Saint Benilde and taking up Bachelor of Science in Information Systems.</p>
        <p class="mb50" align="justify">Majority of the lifecycle of a garbage is often overlooked despite the efforts of the
          community or government to put a proper wastes disposal everywhere. People does not seem to
          know where to properly place it, for most people they do not realize the positive and negative
          effects of garbage, if not handled properly. That is why WeRecycle™ is built to solve this problem. </p>
      </div>
    </section>
     <section class="probootstrap-half">
      <div id="services" class="image-wrap">
        <div class="image" style="background-image: url(img/slideshow13.jpg);"></div>
      </div>
      <div class="text">
        <p class="mb10 subtitle">Our Services</p>
        <h3 class="mt0 mb40">What We Do</h3>
        <div class="row mb20">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="service-item">
              <span class="number">1</span>
              <h4 class="mt0">Shop Organic Fertilizers</h4>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="service-item">
              <span class="number">2</span>
              <h4 class="mt0">Donate Segregating Materials</h4>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="service-item">
              <span class="number">3</span>
              <h4 class="mt0">Join the movement</h4>
            </div>
          </div>
      </div>
    </section>

    <footer>
          <br>
          <div class="row">
            <strong><p class="text-center">
              Copyright
          		&copy; <?php
          			$fromYear = 2018;
          			$thisYear = (int)date('Y');
          			echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?>
          		 WeRecycle™
            </p></strong>
          </div>
        </div>
      </div>
    </footer>

  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
  </div>



  <script src="{{asset('js/scripts.min.js')}}"></script>
  <script src="{{asset('js/main.min.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>

  </body>
</html>
