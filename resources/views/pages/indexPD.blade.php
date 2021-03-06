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
                          <a href="{{ url('/programdirector/messageOrders') }}">
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

                          <a href="{{ url('/programdirector/donationhistory') }}">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-note-multiple"></i></h1>
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

                          <a href="{{ url('/programdirector/requests') }}">
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

                          <a href="{{ url('/programdirector/feedback') }}">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-message"></i></h1>
                                <h6 class="text-white">Feedback</h6>
                            </div>
                          </a>
                        </div>
                    </div>
                    <!-- Column -->
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
