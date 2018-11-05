<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>WeRecycle</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link href="https://fonts.googleapis.com/css?family=Inconsolata|Rubik:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles-merged.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  </head>
  <body>



  <!-- START: header -->
  <header role="banner" class="probootstrap-header">
    <div class="container">
        <a href="{{ url('/administrator') }}" class="probootstrap-logo"><img src="{{asset('assets/images/admin.png')}}" alt="logo"/></a>
    </div>
  </header>
  <!-- END: header -->
  <div class="probootstrap-main-content">
    <section class="probootstrap-slider flexslider">
      <ul class="slides">
         <!-- class="overlay" -->
        <li style="background-image: url(img/slideshow7.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="probootstrap-slider-text text-center">
                  <h1 class="probootstrap-heading probootstrap-animate mb20">Activity Coordinator</h1>

                    <div class="probootstrap-animate probootstrap-sub-wrap mb30">
                      <div class="row">
                    </div>
                  </div>

                  <p class="probootstrap-animate"><a href="{{ url('/activitycoordinator/login') }}" class="btn btn-ghost btn-ghost-white">Login</a></p>
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
                  <h1 class="probootstrap-heading probootstrap-animate mb20">Administrator</h1>
                  <p class="probootstrap-animate"><a href="{{ url('/admin/login') }}" class="btn btn-ghost btn-ghost-white">Login</a></p>
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
                  <h1 class="probootstrap-heading probootstrap-animate mb20">Program Director</h1>
                  <p class="probootstrap-animate"><a href="{{ url('/programdirector/login') }}" class="btn btn-ghost btn-ghost-white">Login</a></p>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </section>

  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
  </div>

  <script src="{{asset('js/scripts.min.js')}}"></script>
  <script src="{{asset('js/main.min.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>

  </body>
</html>
