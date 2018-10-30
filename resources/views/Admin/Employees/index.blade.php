<!DOCTYPE html>
<html dir="ltr" lang="en">
<body>
<div id="main-wrapper">
  @include('navbar.admin-navbar')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"><a class="nav-link ">Filter by:</a></li>
          <li class="nav-item"> <a class="nav-link " href="{{ url('/admin/employees') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">All</span></a> </li>
          <li class="nav-item"> <a class="nav-link " href="{{ url('/admin/employees/?status=Activated') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Activated</span></a> </li>
          <li class="nav-item"> <a class="nav-link " href="{{ url('/admin/employees/?status=Deactivated') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Deactivated</span></a> </li>
        </ul>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List of Employees</h5>
                        <div class="table-responsive">
                          @if(count($employee) > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      <th>User Type</th>
                                      <th>Name</th>
                                      <th>Age</th>
                                      <th>Address</th>
                                      <th>Barangay</th>
                                      <th>Cellphone Number</th>
                                      <th>Telephone Number</th>
                                      <th>@sortablelink('updated_at', 'Date Updated')</th>
                                      <th>Status</th>
                                      <th></th>
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
                        {{$employee->links()}}
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
