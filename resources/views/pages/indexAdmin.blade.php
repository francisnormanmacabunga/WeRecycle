<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
</head>
<body>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
      @include('navbar.admin')
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
          <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                        <h4 class="page-title">Hello, {{Auth::user()->firstname}}!</h4>
                    </div>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                          <a href="{{ url('/admin/donors') }}">
                            <div class="box text-center" style="background-color: #7D696C">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-edit"></i></h1>
                                <h6 class="text-white">Manage Donor</h6>
                            </div>
                          </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                          <a href="{{ url('/admin/createAC') }}">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-plus"></i></h1>
                                <h6 class="text-white">Create Employee</h6>
                            </div>
                          </a>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                          <a href="{{ url('/admin/employees') }}">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                                <h6 class="text-white">Manage Employee</h6>
                            </div>
                          </a>
                        </div>
                    </div>
                  </div>
                    <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                          <a href="{{ url('/admin/createCatalog') }}">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-table-large"></i></h1>
                                <h6 class="text-white">Create Catalog</h6>
                            </div>
                          </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                          <a href="{{ url('/admin/managedonation') }}">
                            <div class="box text-center" style="background-color: #008080">
                                <h1 class="font-light text-white"><i class="mdi mdi-table-edit"></i></h1>
                                <h6 class="text-white">Manage Catalog</h6>
                            </div>
                          </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                          <a href="{{ url('/admin/auditlogs') }}">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-book-open"></i></h1>
                                <h6 class="text-white">Audit Logs</h6>
                            </div>
                          </a>
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
