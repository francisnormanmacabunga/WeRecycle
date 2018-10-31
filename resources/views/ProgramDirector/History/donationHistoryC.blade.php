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
          <li class="nav-item"> <a class="nav-link" href="{{ url('/programdirector/donationhistory') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Reset</span></a> </li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/programdirector/donationhistoryS') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Shipping</span></a> </li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/programdirector/donationhistoryD') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Delivered</span></a> </li>
          <li class="nav-item"> <a class="nav-link active" href="{{ url('/programdirector/donationhistoryC') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Cancelled</span></a> </li>
        </ul>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Donation History</h5>
                        <div class="table-responsive">
                          @if(count($donation) > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Assigned Volunteer</th>
                                        <th>Type of Donation</th>
                                        <th>Weight</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($donation as $donations)
                                    @php
                                      $cart = json_decode($donations->cart);
                                    @endphp
                                    <tr>
                                      <td>{{$donations->volunteer['firstname']}} {{$donations->volunteer['lastname']}}</td>
                                      @foreach($cart as $item)
                                      <td>{{$item->name}}</td>
                                      <td>{{$item->qty}}</td>
                                    @endforeach
                                      <td>{{date('F d, Y, h:i:sa', strtotime($donations->created_at))}}</td>
                                      <td>{{$donations->status}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div align="center" style="color:red;">
                              <br>
                              <br>
                              <h5>No records found.</h5>
                            </div>
                            @endif
                        </div>
                      {{$donation->links()}}
                    </div>
                </div>
                <div class="col-xs-12" align="right">
                  <a href="{{action('ProgramDirector\DonationHistoryController@donationPDFC')}}" class="btn btn-danger"><i class="mdi mdi-file-pdf"></i> PDF</a>
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
