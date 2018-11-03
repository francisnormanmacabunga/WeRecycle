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


          <li class="nav-item"> <a class="nav-link active" href="{{ url('/programdirector/requests') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Requests</span></a> </li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/programdirector/orders') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Orders</span></a> </li>
        </ul>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transaction-Requests</h5>
                        <div class="table-responsive">
                          @if(count($request) > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                </thead>
                                <tbody>
                                  @foreach ($request as $requests)
                                    @php
                                      $cart = json_decode($requests->cart);
                                    @endphp
                                    <tr>
                                      <td><strong>ID</strong></td>
                                      <td><strong>Date</strong></td>
                                      <td><strong>Name</strong></td>
                                      <td><strong>Address</strong></td>
                                      <td><strong>Item Type</strong></td>
                                      <td><strong>Item Name</strong></td>
                                      <td><strong>Weight</strong></td>
                                      <td><strong>Status</strong></td>
                                      <td><strong>Assigned Volunteer</strong></td>
                                      <td><strong>Action</strong></td>
                                    </tr>

                                      @foreach($cart as $item)
                                    <tr>
                                      <td>{{$requests->transid}}</td>
                                      <td> {{date('F d, Y, h:i:sa', strtotime($requests->created_at))}} </td>
                                      <td> {{$requests->donor->firstname}} {{$requests->donor->lastname}} </td>
                                      <td> Barangay: {{$requests->donor->barangay}}, {{$requests->donor->street}}, {{$requests->donor->city}}, Zip: {{$requests->donor->zip}} </td>
                                      <td> {{$requests->type}} </td>

                                      <td>{{$item->name}}</td>
                                      <td>{{$item->qty}}</td>

                                      <td> {{$requests->status}} </td>
                                      <td> {{$requests->volunteer['firstname']}} {{$requests->volunteer['lastname']}}</td>

                                      @endforeach


                                      @if($requests->status == 'Cancelled' || $requests->status == 'Delivered')
                                      <td>
                                        <a  data-toggle="tooltip" data-placement="top"  title="Message Volunteer"><button disabled><i class="mdi mdi-message-reply-text"></i></button></a>
                                        <a  data-toggle="tooltip" data-placement="top"  title="Message Donor"><button disabled><i class="mdi mdi-message-reply"></i></button></a>
                                        <a  data-toggle="tooltip" data-placement="top"  title="Edit"><button disabled><i class="fas fas fa-edit"></button></i></a>

                                      </td>
                                      @else
                                      <td>
                                      <a href="/programdirector/sendSMS-V-R/transactionID={{$requests->transid}}" data-toggle="tooltip" data-placement="top"  title="Message Volunteer"><i class="mdi mdi-message-reply-text"></i></a>
                                      <a href="/programdirector/sendSMS-D-R/transactionID={{$requests->transid}}" data-toggle="tooltip" data-placement="top"  title="Message Donor"><i class="mdi mdi-message-reply"></i></a>
                                      <a href="/programdirector/requests/{{$requests->transid}}/edit" data-toggle="tooltip" data-placement="top"  title="Edit"><i class="fas fas fa-edit"></i></a>
                                    </td>
                                      @endif
                                    </tr>
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
                        {{$request -> links()}}
                    </div>
                </div>
                <div class="col-xs-12" align="right">
                  <a href="{{action('ProgramDirector\TransactionPDF@transactionPDFR')}}" class="btn btn-danger"><i class="mdi mdi-file-pdf"></i> PDF</a>
                  <button class="btn btn-info" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
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
