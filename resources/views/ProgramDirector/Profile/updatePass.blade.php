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
                <div class="container col-md-6 center-align">
                    <div class="card-deck mb-3 ">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header text-center">
                                {!! Form::open(['action' => ['ProgramDirector\ProgramDirectorsPasswordController@update', $donors['userID']], 'method' => 'POST' ]) !!}
                                <h4 class="my-0 font-weight-normal">Update your password, {{$donors->firstname}}!</h4>
                            </div>
                            <div class="card-body text-center">
                                <h1 class="card-title pricing-card-title text-center">{{$donors->firstname}} {{$donors->lastname}}</h1>
                                <hr style="margin:5px 0 5px 0;"><br>
                                <dl class="row">
                                    <dt class="col-sm-6">Update Password:</dt>
                                    <dd class="col-sm-5">{{Form::password('password', ['class' => 'form-control'.($errors->has('password') ? ' is-invalid' : '')])}}
                                      @if ($errors->has('password'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                      @endif
                                    </dd>
                                    <dt class="col-sm-6">Confirm Password:</dt>
                                    <dd class="col-sm-5">{{Form::password('password_confirmation', ['class' => 'form-control'.($errors->has('password_confirmation') ? ' is-invalid' : '')])}}
                                      @if ($errors->has('password_confirmation'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                                      </span>
                                      @endif
                                    </dd>
                                </dl>
                                <hr style="margin:5px 0 5px 0;"><br>
                                <input type="button" value="Save Changes" class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#Modal2" />
                                <a class="btn btn-lg btn-block btn-danger" href="{{ url('/programdirector/program_directors') }}" role="button">Back </a>
                                <!-- Modal -->
                                <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
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
