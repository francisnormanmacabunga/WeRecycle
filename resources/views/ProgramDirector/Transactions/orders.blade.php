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
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a class="nav-link" href="/programdirector/requests" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">View Requests</span></a> </li>
          <li class="nav-item"> <a class="nav-link active" href="/programdirector/orders" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">View Orders</span></a> </li>
        </ul>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                          @if(count($order) > 0)
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Date</th>
                                      <th>Name</th>
                                      <th>Address</th>
                                      <th>Item Type</th>
                                      <th>Name</th>
                                      <th>Price</th>
                                      <th>Qty</th>
                                      <th>Status</th>
                                      <th>Assigned Volunteer</th>
                                      <th></th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                      <td>
                                        <a href="/programdirector/sendSMS-V-O/transactionID={{$orders->transid}}" title="Message Volunteer"><i class="mdi mdi-message-reply-text"></i></a>
                                        <a href="/programdirector/sendSMS-D-O/transactionID={{$orders->transid}}" title="Message Donor"><i class="mdi mdi-message-reply"></i></a>
                                        <a href="/programdirector/orders/{{$orders->transid}}/edit" title="Edit"><i class="mdi mdi-update"></i></a>
                                      </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div align="center" style="color:red;">
                              <br>
                              <br>
                              <h5>No orders found.</h5>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xs-12" align="right">
                  <a href="{{action('ProgramDirector\TransactionPDF@transactionPDFO')}}" class="btn btn-danger"><i class="mdi mdi-file-pdf"></i> PDF</a>
                  <button class="btn btn-info" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
    </footer>
  </div>
</div>
@include('navbar.footer')
  </body>
  </html>
