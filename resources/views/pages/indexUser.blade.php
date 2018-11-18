<!DOCTYPE html>
<html lang="en">
@include('navbar.donor')
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
              @if($width['pointsaccumulated'] >= 100)
              <div class="w3-light-grey w3-xlarge">
                <div class="w3-container w3-green" style="max-width:100%; width:100%" max="100%" min="0%">100%</div>
                @else
                <div class="w3-light-grey w3-xlarge">
                  <div class="w3-container w3-green" style="max-width:100%; width:{{$width['pointsaccumulated']}}%" max="100%" min="0%">{{$width['pointsaccumulated']}}%</div>
                @endif
              </div>
              <br />
            </div>
            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
              @if ($width['pointsaccumulated'] >= 100)
              <div>
              <center><a href="/donor/redeemcode/{{Auth::user()->userID}}" onclick="return confirm('Are you sure you want to claim your discount code?')" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">Redeem</a></center>

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
@include('navbar.donor-footer')
  </body>
  </html>
