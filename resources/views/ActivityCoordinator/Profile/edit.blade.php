<!DOCTYPE html>
<html dir="ltr" lang="en">
<body>
<div id="main-wrapper">
  @include('navbar.ac-navbar')
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
                      <div class="container col-md-6 center-align">
                        <div class="card-deck mb-3 ">
                          <div class="card mb-4 shadow-sm">
                            <div class="card-header text-center">
                                {!! Form::open(['action' => ['ActivityCoordinator\ActivityCoordinatorsController@update', $donors['userID']], 'method' => 'POST' ]) !!}
                              <h4 class="my-0 font-weight-normal">Update your profile, {{$donors->firstname}}!</h4>
                            </div>
                            <div class="card-body text-center">
                              <h1 class="card-title pricing-card-title text-center">{{$donors->firstname}} {{$donors->lastname}}</h1>
                              <hr style="margin:5px 0 5px 0;"><br>
                              <dl class="row">
                                <dt class="col-sm-6">First Name:</dt>
                                <dd class="col-sm-5">{{Form::text('firstname', $donors->firstname,['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}</dd>
                                <dt class="col-sm-6">Last Name:</dt>
                                <dd class="col-sm-5">{{Form::text('lastname', $donors->lastname,['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}</dd>
                                <dt class="col-sm-6">Username:</dt>
                                <dd class="col-sm-5">{{Form::text('username', $donors->username,['class' => 'form-control'])}}</dd>
                                <dt class="col-sm-6">Email:</dt>
                                <dd class="col-sm-5">{{Form::email('email', $donors->email,['class' => 'form-control'])}}</dd>
                                <dt class="col-sm-6">Birthdate:</dt>
                                <dd class="col-sm-5">{{Form::date('birthdate', $donors->birthdate,['class' => 'form-control'])}}</dd>
                                <dt class="col-sm-6">Street:</dt>
                                <dd class="col-sm-5">{{Form::text('street', $donors->street,['class' => 'form-control'])}}</dd>
                                <dt class="col-sm-6">City:</dt>
                                <dd class="col-sm-5">{{Form::text('city', $donors->city,['class' => 'form-control'])}}</dd>
                                <dt class="col-sm-6">Barangay:</dt>
                                <dd class="col-sm-5">{{Form::text('barangay', $donors->barangay,['class' => 'form-control'])}}</dd>
                                <dt class="col-sm-6">Cellphone:</dt>
                                <dd class="col-sm-5">{{Form::text('cellNo', $donors->contacts->cellNo,['class' => 'form-control', 'placeholder' => '+63XXXXXXXXXX'])}}</dd>
                                <dt class="col-sm-6">Telephone:</dt>
                                <dd class="col-sm-5">{{Form::number('tellNo', $donors->contacts->tellNo,['class' => 'form-control'])}}</dd>
                              </dl>
                              <hr style="margin:5px 0 5px 0;"><br>
                              <input type="button" value="Save Changes" class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#Modal2" />
                              <a class="btn btn-lg btn-block btn-danger" href="{{ url('/activitycoordinator/activity_coordinators') }}" role="button">Back </a>
                              <!-- Modal -->
                                <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Alert Model</h5>
                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to save changes?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              {{Form::hidden('_method','PUT')}}
                              {!! Form::close() !!}
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
