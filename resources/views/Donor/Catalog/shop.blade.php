<!DOCTYPE html>
<html lang="en">
@include('navbar.donor')

<body class="animsition">

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('donor-design/images/bgshop.jpg')}});">
		<h2 class="ltext-105 cl0 txt-center">
			Shop
		</h2>
	</section>

	<!-- Product -->
		<div class="container-fluid" style="max-width:1000px">
      <br />
      <div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<a href="{{url('/donor/shopCatalog')}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">
						Shop fertilizers
					</a>
					<a href="{{url('/donor/donationCatalog')}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
						Donate
					</a>
				</div>
      </div>
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

			<div class="row isotope-grid">
				@if(count($products2) > 0)
					@foreach ($products2 as $products)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset('images/' . $products->productimage) }}" width="200" height="200" alt="IMG-PRODUCT">
							<a href="{{ route('cart.addItem',$products->productsID) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Add to cart
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$products->productname}}
								</a>

                <span class="stext-105 cl3">
                  ₱{{$products->price}}.00
                </span>

                <span>
                  {{$products->description}}
                </span>
							</div>
						</div>
					</div>
				</div>
        @endforeach
				@else
					<div align="center">
						<h5 class="stext-110 cl2" style="color:red;">No items available.</h5>
					</div>
				@endif
      </div>
		</div>
@include('navbar.donor-footer')
</body>
</html>
