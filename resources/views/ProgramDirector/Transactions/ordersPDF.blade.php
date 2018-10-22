
    <div class="col-md-9">
    <div class="row">
        @if(count($order) > 0)
      <table class="table table-bordered" class="fixed">
        <tr>
          <th>Transaction ID
          <th>Date</th>
          <th>Name</th>
          <th>Address</th>
          <th>Item Type</th>
          <th>Item Name</th>
          <th>Item Price</th>
          <th>Item Quantity</th>
          <th>Status</th>
          <th>Assigned Volunteer</th>
          <th>Action</th>
        </tr>
        @foreach ($order as $orders)
          @php
            $cart = json_decode($orders->cart);
          @endphp
        <tr>
          <td> {{$orders->transid}} </td>
          <td> {{date('F d, Y, h:i:sa', strtotime($orders->created_at))}} </td>
          <td> {{$orders->donor->firstname}} {{$orders->donor->lastname}} </td>
          <td> Barangay: {{$orders->donor->barangay}}, {{$orders->donor->street}}, {{$orders->donor->city}}, Zip: {{$orders->donor->zip}} </td>
          <td> {{$orders->type}} </td>
          @foreach($cart as $item)
          <td>{{$item->name}}</td>
          <td>{{$item->price}}</td>
          <td>{{$item->qty}}</td>
          @endforeach
          <td> {{$orders->status}} </td>
          <td> {{$orders->volunteer['firstname']}} {{$orders->volunteer['lastname']}}</td>
        </tr>
        @endforeach
    </table>

    <div class="col-xs-12" align="left">
      <a href="{{action('ProgramDirector\TransactionPDF@transactionPDFO')}}" class="btn btn-danger"><i class="mdi mdi-file-pdf"></i> PDF</a>
      <button class="btn btn-info" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
    </div>
    @else
    <div align="center" style="color:red;">
      <h4 style="font-family:serif;">No orders found.</h4>
    </div>
    @endif
    </div>
  </div>
</div>
