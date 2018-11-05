<!DOCTYPE html>
    <html lang="en">
    @include('navbar.donor')
    <body class="animsition">

    	<!-- Title page -->
    	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('donor-design/images/cart.jpg')}});">
    		<h2 class="ltext-105 cl0 txt-center">
    			Donation History
    		</h2>
    	</section>

    	<!-- Shoping Cart -->
    		<div class="container">

          <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10 align-right">

            </div>
          </div>

    			<div class="row">
    				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
    					<div class="m-l-25 m-r--38 m-lr-0-xl">
    						<div class="wrap-table-shopping-cart">
                  @if(count($donation) > 0)
    							<table class="table-shopping-cart">

    								<tr class="table_head">
                      <th>Transaction ID</th>
                      <th>Assigned Volunteer</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>@sortablelink('created_at', 'Date')</th>
                      <th>@sortablelink('status', 'Status')</th>
                      <th>Action</th>
    								</tr>
                    @foreach ($donation as $donations)
                    @php
                    $cart = json_decode($donations->cart);
                    @endphp
                    @foreach($cart as $item)
    								<tr class="table_row">
                      <td>{{$donations->transid}}</td>
                      <td>{{$donations->volunteer['firstname']}} {{$donations->volunteer['lastname']}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->qty}}</td>
                      <td>{{date('F d, Y, h:i:sa', strtotime($donations->created_at))}}</td>
                      <td>{{$donations->status}}</td>
                      @if ($donations->status == 'Shipping' || $donations->status == 'Delivered' || $donations->status == 'Cancelled')
                      <td>
                          <form action="/cancel/{{$donations->transid}}">
                              <input type="submit" value="Cancel" disabled />
                          </form>
                      </td>
                      @else
                      <td>
                          <form action="/cancel/{{$donations->transid}}">
                              <input type="submit" value="Cancel"onclick="if(confirm('Are you sure?')) saveandsubmit(event);" />
                          </form>
                      </td>
                      @endif
    								</tr>
    								@endforeach
    								@endforeach
                    @else
    								<td colspan="10">
    									<br />
    									<div class="text-center">
    										<h5 class="stext-110 cl2" style="color:red;">No records found.</h5>
    									</div>
    									<br />
    								</td>
    								@endif
    							</table>
    						</div>
    					</div>
    				</div>

    				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
              <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                <h4 class="mtext-112 cl2 p-b-33">
                  Sort by
                </h4>
                <ul>
                  <li class="bor18">
                    <a href="{{ url('/donor/donationhistory') }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                      All
                    </a>
                  </li>

                  <li class="bor18">
                    <a href="{{ url('/donor/donationhistory/?status=Cancelled') }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                      Cancelled
                    </a>
                  </li>

                  <li class="bor18">
                    <a href="{{ url('/donor/pointhistory/?status=Delivered') }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                      Delivered
                    </a>
                  </li>

                  <li class="bor18">
                    <a href="{{ url('/donor/pointhistory/?status=Shipping') }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                      Shipping
                    </a>
                  </li>

                  <li class="bor18">
                    <a href="{{ url('/donor/pointhistory/?status=Processing') }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                      Processing
                    </a>
                  </li>
                </ul>
                <div class="p-t-50">
                <h4 class="mtext-112 cl2 p-b-27">
                  History Tags
                </h4>

                <div class="flex-w m-r--5">
                  <a href="{{url('/donor/transactionhistory')}}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Transaction
                  </a>
                  <a href="{{ url('/donor/pointhistory') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Points
                  </a>
                </div>
              </div>
              </div>
    				</div>
    			</div>
    		</div>
      @include('navbar.donor-footer')
      </body>
      </html>
