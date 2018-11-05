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
                    {!! Form::open(['action' => ['Admin\CatalogImageController@update', $products['productsID']], 'method' => 'POST', 'files' => true, 'enctype' =>"multipart/form-data" ]) !!}
                    <div class="card">
                        <div class="card-body">
                            <div align="center">
                                <h4 class="page-title">Update Item: ID {{$products['productsID']}}</h4>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Image <label style="color:red;">*</label> </label>
                                        <input class="fileinput fileinput-new form-control {{ $errors->has('productimage') ? ' is-invalid' : '' }}" type="file" name="productimage" id="fileToUpload">
                                        @if ($errors->has('productimage'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('productimage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Image Preview</label>
                                        <img src="{{ asset('images/' . $products->productimage) }}" width="200" height="200">
                                    </div>
                                </div>
                                <hr>
                                <input value="Save" type="button" class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#Modal2" />
                                <a class="btn btn-danger btn-block btn-lg" href="{{ url()->previous() }}">Back</a>
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
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <footer class="footer text-center">
                Copyright &copy; 2018 WeRecycle
            </footer>
        </div>
    </div>
    </div>
    @include('navbar.footer')
</body>

</html>
