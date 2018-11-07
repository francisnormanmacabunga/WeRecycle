<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
</head>
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
                                                <th>Quantity</th>
                                                <th>Status</th>
                                                <th>Assigned Volunteer</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach ($request as $requests)
                                            @php
                                            $cart = json_decode($orders->cart);
                                            @endphp
                                            @foreach($cart as $item)
                                            <tr>
                                                <td> {{$requests->transid}} </td>
                                                <td> {{date('F d, Y, h:i:sa', strtotime($requests->created_at))}} </td>
                                                <td> {{$requests->donor->firstname}} {{$requests->donor->lastname}} </td>
                                                <td> Barangay: {{$requests->donor->barangay}}, {{$requests->donor->street}}, {{$requests->donor->city}}, Zip: {{$requests->donor->zip}} </td>
                                                <td> {{$requests->type}} </td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>{{$item->qty}}</td>
                                                <td> {{$requests->status}} </td>
                                                <td> {{$requests->volunteer['firstname']}} {{$requests->volunteer['lastname']}}</td>
                                                @endforeach
                                                @if($requests->status == 'Cancelled' || $requests->status == 'Delivered')
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
                    <div class="col-xs-12" align="right">
                        <a href="{{action('ProgramDirector\TransactionPDF@transactionPDFR')}}" class="btn btn-danger"><i class="mdi mdi-file-pdf"></i> PDF</a>
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
