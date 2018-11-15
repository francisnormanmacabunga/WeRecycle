<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="zmdi zmdi-chevron-up"></i>
	</span>
</div>

<footer class="bg3 p-t-75 p-b-32" style="background-color: #1B4D3E">
	<div class="container">
	<div class="row">
		<div class="col-sm-6 col-lg-3 p-b-50">
			<h4 class="stext-301 cl0 p-b-30">
				Help
			</h4>

			<ul>
				<li class="p-b-10">
					<a href="{{ url('/donor/donors') }}" class="stext-107 cl7 hov-cl1 trans-04">
						View Profile
					</a>
				</li>
				<li class="p-b-10">
					<a href="{{url('/faqs')}}" class="stext-107 cl7 hov-cl1 trans-04">
						FAQs
					</a>
				</li>
			</ul>
		</div>

		<div class="col-sm-6 col-lg-3 p-b-50">
			<h4 class="stext-301 cl0 p-b-30">
				Points and Discounts
			</h4>

			<ul>
				<li class="p-b-10">
					<a href="{{ url('/donor/pointhistory') }}" class="stext-107 cl7 hov-cl1 trans-04">
						Points History
					</a>
				</li>
				<li class="p-b-10">
					<a href="{{ url('/donor/discont') }}" class="stext-107 cl7 hov-cl1 trans-04">
						Discount Codes
					</a>
				</li>
			</ul>
		</div>

		<div class="col-sm-6 col-lg-3 p-b-50">
			<h4 class="stext-301 cl0 p-b-30">
				History
			</h4>
			<ul>
				<li class="p-b-10">
					<a href="{{ url('/donor/transactionhistory') }}" class="stext-107 cl7 hov-cl1 trans-04">
						Transaction History
					</a>
				</li>
				<li class="p-b-10">
					<a href="{{url('/donor/donationhistory')}}" class="stext-107 cl7 hov-cl1 trans-04">
						Donation History
					</a>
				</li>

			</ul>
		</div>
						<div class="col-sm-6 col-lg-3 p-b-50">
							<h4 class="stext-301 cl0 p-b-30">
		Greetings, {{ Auth::user()->username }}.
							</h4>
			<a href="{{ route('donor.logout') }}" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();"
										class="flex-c-m stext-101 cl0 size-118 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
				Logout
			</a>
			<form id="logout-form" action="{{ route('donor.logout') }}" method="POST" style="display: none;">
					@csrf
			</form>
	</div>
	</div>

	<div class="p-t-40">
		<p class="stext-107 cl6 txt-center">
			<font color="white"> Copyright &copy; 2018 WeRecycle™ </font>
		</p>
	</div>
</div>
</footer>
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
