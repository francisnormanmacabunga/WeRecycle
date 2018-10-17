<!DOCTYPE html>
<html dir="ltr" lang="en">
<body>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
      @include('navbar.pd')
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
                          <a href="/programdirector/messageOrders">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-message-bulleted"></i></h1>
                                <h6 class="text-white">Message History</h6>
                            </div>
                          </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-xlg-3">
                        <div class="card card-hover">
                          <a href="/programdirector/donationhistory">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-layers"></i></h1>
                                <h6 class="text-white">Donation History</h6>
                            </div>
                          </a>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                     <!-- Column -->
                    <div class="col-md-6 col-xlg-3">
                        <div class="card card-hover">
                          <a href="/programdirector/requests">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                <h6 class="text-white">Transactions</h6>
                            </div>
                          </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-xlg-3">
                        <div class="card card-hover">
                          <a href="/programdirector/feedback">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-message"></i></h1>
                                <h6 class="text-white">Feedback</h6>
                            </div>
                          </a>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                        </div>
                    </div>
                </div>
                <footer class="footer text-center">
                    All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
                </footer>
            </div>
        </div>
    </div>
  @include('navbar.footer')
</body>
</html>
