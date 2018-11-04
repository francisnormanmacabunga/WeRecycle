@extends('layouts.frontend')
@include('layouts.donor-nav')

@section('content')

<div class="row">
  <div class="col-lg-3">
  <h3>Donation History</h3>
  <div class="list-group">
      <a href="{{url('/donor/donationhistory')}}" class="list-group-item">Donation History</a>
      <a href="{{url('/donor/transactionhistory')}}" class="list-group-item">Transaction History</a>
      <a href="" class="list-group-item">Points History</a>
  </div>

  </div>
  <div class="col-lg-9">
    <div class="row">
        @if(count($donation) > 0)
        <h1>Details</h1>
      <table class="table table-bordered" class="fixed">
        <tr>
          <th>Transaction ID</th>
          <th>Assigned Volunteer</th>
          <th>@sortablelink('created_at', 'Date')</th>
          <th>@sortablelink('status', 'Status')</th>
          <th>Action</th>
        </tr>
        @foreach ($donation as $donations)
          @php
            $cart = json_decode($donations->cart);
          @endphp
        <tr>
          <td>{{$donations->transid}}</td>
          <td>{{$donations->volunteer['firstname']}} {{$donations->volunteer['lastname']}}</td>
          <td>{{date('F d, Y, h:i:sa', strtotime($donations->created_at))}}</td>
          <td>{{$donations->status}}</td>



                    @if ($donations->status == 'Shipping' || $donations->status == 'Delivered' || $donations->status == 'Cancelled')
                    <td>  <form action="/cancel/{{$donations->transid}}">
                      <input type="submit" value="Cancel" disabled/>
                    </form></td>

                    @else
                    <td>  <form action="/cancel/{{$donations->transid}}">
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


<h1>Orders</h1>

    <table class="table table-bordered" class="fixed">
      <tr>
        <th>Transaction ID</th>
        <th>Type of Donation</th>
        <th>Grams</th>

        @foreach ($donation as $donations)
          @php
            $cart = json_decode($donations->cart);
          @endphp
        <tr>
            <td>{{$donations->transid}}</td>
          @foreach($cart as $item)
         <td>{{$item->name}}</td>
         <td>{{$item->qty}}</td>
       @endforeach
        </tr>
        @endforeach
    </table>

  @else
  <div align="center" style="color:red;">
    <h4 style="font-family:serif;">No donations found.</h4>
  </div>
  @endif
  </div>
</div>

@endsection
