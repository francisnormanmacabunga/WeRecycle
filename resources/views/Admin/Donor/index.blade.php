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
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
              <h5 class="card-title">List of Donors</h5>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item"><a class="nav-link ">Filter by:</a></li>
                          <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/admin/donors') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">All</span></a> </li>
                          <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/admin/donors/?status=Activated') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Activated</span></a> </li>
                          <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/admin/donors/?status=Deactivated') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Deactivated</span></a> </li>
                        </ul>

                        <div class="table-responsive">
                          @if(count($donors) > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Age</th>
                                      <th>Address</th>
                                      <th>Barangay</th>
                                      <th>Cellphone Number</th>
                                      <th>Tellphone Number</th>
                                      <th>@sortablelink('created_at', 'Date Created')</th>
                                      <th>@sortablelink('updated_at', 'Date Updated')</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($donors as $donor)
                                    <tr>
                                      <td> {{$donor->firstname}} {{$donor->lastname}}</td>
                                      <td> {{$donor->age()}} </td>
                                      <td> {{$donor->street}}, {{$donor->city}} </td>
                                      <td> {{$donor->barangay}} </td>
                                      <td> {{$donor->contacts['cellNo']}} </td>
                                      <td> {{$donor->contacts['tellNo']}} </td>
                                      <td> {{date('F d, Y, h:i:sa', strtotime($donor->created_at))}} </td>
                                      <td> {{date('F d, Y, h:i:sa', strtotime($donor->updated_at))}} </td>
                                      <td> {{$donor->status}} </td>
                                      <td>
                                        <a href="/admin/donors/{{$donor->userID}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fas fa-edit"></i></a>
                                      </td>
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
                        {{$donors->links()}}
                    </div>
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
