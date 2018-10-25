@extends('layouts.frontend')
@include('layouts.pd-nav')


@section('content')


      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h3>Welcome to your profile, {{$donors->firstname}}!</h3>
      </div>

      <div class="container col-md-5 center-align">
        <div class="card-deck mb-3 ">
          <div class="card mb-4 shadow-sm">
            <div class="card-header text-center">
              <h4 class="my-0 font-weight-normal">User profile</h4>

            </div>
            <div class="card-body text-center">
              <h1 class="card-title pricing-card-title text-center">{{$donors->firstname}} {{$donors->lastname}}</h1>
              <hr style="margin:5px 0 5px 0;"><br>
              <dl class="row ">
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


                <a href="/programdirector/PD_password/{{$donors->userID}}/edit"><button>Update Password</button></a>
              </dl>
              <hr style="margin:5px 0 5px 0;"><br>
                  <a href="/programdirector/program_directors/{{$donors->userID}}/edit"><button class="btn btn-lg btn-block btn-primary">Update Password</button></a>
            </div>
          </div>
        </div>
      </div>


@endsection
