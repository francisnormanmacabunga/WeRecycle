<!DOCTYPE html>
<html dir="ltr" lang="en">
<body>
<div id="main-wrapper">
  @include('navbar.pd-navbar')
  <div class="page-wrapper">
                  <!-- Card -->
                  <div class="card">
                    <div class="page-breadcrumb">
                          <div class="row">
                              <div class="col-12 d-flex no-block align-items-center">
                                  <h4 class="page-title"></h4>
                              </div>
                          </div>
                      </div>
                      <div class="container col-md-5 center-align">
                        <div class="card-deck mb-3 ">
                          <div class="card mb-4 shadow-sm">
                            <div class="card-header text-center">
                              <h4 class="card-title"></h4>
                              <h4 class="my-0 font-weight-normal">Welcome, {{$donors->firstname}}!</h4>
                            </div>
                            <div class="card-body text-center">
                              <h1 class="card-title pricing-card-title text-center">{{$donors->firstname}} {{$donors->lastname}}</h1>
                              <hr style="margin:5px 0 5px 0;"><br>
                              <dl class="row ">
                                <dt class="col-sm-6">Username:</dt>
                                <dd class="col-sm-4">{{$donors->username}}</dd>
                                <dt class="col-sm-6">Email:</dt>
                                <dd class="col-sm-4">{{$donors->email}}</dd>
                                <dt class="col-sm-6">Birthdate:</dt>
                                <dd class="col-sm-4">{{$donors->birthdate}}</dd>
                                <dt class="col-sm-6">Address:</dt>
                                <dd class="col-sm-4">{{$donors->street}}, {{$donors->city}}</dd>
                                <dt class="col-sm-6">Barangay:</dt>
                                <dd class="col-sm-4">{{$donors->barangay}}</dd>
                                <dt class="col-sm-6">Cellphone:</dt>
                                <dd class="col-sm-4">{{$donors->contacts->cellNo}}</dd>
                                <dt class="col-sm-6">Telephone:</dt>
                                <dd class="col-sm-4">{{$donors->contacts->tellNo}}</dd>
                                <dt class="col-sm-6">Password:</dt>
                                <dd class="col-sm-4">
                                <a href="/programdirector/PD_password/{{$donors->userID}}/edit"><button class="btn btn-outline-info">Update</button></a>
                                </dd>
                              </dl>
                              <hr style="margin:5px 0 5px 0;"><br>
                              <form action="/programdirector/program_directors/{{$donors->userID}}/edit">
                                  <input type="submit" value="Edit Profile" class="btn btn-info btn-block btn-lg" />
                              </form>
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
