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
                                        <p style="color:red;">*required</p>
                                    </div>
                                </div>
                                <div class="form-group-row">
                                   <div class="col-sm-9">
                                     <label>Product Category</label>
                                     <select class="select2 form-control custom-select" name="category" style="width: 100%; height:36px;" required>
                                       <option label="Choose category"></option>
                                           <optgroup label="Donation">
                                           <option value="Traditional">Traditional</option>
                                           <option value="Non-Traditional">Non-Traditional</option>
                                           <option value="Material">Material</option>
                                           </optgroup>
                                           <optgroup label="Shop">
                                           <option value="Fertilizer">Fertilizer</option>
                                           </optgroup>

                                   </select>
                                   <p style="color:red;">*required</p>
                                    </div>
                                </div>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Item Type</label>
                                        <select class="select2 form-control custom-select" name="productstypeID" style="width: 100%; height:36px;" required>
                                          <option label="Choose type"></option>
                                              <option value="1">Donation</option>
                                              <option value="2">Shop</option>
                                      </select>
                                      <p style="color:red;">*required</p>
                                    </div>
                                </div>
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
                                        <input type="number" name="price" min="0" class="form-control" placeholder="Price">
                                        <p style="color:red;">*Applicable for shop products only.</p>
                                    </div>
                                </div>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Image</label>
                                      <div class="custom-file">
                                        <input class="fileinput fileinput-new" type="file" name="productimage" id="fileToUpload" required>
                                      </div>
                                      <p style="color:red;">*required</p>
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
        Copyright &copy; 2018 WeRecycle
      </footer>
    </div>
  </div>
  @include('navbar.footer')
    </body>
    </html>
