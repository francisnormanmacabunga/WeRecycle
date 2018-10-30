<!DOCTYPE html>
<html dir="ltr" lang="en">
<body>
<div id="main-wrapper">
  @include('navbar.admin-navbar')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/managedonation') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Donation</span></a> </li>
          <li class="nav-item"> <a class="nav-link active" href="{{ url('/admin/managedonation') }}" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Shop</span></a> </li>
        </ul>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Shop Catalog</h5>
                        <div class="table-responsive">
                          @if(count($products2) > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Preview</th>
                                      <th>Price</th>
                                      <th>Description</th>
                                      <th>Category</th>
                                      <th>Date Created</th>
                                      <th>Date Updated</th>
                                      <th>Status</th>
                                      <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($products2 as $products)
                                    <tr>
                                      <td>{{$products->productname}}</td>
                                      <td><img src="{{ asset('images/' . $products->productimage) }}" width="200" height="200"></td>
                                      <td>{{$products->price}}</td>
                                      <td>{{$products->description}}</td>
                                      <td>{{$products->category}}</td>
                                      <td>{{date('F d, Y, h:i:sa', strtotime($products->created_at))}}</td>
                                      <td>{{date('F d, Y, h:i:sa', strtotime($products->updated_at))}}</td>
                                      <td>{{$products->status}}</td>
                                      <td><a href="/admin/catalog/{{$products->productsID}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fas fa-edit"></i></a>
                                      <a href="/admin/catalogimage/{{$products->productsID}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fas fa-image"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div align="center" style="color:red;">
                              <br>
                              <br>
                              <h5>No records found.</h5>
                            </div>
                            @endif
                        </div>
                        {{$products2->links()}}
                    </div>
                </div>
            </div>
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
