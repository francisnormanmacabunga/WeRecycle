@extends('layouts.frontend')
@include('layouts.donor-nav')

@section('content')

<div class="row">
  <div class="col-lg-3">
  <h3>Orders History</h3>
  <div class="list-group">
    <a href="{{url('/donor/donationhistory')}}" class="list-group-item">Donation History</a>
    <a href="{{url('/donor/transactionhistory')}}" class="list-group-item">Orders History</a>
  </div>

  </div>
  <div class="col-lg-9">
    <div class="row">
      @if(count($shop) > 0)
      <table class="table table-bordered" class="fixed">
        <tr>
          <th>Name of Volunteer</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Amount</th>
          <th>@sortablelink('created_at', 'Date')</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        @foreach ($shop as $shops)
          @php
            $cart = json_decode($shops->cart);
          @endphp
        <tr>
          <td>{{$shops->volunteer['firstname']}} {{$shops->volunteer['lastname']}}</td>

          @if(!is_null($shops->discountedprice))

          @foreach($cart as $item)
          <td>{{$item->name}}</td>
          <td>{{$item->qty}}</td>
          @endforeach
          <td>{{$shops->discountedprice}}
          @else

        @foreach($cart as $item)
        <td>{{$item->name}}</td>
        <td>{{$item->qty}}</td>
        @endforeach
        <td>{{$shops->price}}</td>
        @endif
        <td>{{date('F d, Y, h:i:sa', strtotime($shops->created_at))}}</td>
          <td>{{$shops->status}}</td>

          @if ($shops->status == 'Shipping' || $shops->status == 'Delivered' || $shops->status == 'Cancelled')
          <td>  <form action="/cancel/{{$shops->transid}}">
            <input type="submit" value="Cancel" disabled/>
          </form></td>

          @else
          <td>  <form action="/cancel/{{$shops->transid}}">
              <input type="submit" value="Cancel" onclick="Confirm()"/>
            </form></td>

          @endif


            <script type="text/javascript">
                function Confirm() {
                    var confirm_value = document.createElement("INPUT");
                    confirm_value.type = "hidden";
                    confirm_value.name = "confirm_value";
                    if (confirm("Do you want to save data?")) {
                        confirm_value.value = "Yes";
                    } else {
                        confirm_value.value = "No";
                    }
                    document.forms[0].appendChild(confirm_value);
                }
            </script>

        </tr>
        @endforeach
    </table>
  @else
  <div align="center" style="color:red;">
    <h4 style="font-family:serif;">No orders found.</h4>
  </div>
  @endif
  </div>
</div>

@endsection
