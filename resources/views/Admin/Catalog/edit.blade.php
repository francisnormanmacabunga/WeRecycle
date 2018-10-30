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
                  <!-- ============================================================== -->
                  <!-- Start Page Content -->
                  <!-- ============================================================== -->
                  @include('inc.messages')
                  {!! Form::open(['action' => ['Admin\CatalogController@update', $products['productsID']], 'method' => 'POST', 'files' => true, 'enctype' =>"multipart/form-data" ]) !!}
                  <div class="row">
                      <div class="col-md-6">
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
                              <div style="float:right;">
                                  <div class="card-body">
                                      <button type="submit" class="btn btn-outline-success">Save</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      {{Form::hidden('_method','PUT')}}
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
