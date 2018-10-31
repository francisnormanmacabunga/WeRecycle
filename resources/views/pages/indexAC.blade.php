<!DOCTYPE html>
<html dir="ltr" lang="en">
<body>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
      @include('navbar.ac')
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
                    <div class="col-md-6 col-xlg-3">
                        <div class="card card-hover">

                          <a href="{{ url('/activitycoordinator/applicants') }}">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                                <h6 class="text-white">View Applicant</h6>
                            </div>
                          </a>
                        </div>
                    </div>
                     <!-- Column -->
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
