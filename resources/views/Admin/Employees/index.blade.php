<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
</head>
<body>
<div id="main-wrapper">
  @include('navbar.admin-navbar')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
              <h5 class="card-title">List of Employees</h5>
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                          @if(count($employee) > 0)
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      <th>User Type</th>
                                      <th>Name</th>
                                      <th>Age</th>
                                      <th>Address</th>
                                      <th>Barangay</th>
                                      <th>Cellphone Number</th>
                                      <th>Telephone Number</th>
                                      <th>Date Created</th>
                                      <th>Date Updated</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($employee as $employees)
                                    <tr>
                                      <td>{{$employees->usertype}}</td>
                                      <td>{{$employees->firstname}} {{$employees->lastname}}</td>
                                      <td>{{$employees->age()}}</td>
                                      <td>{{$employees->street}}, {{$employees->city}}</td>
                                      <td>{{$employees->barangay}}</td>
                                      <td>{{$employees->cellNo}}</td>
                                      <td>{{$employees->tellNo}}</td>
                                      <td>{{date('F d, Y, h:i:sa', strtotime($employees->created_at))}}</td>
                                      <td>{{date('F d, Y, h:i:sa', strtotime($employees->updated_at))}}</td>
                                      <td>{{$employees->status}}</td>
                                      <td><a href="/admin/employees/{{$employees->userID}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fas fa-edit"></i></a></td>
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
