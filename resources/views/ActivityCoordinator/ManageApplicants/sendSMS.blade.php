<!DOCTYPE html>
<html dir="ltr" lang="en">
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
        <div class="row justify-content-center">
          <form class="form-horizontal" method="POST" action="{{ action('ActivityCoordinator\TwilioController@sendMessageApplicant') }}">
            {{ csrf_field() }}
                  <!-- Card -->
                  <div class="card">
                      <div class="card-body" style="height: 300px;">
                        <h4 class="card-title">Send Message to:</h4>
                                            <div class="card">
                                                <div class="card-body">

                                                  </div>
                                                    <div class="table-responsive">

                                                      <table class="table">
                                                          <thead class="thead-light">
                                                              <tr>
                                                                  <th scope="col">Name</th>
                                                                  <th scope="col">Email</th>
                                                                  <th scope="col">Mobile Number</th>
                                                                  <th scope="col">Status</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody class="customtable">
                                                              <tr>
                                                                  <th>
                                                                    <label class="customcheckbox">
                                                                        <input type="hidden" name= "mobile" class="listCheckbox" value="{{$applicants->contacts['cellNo']}}" required/>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                  </th>
                                                                  <td>{{$applicants['firstname']}} {{$applicants['lastname']}}</td>
                                                                  <td>{{$applicants['email']}}</td>
                                                                  <td>{{$applicants->contacts['cellNo']}}</td>
                                                                  <td>{{$applicants['status']}}</td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                    </div>
                                            </div>
                      </div>
                      <div class="card-body border-top">
                          <div class="row">
                              <div class="col-9">
                                <div class="form-group">
                                  <div class="input-field m-t-0 m-b-0">
                                      <textarea id="textarea1" class="form-control border-0" name="message" placeholder="Place your message here!" required></textarea>
                                  </div>
                                  </div>
                              </div>
                              <div class="col-3">
                                  <button class="btn-circle btn-lg btn-cyan float-right text-white" type="submit" data-toggle="tooltip" data-placement="top" title="Send"><i class="fas fa-paper-plane"></i></button>
                              </div>
                          </div>
                      </div>
                  </div>
            </form>
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
