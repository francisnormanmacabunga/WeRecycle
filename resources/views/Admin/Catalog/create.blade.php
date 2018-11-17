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
                        <h4 class="page-title">Create Catalog</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                {{ Form::open(array('action' => 'Admin\CatalogController@store', 'method' => 'post', 'files' => true, 'enctype' =>"multipart/form-data")) }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Item Name <label style="color:red;">*</label> </label>
                                        <input type="text" name="productname" class="form-control {{ $errors->has('productname') ? ' is-invalid' : '' }}" id="fname" onkeypress="return !validNo(this,event)" placeholder="Product Name" required>
                                        @if ($errors->has('productname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('productname') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                              </br>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Product Category <label style="color:red;">*</label> </label>
                                        <select class="select2 form-control custom-select {{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" style="width: 100%; height:36px;" required>
                                            <option label="" disabled selected>Choose category</option>
                                            <optgroup label="Donation">
                                                <option value="Traditional">Traditional</option>
                                                <option value="Non-Traditional">Non-Traditional</option>
                                                <option value="Material">Material</option>
                                            </optgroup>
                                            <optgroup label="Shop">
                                                <option value="Fertilizer">Fertilizer</option>
                                            </optgroup>
                                        </select>
                                        @if ($errors->has('category'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                              </br>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Item Type <label style="color:red;">*</label> </label>
                                        <select class="select2 form-control custom-select {{ $errors->has('productstypeID') ? ' is-invalid' : '' }}" name="productstypeID" style="width: 100%; height:36px;" required>
                                            <option label="" disabled selected>Choose Type</option>
                                            <option value="1">Donation</option>
                                            <option value="2">Shop</option>
                                        </select>
                                        @if ($errors->has('productstypeID'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('productstypeID') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                  </br>
                                </div>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Description <label style="color:red;">*</label> </label>
                                        <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="editor"></textarea>
                                        @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
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
                                        <label>Price</label>
                                        <input type="number" name="price" min="0" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="Price">
                                        @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                        @endif
                                        <p style="color:red;">* For shop items only</p>
                                    </div>
                                </div>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                        <label>Image <label style="color:red;">*</label> </label>
                                        <div class="custom-file">
                                            <input class="fileinput fileinput-new form-control {{ $errors->has('productimage') ? ' is-invalid' : '' }}" type="file" name="productimage" id="fileToUpload" required>
                                            @if ($errors->has('productimage'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('productimage') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <br />
                                <br />
                                <div style="float:right;">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br />
                                    <button type="submit" class="btn btn-outline-success">Save</button>
                                </div>
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <footer class="footer text-center">
                Copyright &copy; 2018 WeRecycle™
            </footer>
        </div>
    </div>
    @include('navbar.footer')
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    </script>
</body>

</html>
