<!DOCTYPE html>
  <html dir="ltr" lang="en">
  <body>
  <div id="main-wrapper">
    @include('navbar.admin-navbar')
          <div class="page-wrapper">
          <div class="page-breadcrumb">
              <div class="row">
                  <div class="col-12 d-flex no-block align-items-center">
                      <h4 class="page-title">Create Employee Account</h4>
                  </div>
              </div>
          </div>
              <div class="container-fluid">
                  <!-- ============================================================== -->
                  <!-- Start Page Content -->
                  <!-- ============================================================== -->
                  @include('inc.messages')
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" href="{{ url('/admin/createAC') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Activity Coordinator</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/createPD') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Program Director</span></a> </li>
                  </ul>
                      {!! Form::open(['action' => 'Admin\ActivityCoordinatorController@store', 'method' => 'POST' ]) !!}
                  <div class="row">
                      <div class="col-md-6">
                          <div class="card">
                              <div class="card-body">
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>First Name</label>
                                        <input type="text" name="firstname" class="form-control" id="fname" onkeypress="return !validNo(this,event)" placeholder="First Name Here" required>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Last Name</label>
                                        <input type="text" name="lastname" class="form-control" id="lname" onkeypress="return !validNo(this,event)" placeholder="Last Name Here" required>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Email</label>
                                        <input type="email" name="email" class="form-control" id="email1" placeholder="you@example.com" required>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Cellphone Number</label>
                                        <input type="text" name="cellNo" class="form-control" id="cono1" placeholder="+63XXXXXXXXXX" required>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Telephone Number</label>
                                        <input type="text" name="tellNo" class="form-control" id="cono1" placeholder="xxx-xxxx" required>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Birthdate</label>
                                        <input type="date" name="birthdate" class="form-control" required>
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="card">
                              <div class="card-body">
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>City</label>
                                        <input type="text" name="city" class="form-control" id="email1" onkeypress="return !validNo(this,event)" placeholder="City" required>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Street</label>
                                        <input type="text" name="street" class="form-control" id="email1" placeholder="Street" required>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Barangay</label>
                                        <input type="number" name="barangay" class="form-control" id="email1" placeholder="Barangay" required>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Zip</label>
                                        <input type="number" name="zip" class="form-control" placeholder="Zip" required>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="@username" required>
                                    </div>
                                </div>
                                <br />
                                <div style="float:right;">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-outline-success">Register</button>
                                    </div>
                                </div>
                                {{Form::hidden('usertypeID','3', ['class' => 'form-control'])}}
                                {{Form::hidden('status','Activated', ['class' => 'form-control'])}}
                          </div>
                      </div>
                  </div>
                  {!! Form::close() !!}
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
