<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body>
    <div id="main-wrapper">
        @include('navbar.ac-navbar')
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
                        <h5 class="card-title">Manage Applicants</h5>
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link ">Filter by:</a></li>
                                    <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/activitycoordinator/applicants') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">All</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/activitycoordinator/applicants/?status=Applied') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Applied</span></a></li>
                                    <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/activitycoordinator/applicants/?status=Activated') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Activated</span></a></li>
                                    <li class="nav-item"> <a class="nav-link btn-outline-info" href="{{ url('/activitycoordinator/applicants/?status=Deactivated') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Deactivated</span></a></li>
                                </ul>
                                <br />
                                <div class="table-responsive">
                                    @if(count($applicants) > 0)
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Address</th>
                                                <th>Barangay</th>
                                                <th>Cellphone Number</th>
                                                <th>Telephone Number</th>
                                                <th>Date Applied</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($applicants as $applicant)
                                            <tr>
                                                <td>{{$applicant->firstname}} {{$applicant->lastname}}</td>
                                                <td>{{$applicant->age()}}</td>
                                                <td>{{$applicant->street}}, {{$applicant->city}}</td>
                                                <td>{{$applicant->barangay}}</td>
                                                <td>{{$applicant->cellNo}}</td>
                                                <td>{{$applicant->tellNo}}</td>
                                                <td>{{date('F d, Y, h:i:sa', strtotime($applicant->created_at))}}</td>
                                                <td>{{$applicant->status}}</td>
                                                <td>
                                                    <a href="/activitycoordinator/applicants/{{$applicant->volunteerID}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fas fa-edit"></i></a>
                                                    <a href="/activitycoordinator/sendSMS/applicantID={{$applicant->volunteerID}}" data-toggle="tooltip" data-placement="top" title="Message"><i class="fas fas fa-envelope"></i></a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                Copyright &copy; 2018 WeRecycle™
            </footer>
        </div>
    </div>
    @include('navbar.footer')
</body>

</html>
