<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<script type="text/javascript">
    $(document).ready(function(){

     $('.input-daterange').datepicker({
      todayBtn:'linked',
      format: "yyyy-mm-dd",
      autoclose: true
     });

     fetch_data('no');

     function fetch_data(is_date_search, start_date='', end_date='')
     {
      var dataTable = $('#order_data').DataTable({
       "processing" : true,
       "serverSide" : true,
       "order" : [],
       "ajax" : {
        url:"fetch.php",
        type:"POST",
        data:{
         is_date_search:is_date_search, start_dsate:start_date, end_date:end_date
        }
       }
      });
     }

     $('#search').click(function(){
      var start_date = $('#start_date').val();
      var end_date = $('#end_date').val();
      if(start_date != '' && end_date !='')
      {
       $('#order_data').DataTable().destroy();
       fetch_data('yes', start_date, end_date);
      }
      else
      {
       alert("Both Date is Required");
      }
     });

    });
</script>
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
                                      From: <input type="text" id="start_date" name="start_date" value="{{date('M-d-Y')}}"/> &nbsp;
                                      To: <input type="text" id="end_date" name="end_date" value="{{date('M-d-Y')}}"/> &nbsp;
                                      <input type="button" name="search" id="search" class="btn btn-warning btn-sm" value="Go!"/>
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
</body>

</html>
