<!DOCTYPE html>
<html lang="en">
@include('navbar.donor')
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="animsition">
  <!-- Slider -->
<section class="section-slide">
  <div class="wrap-slick1 rs1-slick1">
    <div class="slick1">
      <div class="item-slick1 bg-overlay1" style="background-image: url({{asset('donor-design/images/head.jpg')}});">
        <div class="container h-full">



          <div class="flex-col-c-m h-full p-t-100 p-b-30">
            @if(session()->has('pointsnotif'))
            <div class="content">
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('pointsnotif')}}</strong>
              </div>
            </div>
            @endif

            @if(session()->has('notif'))
            <div class="content">
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('notif')}}</strong>
              </div>
            </div>
            @endif

            @if(session()->has('cod'))
            <div class="content">
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('cod')}}</strong>
              </div>
            </div>
            @endif
            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
              <span class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                Welcome, {{Auth::user()->firstname}}!
              </span>
            </div>
            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
              <br />
              <span class="ltext-101 cl2 txt-center cl0 p-t-22 p-b-40 respon1" style="color:white">
                Your current points is:
              </span>
              <div class="w3-light-grey w3-xlarge">
                <div class="w3-container w3-green" style="max-width:100%; width:{{$width['pointsaccumulated']}}%" max="100%" min="0%">{{$width['pointsaccumulated']}}%</div>
              </div>
              <br />
            </div>
            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
              @if ($width['pointsaccumulated'] >= 100)
              <div>
              <center><a href="/donor/redeemcode/{{Auth::user()->userID}}" onclick="confirm('Are you sure you want to claim your discount code?')" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">Redeem</a></center>

              </div>
              @else
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<br />

<div class="p-b-32">
  <h3 class="ltext-105 cl5 txt-center respon1">
    How to claim your 20% off?
  </h3>
</div>

<!-- Banner -->
<div class="sec-banner bg0">
  <div class="flex-w flex-c-m">
    <div class="size-202 m-lr-auto respon4">
      <!-- Block1 -->
      <div class="block1 wrap-pic-w">

        <img src="{{ asset('donor-design/images/head.jpg') }}" alt="IMG-BANNER">

        <a class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
          <div class="block1-txt-child1 flex-col-l">
            <span class="block1-name ltext-102 trans-04 p-b-8">
              Women
            </span>

            <span class="block1-info stext-102 trans-04">
              Spring 2018
            </span>
          </div>

          <div class="block1-txt-child2 p-b-4 trans-05">
            <div class="block1-link stext-101 cl0 trans-09">
              Shop Now
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="size-202 m-lr-auto respon4">
      <!-- Block1 -->
      <div class="block1 wrap-pic-w">
        <img src="{{ asset('donor-design/images/head.jpg') }}" alt="IMG-BANNER">

        <a class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
          <div class="block1-txt-child1 flex-col-l">
            <span class="block1-name ltext-102 trans-04 p-b-8">
              Men
            </span>

            <span class="block1-info stext-102 trans-04">
              Spring 2018
            </span>
          </div>

          <div class="block1-txt-child2 p-b-4 trans-05">
            <div class="block1-link stext-101 cl0 trans-09">
              Shop Now
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="size-202 m-lr-auto respon4">
      <!-- Block1 -->
      <div class="block1 wrap-pic-w">
        <img src="{{ asset('donor-design/images/head.jpg') }}" alt="IMG-BANNER">

        <a class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
          <div class="block1-txt-child1 flex-col-l">
            <span class="block1-name ltext-102 trans-04 p-b-8">
              Bags
            </span>

            <span class="block1-info stext-102 trans-04">
              New Trend
            </span>
          </div>

          <div class="block1-txt-child2 p-b-4 trans-05">
            <div class="block1-link stext-101 cl0 trans-09">
              Shop Now
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
@include('navbar.donor-footer')
  </body>
  </html>
