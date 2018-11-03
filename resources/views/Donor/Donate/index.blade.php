<!DOCTYPE html>
<html lang="en">
@include('navbar.donor')
<body class="animsition">
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{url('/donor/donationCatalog')}}" class="stext-109 cl8 hov-cl1 trans-04">
				Back
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Donation list
			</span>
		</div>
	</div>

  @if(session()->has('notif'))
  <div class="container">
<div class="content">
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>{{session()->get('notif')}}</strong>
  </div>
</div>
</div>
@endif

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
              @if(count($cartItems) > 0)
                    @foreach($cartItems as $cartItem)
							<table class="table-shopping-cart">

								<tr class="table_head">
                  <th class="column-1"></th>
									<th class="column-2">Name</th>
									<th class="column-3">Grams(g)</th>
									<th class="text-center"></th>
                  <th class="column-5"></th>
								</tr>

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
                    {!! Form::open(['route' => ['cart.update',$cartItem->rowId], 'method' => 'PUT']) !!}
                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                      <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-minus"></i>
                      </div>

                      <input class="mtext-104 cl3 txt-center num-product" name="qty" type="number" value="{{$cartItem->qty}}">

                      <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-plus"></i>
                      </div>
                    </div>
                  </td>
									<td class="column-4">
									</td>
                  <td class="column-5">

                  </td>
								</tr>
							</table>
              <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                <input class="flex-c-m stext-101 cl0 size-118 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit" onclick="return confirm('Do you want to update this item?')" value="Update Cart">
                {!! Form::close() !!}
              @endforeach

              <div class="flex-w flex-m m-r-20 m-tb-5">
                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="dcode"  placeholder="Coupon Code">
                <input class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" role="button" type="submit" value="Apply coupon">
              </div>
                </div>
                @else
                <tr class="table_row">
                  <div align="center" >
                    <h5 class="stext-110 cl2" style="color:red;">No items in donation list.</h5>
                  </div>
                    </tr>
                @endif
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Donation list
						</h4>

            <div class="flex-w flex-t bor12 p-b-13">
              <div class="size-208">
                <span class="stext-110 cl2">
                </span>
              </div>

              <div class="size-209">
                <span class="mtext-110 cl2">
                </span>
              </div>

              <div class="size-208">
                <span class="stext-110 cl2">
                </span>
              </div>

              <div class="size-209">
                <span class="mtext-110 cl2">
                </span>
              </div>
            </div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total grams:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									{{Cart::count()}}g
								</span>
							</div>
						</div>

						<a role="button" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="{{url('/donor/submit-cart')}}">
							Proceed to Summary
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
  @include('navbar.donor-footer')
  </body>
  </html>
