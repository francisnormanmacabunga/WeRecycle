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
      <div class="item-slick1 bg-overlay1" style="background-image: url({{asset('donor-design/images/header.gif')}});">
        <div class="container h-full">

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

          <div class="flex-col-c-m h-full p-t-100 p-b-30">
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
              <center><a href="/redeemcode/{{Auth::user()->userID}}" onclick="confirm('Are you sure you want to claim your discount code?')" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">Redeem</a></center>

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
<!--===============================================================================================-->
	<script src="{{asset('donor-design/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('donor-design/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('donor-design/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('donor-design/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('donor-design/vendor/select2/select2.min.js')}}"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('donor-design/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('donor-design/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('donor-design/vendor/slick/slick.min.js')}}"></script>
	<script src="{{asset('donor-design/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('donor-design/vendor/parallax100/parallax100.js')}}"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset('donor-design/vendor/isotope/isotope.pkgd.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('donor-design/vendor/sweetalert/sweetalert.min.js')}}"></script>
	<script src="{{asset('donor-design/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
<script src="{{asset('donor-design/js/main.js')}}"></script>

  </body>
  </html>
