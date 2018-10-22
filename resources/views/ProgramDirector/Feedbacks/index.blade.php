<!DOCTYPE html>
<html dir="ltr" lang="en">
<body>
<div id="main-wrapper">
  @include('navbar.pd-navbar')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a class="nav-link " href="/programdirector/requests" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Requests</span></a> </li>
          <li class="nav-item"> <a class="nav-link active" href="/programdirector/orders" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Orders</span></a> </li>
        </ul>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Feedback</h5>
                        <div class="table-responsive">
                          @if(count($feedbacks) > 0)
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                <th>Username</th>
                                <th>Feedback</th>
                                <th>Rating</th>
                                <th>Date Applied</th>
                              </tr>
                              @foreach ($feedbacks as $feedback)
                                <tr>
                                  <td>{{$feedback->username}}</td>
                                  <td>{{$feedback->feedback}}</td>
                                  <td>{{$feedback->rating}}</td>
                                  <td>{{date('F d, Y, h:i:sa', strtotime($feedback->created_at))}}</td>
                                </tr>
                              @endforeach
                            </table>
                            @else
                            <div align="center" style="color:red;">
                              <h4 style="font-family:serif;">No feedbacks found.</h4>
                            </div>
                            @endif
                        </div>
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
