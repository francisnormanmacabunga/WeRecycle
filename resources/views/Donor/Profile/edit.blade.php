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
      Edit Profile
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
                                     <li class="breadcrumb-item"><a href="{{ url('/donor/donors') }}">Profile</a></li>
                                     <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                 </ol>
                             </nav>
                     </div>
                 </div>
             </div>
           </div>
                <div class="container col-md-6 center-align">
                    <div class="card-deck mb-3 ">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header text-center">
                                {!! Form::open(['action' => ['Donor\DonorsController@update', $donors['userID']], 'method' => 'POST' ]) !!}
                                <h4 class="my-0 font-weight-normal">Update your profile, {{$donors->firstname}}!</h4>
                            </div>
                            <div class="card-body text-center">
                                <h1 class="card-title pricing-card-title text-center">{{$donors->firstname}} {{$donors->lastname}}</h1>
                                <hr style="margin:5px 0 5px 0;"><br>
                                <dl class="row">
                                  <dt class="col-sm-6">First Name:</dt>
                                  <dd class="col-sm-5">{{Form::text('firstname', $donors->firstname,['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}</dd>
                                  <dt class="col-sm-6">Last Name:</dt>
                                  <dd class="col-sm-5">{{Form::text('lastname', $donors->lastname,['class' => 'form-control', 'onkeypress' => 'return !validNo(this,event)'])}}</dd>
                                  <dt class="col-sm-6">Username:</dt>
                                  <dd class="col-sm-5">{{Form::text('username', $donors->username,['class' => 'form-control'])}}</dd>
                                  <dt class="col-sm-6">Email:</dt>
                                  <dd class="col-sm-5">{{Form::email('email', $donors->email,['class' => 'form-control'])}}</dd>
                                  <dt class="col-sm-6">Birthdate:</dt>
                                  <dd class="col-sm-5">{{Form::date('birthdate', $donors->birthdate,['class' => 'form-control'])}}</dd>
                                  <dt class="col-sm-6">Street:</dt>
                                  <dd class="col-sm-5">{{Form::text('street', $donors->street,['class' => 'form-control'])}}</dd>
                                  <dt class="col-sm-6">City:</dt>
                                  <dd class="col-sm-5">{{Form::text('city', $donors->city,['class' => 'form-control'])}}</dd>
                                  <dt class="col-sm-6">Barangay:</dt>
                                  <dd class="col-sm-5">{{Form::text('barangay', $donors->barangay,['class' => 'form-control'])}}</dd>
                                  <dt class="col-sm-6">Cellphone:</dt>
                                  <dd class="col-sm-5">{{Form::text('cellNo', $donors->contacts->cellNo,['class' => 'form-control', 'placeholder' => '+63XXXXXXXXXX'])}}</dd>
                                  <dt class="col-sm-6">Telephone:</dt>
                                  <dd class="col-sm-5">{{Form::number('tellNo', $donors->contacts->tellNo,['class' => 'form-control'])}}</dd>
                                </dl>
                                <hr style="margin:5px 0 5px 0;"><br />
                                <input type="button" value="Save Changes" class="btn btn-success btn-block btn-lg" onclick="if(confirm('Are you sure?')) saveandsubmit(event);" />
                                <a class="btn btn-lg btn-block btn-danger" href="/donor/status/{{$donors->userID}}/edit" role="button">Deactivate Account</a>
                            </div>
                            {{Form::hidden('_method','PUT')}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @include('navbar.donor-footer')
    @include('navbar.footer')
</body>

</html>
