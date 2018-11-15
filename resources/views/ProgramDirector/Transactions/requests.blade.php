<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
</head>
<!-- DATE RANGE SCRIPT -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- END OF DATE RANGE SCRIPT -->
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
              @if(session()->has('sms'))
              <div class="content">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>{{session()->get('sms')}}</strong>
                </div>
              </div>
              @endif
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
                              <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link">Filter by:</a></li>
                                <li class="nav-item"> <a class="nav-link " href="{{ url('/programdirector/requests') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">All</span></a> </li>
                                <li class="nav-item"> <a class="nav-link " href="{{ url('/programdirector/requests/?status=Processing') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Processing</span></a> </li>
                                <li class="nav-item"> <a class="nav-link " href="{{ url('/programdirector/requests/?status=Shipping') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Dispatched</span></a> </li>
                                <li class="nav-item"> <a class="nav-link " href="{{ url('/programdirector/requests/?status=Delivered') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Accepted</span></a> </li>
                                <li class="nav-item"> <a class="nav-link " href="{{ url('/programdirector/requests/?status=Cancelled') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Cancelled</span></a> </li>
                              </ul>
                                <div class="table-responsive">
                                    @if(count($request) > 0)
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Item Type</th>
                                                <th>Item Name</th>
                                                <th>Item Price</th>
                                                <th>Weight</th>
                                                <th>Status</th>
                                                <th>Assigned Volunteer</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach ($request as $requests)
                                            @php
                                            $cart = json_decode($requests->cart);
                                            @endphp
                                            @foreach($cart as $item)
                                            <tr>
                                                <td> {{$requests->transid}} </td>
                                                <td> {{date('F d, Y, h:i:sa', strtotime($requests->updated_at))}} </td>
                                                <td> {{$requests->donor->firstname}} {{$requests->donor->lastname}} </td>
                                                <td> Barangay: {{$requests->donor->barangay}}, {{$requests->donor->street}}, {{$requests->donor->city}}, Zip: {{$requests->donor->zip}} </td>
                                                <td> {{$requests->type}} </td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>{{$item->qty}}</td>
                                                <td> {{$requests->status}} </td>
                                                <td> {{$requests->volunteer['firstname']}} {{$requests->volunteer['lastname']}}</td>
                                                @endforeach
                                                @if($requests->status == 'Cancelled' || $requests->status == 'Accepted')
                                                    <td>
                                                      <a data-toggle="tooltip" data-placement="top"><button disabled class="btn-sm btn-light"><i class="mdi mdi-message-reply-text"></i></button></a>
                                                      <a data-toggle="tooltip" data-placement="top"><button disabled class="btn-sm btn-light"><i class="mdi mdi-message-reply"></i></button></a>
                                                      <a data-toggle="tooltip" data-placement="top"><button disabled class="btn-sm btn-light"><i class="fas fas fa-edit"></button></i></a>
                                                    </td>
                                                    @else
                                                    <td>
                                                      <a href="/programdirector/sendSMS-V-R/transactionID={{$requests->transid}}" data-toggle="tooltip" data-placement="top" title="Message Volunteer"><i class="mdi mdi-message-reply-text"></i></a><br/>
                                                      <a href="/programdirector/sendSMS-D-R/transactionID={{$requests->transid}}" data-toggle="tooltip" data-placement="top" title="Message Donor"><i class="mdi mdi-message-reply"></i></a><br/>
                                                      <a href="/programdirector/requests/{{$requests->transid}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fas fa-edit"></i></a>
                                                    </td>
                                                    @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <div align="center" style="color:red;">
                                        <br>
                                        <br>
                                        <h5>No requests found.</h5>
                                    </div>
                                    @endif
                                </div>
                              </br>
                                {{$request -> links()}}
                            </div>
                        </div>
                        <!-- DATE RANGE -->
                        <div class="col-xs-12" align="right">
                          <form method="POST" action="{{action('ProgramDirector\TransactionPDF@transactionPDFR')}}">
                            <input name="" type="hidden" value="">
                            {{ csrf_field() }}
                              From: <input type="text" id="datepickerfrom" name="start" value="{{date('M-d-Y')}}"/> &nbsp;
                              To: <input type="text" id="datepickerpresent" name="end" value="{{date('M-d-Y')}}"/> &nbsp;
                              <button type="submit" class="btn btn-warning btn-sm">Generate PDF Report</button>
                          </form>
                        </div>
                        <!-- END OF DATE RANGE -->
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

<!-- DATE RANGE SCRIPTS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
      $(function () {
          $("#datepickerfrom").datepicker({ maxDate: new Date(), dateFormat: "yy-mm-dd"});
      });
      $(function () {
          $("#datepickerpresent").datepicker({ maxDate: new Date(), dateFormat: "yy-mm-dd"});
      });
  </script>
<!-- END OF DATE RANGE SCRIPTS -->

</html>
