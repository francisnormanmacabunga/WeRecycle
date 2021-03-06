<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body>
    <div id="main-wrapper">
        @include('navbar.pd-navbar')
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/programdirector/requests') }}">Requests</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    {!! Form::open(['action' => ['ProgramDirector\RequestController@update', $request['transid']], 'method' => 'POST' ]) !!}
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body" style="height: 380px;">
                            <h4 class="card-title" align="center">Update Transaction</h4>
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
                                                <th scope="col">Volunteer</th>
                                            </tr>
                                        </thead>
                                        <tbody class="customtable">
                                            <tr>
                                                <td>{{$request->donor->firstname}} {{$request->donor->lastname}}</td>
                                                <td>{{$request['status']}}</td>
                                                <td>
                                                    <select class="select2 form-control custom-select" name="status" style="width: 100%; height:36px;">
                                                        <optgroup label="{{$request['status']}}">
                                                            <option value="Dispatched">Dispatched</option>
                                                            <option value="Accepted">Accepted</option>
                                                            <option value="Cancelled">Cancelled</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="select2 form-control custom-select" name="volunteer" style="width: 100%; height:36px;">
                                                        <optgroup label="{{$request->volunteer['firstname']}}">
                                                            @foreach($volunteer as $volunteers)
                                                            <option value="{{$volunteers->volunteerID}}">{{$volunteers->firstname}}</option>
                                                            @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    {{Form::hidden('_method','PUT')}}
                                    <hr>
                                    @if($request->status == 'Accepted' || $request->status == 'Cancelled')
                                <center>DISABLED</center>
                                <br>
                                <a href="{{ url('/programdirector/requests') }}"> <button class="btn btn-success btn-block btn-lg"> Back </button> </a>
                                    @else
                                    <input type="button" value="Save" class="btn btn-danger btn-block btn-lg" data-toggle="modal" data-target="#Modal2" />
                                    <br>
                                    <a href="{{ url('/programdirector/requests') }}" class="btn btn-success btn-block btn-lg">Back</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Save changes</h5>
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
