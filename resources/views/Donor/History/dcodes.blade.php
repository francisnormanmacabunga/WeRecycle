<!DOCTYPE html>
      <html lang="en">
      @include('navbar.donor')
      <body>

      	<!-- Title page -->
      	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('donor-design/images/faqs.png')}});">
      		<h2 class="ltext-105 cl0 txt-center">
      			Discount Codes
      		</h2>
      	</section>
      	<!-- Shoping Cart -->
      		<div class="container">
            <br />
      			<div class="row">
      				<div class="col-lg-100 col-xl-70 m-lr-auto m-b-500">
      					<div class="m-l-25 m-r--38 m-lr-0-xl">
      						<div class="wrap-table-shopping-cart">
                    @if(count($dcodes) > 0)
                    <table class="table-shopping-cart">

      								<tr class="table_head">
                        <th class="column-1"></th>
      									<th class="column-2">Code</th>
                        <th class="column-3">Status</th>
      									<th class="text-center">Time Gained</th>
                        <th class="column-5"></th>
      								</tr>
      								@foreach ($dcodes as $dcode)
      								<tr class="table_row">
                        <td class="text-center">
                        </td>
      									<td class="column-2">{{$dcode->code}}</td>
	                      <td class="column-2">{{$dcode->status}}</td>
                        <td class="text-center">
                            {{date('F d, Y, h:i:sa', strtotime($dcode->created_at))}}
                        </td>

                        <td class="column-5"></td>
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
                <br />
      					</div>
      				</div>
      			</div>
      		</div>
        @include('navbar.donor-footer')
        </body>
        </html>
