
    <div class="col-md-9">
    <div class="row">



      @if(count($request) > 0)
      <table class="table table-bordered" class="fixed">
        <tr>
          <th>Transaction ID</th>
          <th>Date</th>
          <th>Name</th>
          <th>Address</th>
          <th>Item Type</th>
          <th>Item Name</th>
          <th>Item Quantity</th>
          <th>Status</th>
          <th>Assigned Volunteer</th>
        </tr>
        @foreach ($request as $requests)
          @php
            $cart = json_decode($requests->cart);
          @endphp
        <tr>
          <td> {{$requests->transid}} </td>
          <td> {{date('F d, Y, h:i:sa', strtotime($requests->created_at))}} </td>
          <td> {{$requests->donor->firstname}} {{$requests->donor->lastname}} </td>
          <td> Barangay: {{$requests->donor->barangay}}, {{$requests->donor->street}}, {{$requests->donor->city}}, Zip: {{$requests->donor->zip}} </td>
          <td> {{$requests->type}} </td>
          @foreach($cart as $item)
          <td>{{$item->name}}</td>
          <td>{{$item->qty}}</td>
          @endforeach
          <td> {{$requests->status}} </td>
          <td> {{$requests->volunteer['firstname']}} {{$requests->volunteer['lastname']}}</td>
        </tr>
        @endforeach
    </table>


    @else
    <div align="center" style="color:red;">
      <h4 style="font-family:serif;">No requests found.</h4>
    </div>
    @endif
    </div>
    </div>
  </div>
