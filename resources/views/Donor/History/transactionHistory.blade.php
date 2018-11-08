<!DOCTYPE html>
        <html lang="en">
        @include('navbar.donor')
        <body>

        	<!-- Title page -->
        	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('donor-design/images/transaction.jpg')}});">
        		<h2 class="ltext-105 cl0 txt-center">
        			Transaction History
        		</h2>
        	</section>
        	<!-- Shoping Cart -->
        		<div class="container">
              <br />
              <div class="flex-w flex-sb-m p-b-52">
        				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
                  <a href="#" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">
                    Transaction History
                  </a>
        					<a href="{{url('/donor/donationhistory')}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                    Donation History
        					</a>
                  <a href="{{ url('/donor/pointhistory') }}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                    Points History
                  </a>
        				</div>
                <div class="flex-w flex-t p-t-16">
                <span class="size-216 stext-116 cl8 p-t-4">
                  Sort:
                </span>
                <div class="flex-w size-217">
                  <a href="{{ url('/donor/transactionhistory') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    All
                  </a>
                  <a href="{{ url('/donor/transactionhistory/?status=Cancelled') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Cancelled
                  </a>
                  <a href="{{ url('/donor/transactionhistory/?status=Delivered') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Delivered
                  </a>
                  <a href="{{ url('/donor/transactionhistory/?status=Shipping') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Shipping
                  </a>
                  <a href="{{ url('/donor/transactionhistory/?status=Processing') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Processing
                  </a>
                </div>
              </div>
              </div>

        			<div class="row">
        				<div class="col-lg-100 col-xl-70 m-lr-auto m-b-500">
        					<div class="m-l-25 m-r--38 m-lr-0-xl">
        						<div class="wrap-table-shopping-cart">
                      @if(count($shop) > 0)
        							<table class="table-shopping-cart">

        								<tr class="table_head">
                          <th class="column-1">Transaction ID</th>
                          <th class="column-1">Assigned Volunteer</th>
                          <th class="column-1">Product Name</th>
                          <th class="column-1">Quantity</th>
                          <th class="column-1">Amount</th>
                          <th class="column-1">@sortablelink('created_at', 'Date')</th>
                          <th class="column-1">Status</th>
                          <th class="column-1">Action</th>
                          <th class="column-1"></th>
        								</tr>
                        @foreach ($shop as $shops)
                        @php
                        $cart = json_decode($shops->cart);
                        @endphp
                        @foreach($cart as $item)
        								<tr class="table_row">
                          <td class="column-1">{{$shops->transid}}</td>
                          <td class="column-1">{{$shops->volunteer['firstname']}} {{$shops->volunteer['lastname']}}</td>
                          @if(!is_null($shops->discountedprice))
                              <td class="column-1">{{$item->name}}</td>
                              <td class="column-1">{{$item->qty}}</td>
                              <td class="column-1">{{$shops->discountedprice}}
                                  @else
                              <td class="column-1">{{$item->name}}</td>
                              <td class="column-1">{{$item->qty}}</td>
                              <td class="column-1">{{$shops->price}}</td>
                              @endif
                              <td class="column-1">{{date('F d, Y, h:i:sa', strtotime($shops->created_at))}}</td>
                              <td class="column-1">{{$shops->status}}</td>
                              @if ($shops->status == 'Shipping' || $shops->status == 'Delivered' || $shops->status == 'Cancelled')
                              <td class="column-1">
                                  <form action="/cancel/{{$shops->transid}}">
                                      <input type="submit" class="btn btn-danger btn-rounded" value="Cancel" disabled />
                                  </form>
                              </td>
                          @else
                          <td class="column-1">
                              <a href="/donor/cancel/{{$shops->transid}}" class="btn btn-danger btn-rounded" value="Cancel" onclick="return confirm('Proceed to cancel order?')">Cancel</a>
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
                  <br />
        					</div>
        				</div>
        			</div>
        		</div>
          @include('navbar.donor-footer')
          </body>
          </html>
