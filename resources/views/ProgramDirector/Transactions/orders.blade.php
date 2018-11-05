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
                    <li class="nav-item"> <a class="nav-link " href="{{ url('/programdirector/requests') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Requests</span></a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="{{ url('/programdirector/orders') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Orders</span></a> </li>
                </ul>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Transaction-Orders</h5>
                                <div class="table-responsive">
                                    @if(count($order) > 0)
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>ID</th>
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
                                            @foreach ($order as $orders)
                                            @php
                                            $cart = json_decode($orders->cart);
                                            @endphp
                                            @foreach($cart as $item)
                                            <tr>
                                                <td> {{$orders->transid}} </td>
                                                <td> {{date('F d, Y, h:i:sa', strtotime($orders->created_at))}} </td>
                                                <td> {{$orders->donor->firstname}} {{$orders->donor->lastname}} </td>
                                                <td> Barangay: {{$orders->donor->barangay}}, {{$orders->donor->street}}, {{$orders->donor->city}}, Zip: {{$orders->donor->zip}} </td>
                                                <td> {{$orders->type}} </td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>{{$item->qty}}</td>
                                                <td> {{$orders->status}} </td>
                                                <td> {{$orders->volunteer['firstname']}} {{$orders->volunteer['lastname']}}</td>
                                                @endforeach
                                                @if($orders->status == 'Cancelled' || $orders->status == 'Delivered')
                                                    <td>
                                                        <a data-toggle="tooltip" data-placement="top"><button disabled class="btn-sm btn-light"><i class="mdi mdi-message-reply-text"></i></button></a>
                                                        <a data-toggle="tooltip" data-placement="top"><button disabled class="btn-sm btn-light"><i class="mdi mdi-message-reply"></i></button></a>
                                                        <a data-toggle="tooltip" data-placement="top"><button disabled class="btn-sm btn-light"><i class="fas fas fa-edit"></i></button></a>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <a href="/programdirector/sendSMS-V-O/transactionID={{$orders->transid}}" data-toggle="tooltip" data-placement="top" title="Message Volunteer"><i class="mdi mdi-message-reply-text"></i></a>
                                                        <a href="/programdirector/sendSMS-D-O/transactionID={{$orders->transid}}" data-toggle="tooltip" data-placement="top" title="Message Donor"><i class="mdi mdi-message-reply"></i></a>
                                                        <a href="/programdirector/orders/{{$orders->transid}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fas fa-edit"></i></a>
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
                                        <h5>No orders found.</h5>
                                    </div>
                                    @endif
                                </div>
                                {{$order -> links()}}
                            </div>
                        </div>
                        <div class="col-xs-12" align="right">
                            <a href="{{action('ProgramDirector\TransactionPDF@transactionPDFO')}}" class="btn btn-danger"><i class="mdi mdi-file-pdf"></i> PDF</a>
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
