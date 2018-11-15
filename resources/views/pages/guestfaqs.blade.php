<!DOCTYPE html>
<html lang="en">
@include('navbar.guest')
<body class="animsition">
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('donor-design/images/discount.jpg')}});">
		<h2 class="ltext-105 cl0 txt-center">
			Frequently Asked Questions
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							I forgot my password. How do I retrieve it?
						</h3>

						<p class="stext-113 cl6 p-b-26">
							<strong>Step 1:</strong> On our <a href="{{ url('/donor/login') }}">login page</a>, click on "Forgot your password?" button below the textboxes.
							<br />
							<strong>Step 2:</strong> Enter your e-mail address below and we will send you a link to recover your password.
							Click "Recover" button after filling up.
							<br />
							<strong>Step 3:</strong> Go to your e-mail address and look for our e-mail message.
							Click "Reset password" button below the message.
							<br />
							<strong>Step 4:</strong> Enter your e-mail address, new password, and confirm password below to update your password.
							<br />
							<strong>Step 5:</strong> After clicking on reset, you've reset your password.
						</p>
						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<a href="{{ url('/donor/password/reset') }}" class="stext-114 cl6 p-r-40 p-b-11">
								Click here to reset your password
							</a>
						</div>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="{{ asset('donor-design/images/ins-1.png') }}"  alt="IMG">
						</div>
					</div>
				</div>

				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<br />
						<br />
						<h3 class="mtext-111 cl2 p-b-16">
							I want to have a discount on my next purchase. How can I claim it?
						</h3>

						<p class="stext-113 cl6 p-b-26">
							<strong>Step 1:</strong> You must first create an account, agree to our terms and condition and login with your credentials.
							<br />
							<strong>Step 2:</strong> Then choose something to donate from our donation catalog on our donor homepage.
							Every 1000 grams of donated wastes will be equivalent to 2 points!
							<br />
							<strong>Step 3:</strong> Once your donated wastes are picked up by our volunteer, gour transaction will be successful.
							Every successful transaction you make, your points accumulate!
							<br />
							<strong>Step 4:</strong> Reach up to 100 points to redeem your coupon code! 100 points is equivalent to 20% off on your next purchase of fertilizer.
							We aim to lessen the trash and encourage you to buy our fertilizer to plant more trees!
							<br />
							<strong>Step 5:</strong> Once you have reached 100 points, a 'Redeem' button will appear below your progress bar.
							Click redeem once you reach 100 points. You are also free to redeem your coupon code anytime you want! No pressure.
						</p>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="{{ asset('donor-design/images/ins-2.png') }}" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		@include('navbar.guest-footer')
    </body>
    </html>
