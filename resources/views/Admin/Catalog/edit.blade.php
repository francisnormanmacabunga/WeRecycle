<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body>
    <div id="main-wrapper">
        @include('navbar.admin-navbar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/managedonation') }}">Catalog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    {!! Form::open(['action' => ['Admin\CatalogController@update', $products['productsID']], 'method' => 'POST', 'files' => true, 'enctype' =>"multipart/form-data" ]) !!}
                    <div class="card">
                        <div class="card-body">
                            <div align="center">
                                <h4 class="page-title">Update Item: ID #{{$products['productsID']}}</h4>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Item Name</label>
                                        {{Form::text('productname', $products['productname'],['class' => 'form-control'.($errors->has('productname') ? ' is-invalid' : ''), 'required' => 'required', 'onkeypress' => 'return !validNo(this,event)'])}}
                                        @if ($errors->has('productname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('productname') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Status</label>
                                        <select class="select2 form-control custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" style="width: 100%; height:36px;">
                                            <optgroup label="{{$products['status']}}">
                                                <option value="Activated">Activated</option>
                                                <option value="Deactivated">Deactivated</option>
                                            </optgroup>
                                        </select>
                                        @if ($errors->has('status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Description</label>
                                        {{Form::textarea('description', $products['description'],['class' => 'form-control'.($errors->has('description') ? ' is-invalid' : ''), 'required' => 'required', 'rows' => 3])}}
                                        @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                              </br>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Price</label>
                                        {{Form::number('price', $products['price'],[ 'min' => '0', 'class' => 'form-control'.($errors->has('price') ? ' is-invalid' : ''), 'required' => 'required'])}}
                                        @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                {{Form::hidden('_method','PUT')}}
                                <hr>
                                <input value="Save" type="button" class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#Modal2" />
                                <br>
                                <a href="{{ url('/admin/managedonation') }}"> <button class="btn btn-danger btn-block btn-lg"> Back </button> </a>
                            </div>
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
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{Form::hidden('_method','PUT')}}
                </div>
                {!! Form::close() !!}
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
    </div>
    @include('navbar.footer')
</body>

</html>
