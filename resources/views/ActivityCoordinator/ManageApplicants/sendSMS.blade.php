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
          <div class="page-breadcrumb">
              <div class="row">
                  <div class="col-12 d-flex no-block align-items-center">
                          <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{ url('/activitycoordinator/applicants') }}">Applicants</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Send SMS</li>
                              </ol>
                          </nav>
                  </div>
              </div>
          </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <form class="form-horizontal" method="POST" action="{{ action('ActivityCoordinator\TwilioController@sendMessageApplicant') }}">
                        {{ csrf_field() }}
                        <!-- Card -->
                        <div class="card">
                            <div class="card-body" style="height: 300px;">
                                <h4 class="card-title">
                                    <center> Send Message </center>
                                </h4>
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
                                                </tr>
                                            </thead>
                                            <tbody class="customtable">
                                                <tr>
                                                    <input type="hidden" name="mobile" class="listCheckbox" value="{{$applicants->contacts['cellNo']}}" required />
                                                    <td>{{$applicants['firstname']}} {{$applicants['lastname']}}</td>
                                                    <td>{{$applicants['email']}}</td>
                                                    <td>{{$applicants->contacts['cellNo']}}</td>
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
                                                <textarea id="textarea1" class="form-control border-0" name="message" placeholder="Place your message here!"></textarea>
                                            </div>
                                            <div>
                                              <select class="select2 form-control custom-select" name="message1" style="width: 100%; height:36px;">
                                                    <optgroup label="Select Message">
                                                      <option value="You're Accepted.">Accepted</option>
                                                      <option value="Sorry your application has been denied because there are enough volunteers for this month, try again next month. Thank you for applying! ">
                                                        Denied</option>
                                              </select>
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
                Copyright &copy; 2018 WeRecycle™
            </footer>
        </div>
    </div>
    @include('navbar.footer')
</body>

</html>
