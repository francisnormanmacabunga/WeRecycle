<!DOCTYPE html>
<html dir="ltr" lang="en">
<body>
<div id="main-wrapper">
  @include('navbar.ac-navbar')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/activitycoordinator/applicants') }}">Applicants</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
          {!! Form::open(['action' => ['ActivityCoordinator\ApplicantsController@update', $applicants['volunteerID']], 'method' => 'POST' ]) !!}
                  <!-- Card -->
                  <div class="card">
                      <div class="card-body" style="height: 300px;">
                        <h4 class="card-title">Update Applicant</h4>
                                            <div class="card">
                                                <div class="card-body">

                                                  </div>
                                                    <div class="table-responsive">
                                                      <table class="table">
                                                          <thead class="thead-light">
                                                              <tr>
                                                                  <th scope="col">Name</th>
                                                                  <th scope="col">Status</th>
                                                                  <th scope="col">Action</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody class="customtable">
                                                              <tr>
                                                                <td>{{$applicants['firstname']}} {{$applicants['lastname']}}</td>
                                                                <td>{{$applicants['status']}}</td>
                                                                <td>
                                                                  <select class="select2 form-control custom-select" name="status" style="width: 100%; height:36px;">
                                                                    <option>Choose status</option>
                                                                        <option value="Activated">Activated</option>
                                                                        <option value="Deactivated">Deactivated</option>
                                                                  </select>
                                                                </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                      {{Form::hidden('_method','PUT')}}
                                                      <input type="button" value="Save" class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#Modal2" />
                                                    </div>
                                            </div>
                      </div>
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
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
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
