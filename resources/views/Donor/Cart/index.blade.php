<!DOCTYPE html>
<html lang="en">
@include('navbar.donor')
<body class="animsition">

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('donor-design/images/catalogcart.jpg')}});">
		<h2 class="ltext-105 cl0 txt-center">
			Cart
		</h2>
	</section>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{url('/donor/shopCatalog')}}" class="stext-109 cl8 hov-cl1 trans-04">
				Back
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shopping Cart
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

		@if(session()->has('notell'))
		<div class="container">
	<div class="content">
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{session()->get('notell')}}</strong>
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
                  <th class="column-1"></th>
									<th class="column-2">Name</th>
									<th class="column-3">Price</th>
									<th class="text-center">Qty</th>
                  <th class="column-5"></th>
								</tr>
								@if(count($cartItems) > 0)
											@foreach($cartItems as $cartItem)
								<tr class="table_row">
                  <td class="text-center">
                    <form action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST">
                       {{csrf_field()}}
                       {{method_field('DELETE')}}
                       <input class="btn btn-danger" onclick="return confirm('Do you want to delete this item?')" type="submit" value="x">
                     </form>
                  </td>
									<td class="column-2">{{$cartItem->name}}</td>
									<td class="column-3">
                    ₱ {{$cartItem->price}}.00
                  </td>
									<td class="column-4">
                    {!! Form::open(['route' => ['cart.update',$cartItem->rowId], 'method' => 'PUT']) !!}
                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                      <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-minus"></i>
                      </div>

                      <input class="mtext-104 cl3 txt-center num-product" name="qty" type="number" min="1" max="15" value="{{$cartItem->qty}}">

                      <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-plus"></i>
                      </div>
                    </div>
									</td>
                  <td class="text-center">
										<input class="btn btn-success" type="submit" onclick="return confirm('Do you want to update this item?')" value="Update">
										{!! Form::close() !!}
                  </td>
								</tr>
								@endforeach
								@else
								<td colspan="10">
									<br />
									<div class="text-center">
										<h5 class="stext-110 cl2" style="color:red;">No items in cart.</h5>
									</div>
									<br />
								</td>
								@endif
							</table>

							<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
																<form action="{{route('cart.submit')}}" method="put">
								<div class="flex-w flex-m m-r-20 m-tb-5">
									<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="dcode"  placeholder="Coupon Code" required>
	                <input class="flex-c-m stext-101 cl0 size-118 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" type="submit" value="Apply coupon">
								</div>
							</form>
              <div class="flex-w flex-m m-r-20 m-tb-5">
								<a role="button" href="{{url('/donor/shopCatalog')}}" class="flex-c-m stext-101 cl0 size-118 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Back
								</a>
              </div>
                </div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>



						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									₱ {{Cart::instance('shop')->subtotal()}}
								</span>
							</div>
						</div>

						<a role="button" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="{{url('/donor/submit-cart')}}">
							Proceed to Checkout
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
  @include('navbar.donor-footer')
  </body>
  </html>
