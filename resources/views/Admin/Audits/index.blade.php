<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
  <!-- DATE RANGE SCRIPT -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- END OF DATE RANGE SCRIPT -->




</head>

<body>
    <div id="main-wrapper">
        @include('navbar.admin-navbar')
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h5 class="card-title">Audit Logs</h5>
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link ">Filter by:</a></li>
                                    <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/admin/auditlogs') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">All</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/admin/auditlogs/?log_name=Product') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Product</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/admin/auditlogs/?log_name=Volunteer Account') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Volunteer</span></a></li>
                                    <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/admin/auditlogs/?log_name=Program Director Account') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Program Director</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/admin/auditlogs/?log_name=Transaction') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Transaction</span></a></li>
                                    <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/admin/auditlogs/?log_name=Donor Account') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Donor</span></a></li>
                                    <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/admin/auditlogs/?log_name=Employee Account') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Employee</span></a></li>
                                    <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/admin/auditlogs/?log_name=Request') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Request</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/admin/auditlogs/?log_name=Order') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Order</span></a> </li>
                                </ul>
                                <br />
                                <!-- DATE RANGE -->
                                <div class="col-xs-12" align="right">
                                  <form method="POST" action="{{action('Admin\AuditLogController@auditlogsFilter')}}">
                                    <input name="" type="hidden" value="">
                                    {{ csrf_field() }}
                                      From: <input type="text" id="datepickerfrom" name="start" value="{{date('M-d-Y')}}"/> &nbsp;
                                      To: <input type="text" id="datepickerpresent" name="end" value="{{date('M-d-Y')}}"/> &nbsp;
                                      <button type="submit" class="btn btn-warning btn-sm">Filter</button>
                                  </form>
                                </div>
                              </br>
                                <!-- END OF DATE RANGE -->
                                <div class="table-responsive">
                                    @if(count($lastActivity) > 0)
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <!--  <table id="zero_config" class="table table-striped table-bordered"> -->
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Causer</th>
                                                <th>Action</th>
                                                <th>Subject</th>
                                                <th>Subject Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lastActivity as $lastActivitys)
                                            <tr>
                                                <td> {{date('F d, Y, h:i:sa', strtotime($lastActivitys->updated_at))}} </td>
                                                <td> {{$lastActivitys->causer['username']}} </td>
                                                <td> {{$lastActivitys->description}} </td>
                                                <td> {{$lastActivitys->subject['username']}} </td>
                                                <td> {{$lastActivitys->log_name}} </td>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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

</body>

</html>
