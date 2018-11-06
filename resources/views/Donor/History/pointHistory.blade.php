<!DOCTYPE html>
      <html lang="en">
      @include('navbar.donor')
      <body>

      	<!-- Title page -->
      	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('donor-design/images/transaction.jpg')}});">
      		<h2 class="ltext-105 cl0 txt-center">
      			Points History
      		</h2>
      	</section>
      	<!-- Shoping Cart -->
      		<div class="container">
            <br />
            <div class="flex-w flex-sb-m p-b-52">
      				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <a href="#" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">
                  Points History
                </a>
      					<a href="{{url('/donor/transactionhistory')}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                  Transaction History
      					</a>
                <a href="{{ url('/donor/donationhistory') }}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                  Donation History
                </a>
      				</div>
            </div>

      			<div class="row">
      				<div class="col-lg-100 col-xl-70 m-lr-auto m-b-500">
      					<div class="m-l-25 m-r--38 m-lr-0-xl">
      						<div class="wrap-table-shopping-cart">
                    @if(count($point) > 0)
                    <table class="table-shopping-cart">

      								<tr class="table_head">
                        <th class="column-1"></th>
      									<th class="column-2">Activity</th>
      									<th class="column-2">Points Gained</th>
      									<th class="text-center">Time Gained</th>
                        <th class="column-5"></th>
      								</tr>
      								@foreach ($point as $points)
      								<tr class="table_row">
                        <td class="text-center">
                        </td>
      									<td class="column-2">{{$points->activity}}</td>
      									<td class="column-1">
                          {{$points->points}}
                        </td>
      									<td class="column-4">
                          {{date('F d, Y, h:i:sa', strtotime($points->created_at))}}
      									</td>
                        <td class="text-center">
                        </td>
      								</tr>
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
                  <div class="flex-w flex-t p-t-16">
                  <span class="size-216 stext-116 cl8 p-t-4">
                    Sort:
                  </span>
                  <div class="flex-w size-217">
                    <a href="{{ url('/donor/pointhistory') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                      All
                    </a>
                    <a href="{{ url('/donor/pointhistory/?status=Purchased') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                      Purchased
                    </a>
                    <a href="{{ url('/donor/pointhistory/?status=Donated') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                      Donated
                    </a>
                  </div>
                </div>
                <br />
      					</div>
      				</div>
      			</div>
      		</div>
        @include('navbar.donor-footer')
        </body>
        </html>
