@extends('layouts.app')
@include('inc.navbar2')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <br/>
      <h3 align="center">List of Applicants</h3>
      <a href="applicants/">
       <button style="float: right;">Reset</button>
      </a>
      <a href="applicants/?status=Applied">
        <button style="float: right;">Sort by Applied</button>
      </a>
      <a href="applicants/?status=Deactivated">
        <button style="float: right;">Sort by Deactivated</button>
      </a>
      <a href="applicants/?status=Activated">
        <button style="float: right;">Sort by Activated</button>
      </a>
      <br/>
      <br/>
      <table class="table table-bordered">
        <tr>
          <th>Name</th>
          <th>Age</th>
          <th>Address</th>
          <th>Barangay</th>
          <th>Cellphone Number</th>
          <th>Tellphone Number</th>
          <th>@sortablelink('created_at', 'Date Applied')</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        @foreach ($applicants as $applicant)
          <tr>
            <td>{{$applicant->firstname}} {{$applicant->lastname}}</td>
            <td>{{$applicant->age()}}</td>
            <td>{{$applicant->street}}, {{$applicant->city}}</td>
            <td>{{$applicant->barangay}}</td>
            <td>{{$applicant->cellNo}}</td>
            <td>{{$applicant->tellNo}}</td>
            <td>{{date('F d, Y, h:i:sa', strtotime($applicant->created_at))}}</td>
            <td>{{$applicant->status}}</td>
            <td><a href="/applicants/{{$applicant->userID}}/edit">Update Status</a?</td>
        @endforeach
      </table>
      {{$applicants->links()}}
    </div>
  </div>

@endsection
