<!DOCTYPE html>
  <html dir="ltr" lang="en">
  <body>
  <div id="main-wrapper">
    @include('navbar.admin-navbar')
          <div class="page-wrapper">
          <div class="page-breadcrumb">
              <div class="row">
                  <div class="col-12 d-flex no-block align-items-center">
                      <h4 class="page-title">Update Item: Product ID {{$products['productsID']}}</h4>
                      <div class="ml-auto text-right">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ url('/admin/manageshop') }}">Catalog</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Edit Image</li>
                          </ol>
                      </nav>
                    </div>
                  </div>
              </div>
          </div>
              <div class="container-fluid">
                  <!-- ============================================================== -->
                  <!-- Start Page Content -->
                  <!-- ============================================================== -->
                  @include('inc.messages')
                  {!! Form::open(['action' => ['Admin\CatalogImageController@updateDonation', $products['productsID']], 'method' => 'POST', 'files' => true, 'enctype' =>"multipart/form-data" ]) !!}
                  <div class="row">
                      <div class="col-md-6">
                          <div class="card">
                              <div class="card-body">
                                <div class="form-group-row">
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Image</label>
                                      <div class="custom-file">
                                            <input type="file" name="productimage" class="custom-file-input form-control">

                                            <label class="custom-file-label" for="validatedCustomFile">Choose image...</label>
                                        </div>
                                        <br>
                                        <br>
                                        <label>Image Preview</label>
                                        <div class="custom-file">
                                        <img src="{{ asset('images/' . $products->productimage) }}" width="200" height="200">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div style="float:right;">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-outline-primary"><a href="{{ url('/admin/managedonation') }}">Go Back</a></button>
                                        <button type="submit" class="btn btn-outline-success">Save</button>
                                    </div>
                                </div>
                              </div>
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
