<!DOCTYPE html>
<html dir="ltr" lang="en">
<body>
<div id="main-wrapper">
  @include('navbar.pd-navbar')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a class="nav-link " href="/programdirector/requests" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Requests</span></a> </li>
          <li class="nav-item"> <a class="nav-link active" href="/programdirector/orders" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Orders</span></a> </li>
        </ul>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transaction-Orders</h5>
                        <div class="table-responsive">
                          @if(count($order) > 0)
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
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
                            <th>
                              <a class="btn btn-block btn-primary" href="/programdirector/sendSMS-V-O/transactionID={{$orders->transid}}" role="button">Message Volunteer</a>
                              <a class="btn btn-block btn-primary" href="/programdirector/sendSMS-D-O/transactionID={{$orders->transid}}" role="button">Message Donor</a>
                              <a class="btn btn-block btn-primary" href="/programdirector/orders/{{$orders->transid}}/edit" role="button">Update Status</a>
                            </th>
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
            </div>
        </div>
    </div>
    <footer class="footer text-center">
      Copyright &copy; 2018 WeRecycle
    </footer>
  </div>
</div>
@include('navbar.footer')
  </body>
  </html>
