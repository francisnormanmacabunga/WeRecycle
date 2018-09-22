
@extends('layouts.backend')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
          <a class="navbar-brand" href="{{ url('/admin') }}">
              {{ config('app.name', 'Laravel') }}
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">


                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Employee</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="/admin/createEmployee"> Create Employee Account </a>
                    <a class="dropdown-item" href="/admin/employees"> Manage Employee Account </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalog</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="/admin/createCatalog"> Create Catalog </a>
                    <a class="dropdown-item" href="/admin/catalog"> Manage Catalog </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Feedback</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="/admin/feedback"> Manage Feedback</a>
                  </div>
                </li>

              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
          <!--            <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li> -->
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->username }} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
      </div>
  </nav>

@section('content')


  <div class="row">
    <div class="col-md-12">
      <br/>
      <h2 align="center">Manage Catalog</h2>
      <br>
      <br>
      @if(count($products1) > 0)
      <table class="table table-bordered">
        @foreach ($products1 as $products)
          <tr>
          <th>Item Type</th>
          <th>Name</th>
          <th>Preview</th>
          <th>Price</th>
          <th>Description</th>
          <th>Date Created</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        <tr>
          <td>{{$products->productstype}}</td>
          <td>{{$products->productname}}</td>
          <td><img src="{{ asset('images/' . $products->productimage) }}"></td>
          <td>{{$products->price}}</td>
          <td>{{$products->description}}</td>
          <td>{{date('F d, Y, h:i:sa', strtotime($products->created_at))}}</td>
          <td>{{$products->status}}</td>
          <th><a class="btn btn-lg btn-block btn-primary" href="/admin/catalog/{{$products->productsID}}/edit" role="button">Update Status </a></th>
        </tr>
        @endforeach
      </table>
    @else
      <h3 style="color:red;" align="center">No records in donation catalog found.</h3>
    @endif
    </div>
  </div>



  <div class="row">
    <div class="col-md-12">
      <br/>
      <h2 align="center">Manage Catalog</h2>
      <br>
      <br>
      @if(count($products2) > 0)
      <table class="table table-bordered">
        @foreach ($products2 as $products)
          <tr>
          <th>Item Type</th>
          <th>Name</th>
          <th>Preview</th>
          <th>Price</th>
          <th>Description</th>
          <th>Date Created</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        <tr>
          <td>{{$products->productstype}}</td>
          <td>{{$products->productname}}</td>
          <td><img src="{{ asset('images/' . $products->productimage) }}"></td>
          <td>{{$products->price}}</td>
          <td>{{$products->description}}</td>
          <td>{{date('F d, Y, h:i:sa', strtotime($products->created_at))}}</td>
          <td>{{$products->status}}</td>
          <th><a class="btn btn-lg btn-block btn-primary" href="/admin/catalog/{{$products->productsID}}/edit" role="button">Update Status </a></th>
        </tr>
        @endforeach
      </table>
    @else
      <h3 style="color:red;" align="center">No records in donation catalog found.</h3>
    @endif
    </div>
  </div>



@endsection
