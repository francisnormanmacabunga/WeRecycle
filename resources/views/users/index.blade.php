@extends('layouts.frontend')
@include('inc.navbar3')

@section('content')

      @foreach ($donors as $donor)
      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h3>Welcome to your profile, {{$donor->firstname}}!</h3>
      </div>

      <div class="container col-md-5 center-align">
        <div class="card-deck mb-3 ">
          <div class="card mb-4 shadow-sm">
            <div class="card-header text-center">
              <h4 class="my-0 font-weight-normal">User profile</h4>
            </div>
            <div class="card-body text-center">
              <h1 class="card-title pricing-card-title text-center">{{$donor->firstname}} {{$donor->lastname}}</h1>
              <hr style="margin:5px 0 5px 0;"><br>
              <dl class="row ">
                <dt class="col-sm-6">Username:</dt>
                <dd class="col-sm-4">{{$donor->username}}</dd>
                <dt class="col-sm-6">Email:</dt>
                <dd class="col-sm-4">{{$donor->email}}</dd>
                <dt class="col-sm-6">Birthdate:</dt>
                <dd class="col-sm-4">{{$donor->birthdate}}</dd>
                <dt class="col-sm-6">Address:</dt>
                <dd class="col-sm-4">{{$donor->street}}, {{$donor->city}}</dd>
                <dt class="col-sm-6">Barangay:</dt>
                <dd class="col-sm-4">{{$donor->barangay}}</dd>
                <dt class="col-sm-6">Cellphone:</dt>
                <dd class="col-sm-4">{{$donor->cellNo}}</dd>
                <dt class="col-sm-6">Telephone:</dt>
                <dd class="col-sm-4">{{$donor->tellNo}}</dd>
                <dt class="col-sm-6">Password:</dt>
                <a href="/password/{{$donor->userID}}/edit"><button>Update Password</button></a>
              </dl>
              <hr style="margin:5px 0 5px 0;"><br>
              <form action="/donors/{{$donor->userID}}/edit">
                  <input type="submit" value="Edit Profile" class="btn btn-lg btn-block btn-primary" />
              </form>

            </div>

          </div>
        </div>
      </div>
       @endforeach

@endsection
