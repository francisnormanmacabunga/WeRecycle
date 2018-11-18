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
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a class="nav-link active" href="  {{ url('/programdirector/messageOrders') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Orders Messages</span></a> </li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/programdirector/messageRequests') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Requests Messages</span></a> </li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/programdirector/messageDonors') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Donors Messages</span></a> </li>
        </ul>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Orders Message</h5>
                        <div class="table-responsive">
                          @if(count($messageorders) > 0)
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      <th>Date</th>
                                      <th>Assigned Volunteer</th>
                                      <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($messageorders as $messageorder)
                                    <tr>
                                      <td> {{date('F d, Y, h:i:sa', strtotime($messageorder->created_at))}} </td>
                                      <td> {{$messageorder->volunteer->firstname}} {{$messageorder->volunteer->lastname}} </td>
                                      <td> {{$messageorder->message}} </td>
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
                    </div>
                </div>
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
