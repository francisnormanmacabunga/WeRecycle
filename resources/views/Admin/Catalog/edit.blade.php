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
                              <li class="breadcrumb-item active" aria-current="page">Edit</li>
                          </ol>
                      </nav>
                    </div>
                  </div>
              </div>
          </div>
              <div class="container-fluid">
                <div class="row justify-content-center">
                  <!-- ============================================================== -->
                  <!-- Start Page Content -->
                  <!-- ============================================================== -->
                  @include('inc.messages')
                  {!! Form::open(['action' => ['Admin\CatalogController@update', $products['productsID']], 'method' => 'POST', 'files' => true, 'enctype' =>"multipart/form-data" ]) !!}
                          <div class="card">
                              <div class="card-body">
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Item Name</label>
                                        {{Form::text('productname', $products['productname'],['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Status</label>
                                        <select class="select2 form-control custom-select" name="status" style="width: 100%; height:36px;">
                                          <optgroup label="{{$products['status']}}">
                                              <option value="Activated">Activated</option>
                                              <option value="Deactivated">Deactivated</option>
                                            </optgroup>
                                      </select>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Description</label>
                                        {{Form::textarea('description', $products['description'],['class' => 'form-control', 'rows' => 3])}}
                                    </div>
                                </div>
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Price</label>
                                        {{Form::number('price', $products['price'],['class' => 'form-control'])}}
                                    </div>
                                </div>
                                <br />
                                <div class="form-group-row">
                                    <div class="col-sm-9">
                                      <label>Image</label>
                                      <div class="custom-file">
                                            <input type="file" name="productimage" class="custom-file-input form-control">
                                            <label class="custom-file-label" for="validatedCustomFile">Choose image...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                {{Form::hidden('_method','PUT')}}
                                <div style="float:right;">
                                    <div class="card-body">
                                        <input value="Save" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#Modal2" />
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
                      </div>
                      {{Form::hidden('_method','PUT')}}
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
