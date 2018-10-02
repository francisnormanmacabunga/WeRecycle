@extends('layouts.frontend')
@include('layouts.admin-nav')

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
            <td><a href="/admin/employees/{{$employees->userID}}/edit" onclick="return confirm('Do you want to update this item?')">Update Status</a?</td>
          </tr>
        @endforeach
      </table>
    @else
    <div align="center" style="color:red;">
      <br>
      <br>
      <h5 style="font-family:serif;">No records found.</h5>
    </div>
    @endif
      {{$employee->links()}}
    </div>
  </div>

@endsection
