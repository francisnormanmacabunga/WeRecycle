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
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Rate our service
						</h4>
            <label class="stext-115 cl6 size-213 p-t-18">Rate from 1 to 5:</label>
            <input style="width: 150px;" class="form-control" name="rating" type="number" min="1" max="5" maxlength="1" required>

<br />
						<div class="bor8 m-b-30">
							<textarea class="form-control stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="feedback" placeholder="How Can We Help?"></textarea>
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
								werecycle@gmail.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@include('navbar.donor-footer')
</body>
</html>
