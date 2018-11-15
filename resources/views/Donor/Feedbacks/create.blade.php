<!DOCTYPE html>
<html lang="en">
@include('navbar.donor')

<body class="animsition">


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('donor-design/images/contact.jpg')}});">
		<h2 class="ltext-105 cl0 txt-center">
			Feedback
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
      @include('inc.messages')
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

			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					{!! Form::open(['action' => 'Donor\FeedbacksController@sendFeedback', 'method' => 'POST' ]) !!}
					<link rel="stylesheet" href="{{asset('css/star.css')}}">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Rate our service
						</h4>
							<div class="stars">
								<input type="radio" name="rating" class="form-control star-1" value="1" id="star-1" />
								<label class="star-1" for="star-1">1</label>
								<input type="radio" name="rating" class="form-control star-2" value="2" id="star-2" />
								<label class="star-2" for="star-2">2</label>
								<input type="radio" name="rating" class="form-control star-3" value="3" id="star-3" />
								<label class="star-3" for="star-3">3</label>
								<input type="radio" name="rating" class="form-control star-4" value="4" id="star-4" />
								<label class="star-4" for="star-4">4</label>
								<input type="radio" name="rating" class="form-control star-5" value="5" id="star-5" />
								<label class="star-5" for="star-5">5</label>
								<span></span>
							</div>

<br />
						<div class="bor8 m-b-30">
							<textarea class="form-control stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="feedback" placeholder="We would love to hear from you!"></textarea>
						</div>

						<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					{!! Form::close() !!}
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								2142 Jesus St. Pandacan, Manila, 1011 Metro Manila
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Let's Talk
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								+63917 828 3672
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								werecycle.eco@gmail.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
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
