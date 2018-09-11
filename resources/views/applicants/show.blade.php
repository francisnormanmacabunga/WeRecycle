@extends('layouts.app')
@include('inc.navbar2')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <br/>
      <h3 align="center">List of Applicants</h3>
      <br/>
      <h5 align="left"><a href="">Back</a></h5>
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Birthdate</th>
          <th>City</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
          <tr>
            <td>{{$applicants['userID']}}</td>
            <td>{{$applicants['firstname']}}</td>
            <td>{{$applicants['lastname']}}</td>
            <td>{{$applicants['email']}}</td>
            <td>{{$applicants['contact']}}</td>
            <td>{{$applicants['birthdate']}}</td>
            <td>{{$applicants['city']}}</td>
            <td>{{$applicants['status']}}</td>
            
          </tr>
      </table>
    </div>
  </div>



@endsection
