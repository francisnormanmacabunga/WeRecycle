<!DOCTYPE html>
  <html dir="ltr" lang="en">
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
                  @include('inc.messages')
                  {{ Form::open(array('action' => 'Admin\CatalogController@store', 'method' => 'post', 'files' => true, 'enctype' =>"multipart/form-data")) }}
                  <div class="row">
                      <div class="col-md-6">
                          <div class="card">
                              <div class="card-body">
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Item Name</label>
                                        <input type="text" name="productname" class="form-control" id="fname" onkeypress="return !validNo(this,event)" placeholder="Product Name" required>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Category</label>
                                      <select class="select2 form-control custom-select" name="category" style="width: 100%; height:36px;">
                                        <option label="Choose category"></option>
                                            <option value="Traditional">Traditional</option>
                                            <option value="Non-Traditional">Non-Traditional</option>
                                            <option value="Material">Material</option>
                                    </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Item Type</label>
                                        <select class="select2 form-control custom-select" name="productstypeID" style="width: 100%; height:36px;">
                                          <option label="Choose type"></option>
                                              <option value="1">Donation</option>
                                              <option value="2">Shop</option>
                                      </select>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Description</label>
                                        <textarea class="form-control" name="description"></textarea>
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
                                        <input type="number" name="price" class="form-control" placeholder="Price">
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Image</label>
                                      <div class="custom-file">
                                            <input type="file" name="productimage" class="custom-file-input form-control" required>
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div style="float:right;">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-outline-success">Save</button>
                                    </div>
                                </div>
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
