<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <!-- DATE RANGE SCRIPT -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- END OF DATE RANGE SCRIPT -->
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
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a class="nav-link" href="{{ url('/programdirector/donationhistory') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">All</span></a> </li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/programdirector/donationhistoryP') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Processing</span></a> </li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/programdirector/donationhistoryS') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Dispatched</span></a> </li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/programdirector/donationhistoryD') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Accepted</span></a> </li>
          <li class="nav-item"> <a class="nav-link active" href="{{ url('/programdirector/donationhistoryC') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Cancelled</span></a> </li>
        </ul>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Donation History</h5>
                        <div class="table-responsive">
                          @if(count($donation) > 0)
                            <table id="zero_config" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>Transaction ID</th>
                                    <th>Assigned Volunteer</th>
                                    <th>Type of Donation</th>
                                    <th>Weight (g)</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                  @foreach ($donation as $donations)
                                    @php
                                      $cart = json_decode($donations->cart);
                                    @endphp
                                    @foreach($cart as $item)
                                    <tr>
                                      <td> {{$donations->transid}} </td>
                                      <td>{{$donations->volunteer['firstname']}} {{$donations->volunteer['lastname']}}</td>

                                      <td>{{$item->name}}</td>
                                      <td>{{$item->qty}}</td>

                                      <td>{{date('F d, Y, h:i:sa', strtotime($donations->updated_at))}}</td>
                                      <td>{{$donations->status}}</td>
                                    </tr>
                                    @endforeach
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
                        </br>
                    </div>
                </div>
            <!-- DATE RANGE -->
            <div class="col-xs-12" align="right">
              <form method="POST" action="{{action('ProgramDirector\DonationHistoryController@donationPDFC')}}">
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
        Copyright
        &copy; <?php
          $fromYear = 2018;
          $thisYear = (int)date('Y');
          echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?>
         WeRecycle™
    </footer>
  </div>
</div>
@include('navbar.footer')
  </body>
  </html>
