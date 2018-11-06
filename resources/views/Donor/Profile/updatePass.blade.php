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
      Update Password
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
                           {!! Form::open(['action' => ['Donor\DonorsPasswordController@update', $donors['userID']], 'method' => 'POST' ]) !!}
                           <h4 class="my-0 font-weight-normal">Update your password, {{$donors->firstname}}!</h4>
                       </div>
                       <div class="card-body text-center">
                           <h1 class="card-title pricing-card-title text-center">{{$donors->firstname}} {{$donors->lastname}}</h1>
                           <hr style="margin:5px 0 5px 0;"><br>
                           <dl class="row">
                               <dt class="col-sm-6">Update Password:</dt>
                               <dd class="col-sm-5">{{Form::password('password', ['class' => 'form-control'.($errors->has('password') ? ' is-invalid' : '')])}}
                                 @if ($errors->has('password'))
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $errors->first('password') }}</strong>
                                 </span>
                                 @endif
                               </dd>
                               <dt class="col-sm-6">Confirm Password:</dt>
                               <dd class="col-sm-5">{{Form::password('password_confirmation', ['class' => 'form-control'.($errors->has('password_confirmation') ? ' is-invalid' : '')])}}
                                 @if ($errors->has('password_confirmation'))
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $errors->first('password_confirmation') }}</strong>
                                 </span>
                                 @endif
                               </dd>
                           </dl>
                           <hr style="margin:5px 0 5px 0;"><br>
                           <input type="submit" value="Save Changes" class="btn btn-success btn-block btn-lg" onclick="if(confirm('Are you sure?')) saveandsubmit(event);" />
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
