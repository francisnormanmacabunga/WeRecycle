<!DOCTYPE html>
<html dir="ltr" lang="en">
      @include('navbar.donor')
      <head>profile
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
      Deactivate Account
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
                           {!! Form::open(['action' => ['Donor\DonorsStatusController@update', $donors['userID']], 'method' => 'POST' ]) !!}
                           <h4 class="my-0 font-weight-normal">Deactivate your profile, {{$donors->firstname}}!</h4>
                       </div>
                       <div class="card-body text-center">
                           <h1 class="card-title pricing-card-title text-center">{{$donors->firstname}} {{$donors->lastname}}</h1>
                           <hr style="margin:5px 0 5px 0;"><br>
                           <div class="text-center">
                             <h5>Are you sure you want to deactivate your account?</h5>
                             {{Form::hidden('status', 'Deactivated',['class' => 'form-control'])}}
                             {{Form::hidden('_method','PUT')}}
                           </div>
                           <hr style="margin:5px 0 5px 0;"><br>
                           {{Form::submit('Yes',['class' => 'btn btn-lg btn-block btn-danger'])}}
                           <a class="btn btn-lg btn-block btn-primary" href="{{ url('/donor/donors') }}" role="button">No </a>
                       </div>
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
