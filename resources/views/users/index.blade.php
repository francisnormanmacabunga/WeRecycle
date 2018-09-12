@extends('layouts.app')
@include('inc.navbar3')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <br/>
      <h3 align="center">View Profile</h3>
      <br/>
      <br/>


        @foreach ($donors as $donor)
            UserTypeID: {{$donor->usertypeID}}<br>
            Username: {{$donor->username}}<br>
            Name: {{$donor->firstname}} {{$donor->lastname}}<br>
            Birthdate: {{$donor->birthdate}}<br>
            Address: {{$donor->street}}, {{$donor->city}}<br>
            Barangay:{{$donor->barangay}}<br>
            Cellphone: {{$donor->cellNo}}<br>
            Telephone: {{$donor->tellNo}}<br>
            <a href="/donors/{{$donor->userID}}/edit">Update Account</a><br>
        @endforeach

    </div>
  </div>

@endsection
