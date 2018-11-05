<!DOCTYPE html>
<html dir="ltr" lang="en">
      @include('navbar.donor')
      <head>
          <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
          <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
          <link rel="stylesheet" type="text/css" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}">
          <!-- Custom CSS -->
          <link href="{{ asset('assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
      </head>
<body>
  <!-- Title page -->
  <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('donor-design/images/profile.jpg')}});">
    <h2 class="ltext-105 cl0 txt-center">
      User Profile
    </h2>
  </section>
    <div id="main-wrapper">
            <!-- Card -->
            <div class="card">
              <div class="container">
              <div class="page-breadcrumb">
                 <div class="row">
                     <div class="col-12 d-flex no-block align-items-center">
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="{{ url('/donor') }}">Home</a></li>
                                     <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                 </ol>
                             </nav>
                     </div>
                 </div>
             </div>
           </div>
                <div class="container col-md-6 center-align">
                    <div class="card-deck mb-3 ">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header text-center" s>
                                <h4 class="my-0 font-weight-normal">User profile</h4>
                            </div>
                            <div class="card-body text-center">
                                <h1 class="card-title pricing-card-title text-center">{{$donors->firstname}} {{$donors->lastname}}</h1>
                                <hr style="margin:5px 0 5px 0;"><br>
                                <dl class="row">
                                  <dt class="col-sm-6">Username:</dt>
                                  <dd class="col-sm-4">{{$donors->username}}</dd>
                                  <dt class="col-sm-6">Email:</dt>
                                  <dd class="col-sm-4">{{$donors->email}}</dd>
                                  <dt class="col-sm-6">Birthdate:</dt>
                                  <dd class="col-sm-4">{{$donors->birthdate}}</dd>
                                  <dt class="col-sm-6">Address:</dt>
                                  <dd class="col-sm-4">{{$donors->street}}, {{$donors->city}}</dd>
                                  <dt class="col-sm-6">Barangay:</dt>
                                  <dd class="col-sm-4">{{$donors->barangay}}</dd>
                                  <dt class="col-sm-6">Cellphone:</dt>
                                  <dd class="col-sm-4">{{$donors->contacts->cellNo}}</dd>
                                  <dt class="col-sm-6">Telephone:</dt>
                                  <dd class="col-sm-4">{{$donors->contacts->tellNo}}</dd>
                                  <dt class="col-sm-6">Password:</dt>
                                  <dt class="col-sm-4">
                                    <a href="/donor/donorPassword/{{$donors->userID}}/edit"><button class="btn btn-outline-info">Update</button></a>
                                  </dt>
                                </dl>
                                <hr style="margin:5px 0 5px 0;"><br />
                                <a class="btn btn-info btn-block btn-lg" href="/donor/donors/{{$donors->userID}}/edit" role="button">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @include('navbar.donor-footer')
    @include('navbar.footer')
</body>

</html>
