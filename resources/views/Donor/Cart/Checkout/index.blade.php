<!DOCTYPE html>
<html lang="en">
@include('navbar.donor')
<body class="animsition">

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('donor-design/images/catalogcart.jpg')}});">
		<h2 class="ltext-105 cl0 txt-center">
			Checkout
		</h2>
	</section>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{ url('/donor/cart') }}" class="stext-109 cl8 hov-cl1 trans-04">
				Back to cart
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Checkout
			</span>
		</div>
	</div>
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
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

			@if(session()->has('notie'))
			<div class="container">
			<div class="content">
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>{{session()->get('notie')}}</strong>
				</div>
				<br />
			</div>
		</div>
			@endif
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">

								<tr class="table_head">
									<th class="text-center">Name</th>
									<th class="text-center">Price</th>
									<th class="text-center">Quantity</th>
								</tr>
								@foreach($cartItems as $cartItem)
								<tr class="table_row">
									<td class="text-center">{{$cartItem->name}}</td>
									<td class="text-center">
                    ₱ {{$cartItem->price}}.00
                  </td>
									<td class="text-center">
										{{$cartItem->qty}}
									</td>
								</tr>
								@endforeach

							</table>

							<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
								<div class="flex-w flex-m m-r-20 m-tb-5">

								</div>
              <div class="flex-w flex-m m-r-20 m-tb-5">
								<a role="button" href="{{ url('/donor/shopCatalog') }}" class="flex-c-m stext-101 cl0 size-118 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Back to catalog
								</a>
              </div>
                </div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Billing Details
						</h4>

            <div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Name:
								</span>
							</div>

							<div class="size-209">
								<span class="stext-110 cl2">
									{{$donor->firstname}} {{$donor->lastname}}
								</span>
							</div>

							<div class="size-208">
								<span class="stext-110 cl2">
									Address:
								</span>
							</div>

							<div class="size-209">
								<span class="stext-111 cl6 p-t-2">
									{{$donor->street}}, {{$donor->city}}
								</span>
							</div>

							<div class="size-208">
							</div>

							<div class="size-209">
								<span class="stext-111 cl6 p-t-2">
									Brgy. {{$donor->barangay}}
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">

							@if($order->discountedprice != '')
							<div class="size-208">
								<span class="stext-110 cl2">
									Discounted Price:
								</span>
							</div>

							<div class="size-209">
								<span class="text-110 cl2">
								 ₱ {{$order->discountedprice}}
								</span>
							</div>
							@else
            </div>

						<div class="flex-w flex-t p-t-27 p-b-33">

							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									₱ {{$order->price}}
								</span>
							</div>
							@endif
						</div>


						<a role="button" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="/donor/checkout-cart/confirm{{$order->orderid}}">
							Confirm
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
  @include('navbar.donor-footer')
  </body>
  </html>
