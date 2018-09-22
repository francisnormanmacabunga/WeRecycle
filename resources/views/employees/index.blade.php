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
      <h3 align="center">List of Employees</h3>
      <br>
      <br>
      @if(count($employee) > 0)
      <table class="table table-bordered">
        <tr>
          <th>@sortablelink('usertypeID', 'User Type')</th>
          <th>Name</th>
          <th>Age</th>
          <th>Address</th>
          <th>Barangay</th>
          <th>Cellphone Number</th>
          <th>Telephone Number</th>
          <th>@sortablelink('created_at', 'Date Applied')</th>
          <th>@sortablelink('status', 'Status')</th>
          <th>Action</th>
        </tr>
        @foreach ($employee as $employees)
          <tr>
            <td>{{$employees->usertype}}</td>
            <td>{{$employees->firstname}} {{$employees->lastname}}</td>
            <td>{{$employees->age()}}</td>
            <td>{{$employees->street}}, {{$employees->city}}</td>
            <td>{{$employees->barangay}}</td>
            <td>{{$employees->cellNo}}</td>
            <td>{{$employees->tellNo}}</td>
            <td>{{date('F d, Y, h:i:sa', strtotime($employees->created_at))}}</td>
            <td>{{$employees->status}}</td>
            <td><a href="/admin/employees/{{$employees->userID}}/edit">Update Status</a?</td>
          </tr>
        @endforeach
      </table>
    @else
      <h3 style="color:red;" align="center">No records found.</h3>
    @endif
      {{$employee->links()}}
    </div>
  </div>

@endsection
