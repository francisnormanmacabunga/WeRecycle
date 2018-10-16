@extends('layouts.frontend')
@include('layouts.admin-nav')

@section('content')

<div class="row">
  <div class="col-md-12">
    <br/>
    <h3 align="center">List of Donors</h3>
    <a href="/admin/donors">
     <button style="float: right;">Reset</button>
    </a>
    <a href="/admin/donors/?status=Deactivated">
      <button style="float: right;">Sort by Deactivated</button>
    </a>
    <a href="/admin/donors/?status=Activated">
      <button style="float: right;">Sort by Activated</button>
    </a>
    <br/>
    <br/>
      @if(count($donors) > 0)
    <table class="table table-bordered">
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
        <th>Barangay</th>
        <th>Cellphone Number</th>
        <th>Tellphone Number</th>
        <th>@sortablelink('created_at', 'Date Created')</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      @foreach ($donors as $donor)
        <tr>
          <td> {{$donor->firstname}} {{$donor->lastname}}</td>
          <td> {{$donor->age()}} </td>
          <td> {{$donor->street}}, {{$donor->city}} </td>
          <td> {{$donor->barangay}} </td>
          <td> {{$donor->contacts['cellNo']}} </td>
          <td> {{$donor->contacts['tellNo']}} </td>
          <td> {{date('F d, Y, h:i:sa', strtotime($donor->created_at))}} </td>
          <td> {{$donor->status}} </td>
          <th>
            <a class="btn btn-lg btn-block btn-primary" href="/admin/donors/{{$donor->userID}}/edit" role="button">Update Status </a>
          </th>
        @endforeach
    </table>
  @else
  <div align="center" style="color:red;">
    <br>
    <br>
    <h5 style="font-family:serif;">No records found.</h5>
  </div>
  @endif
  {{$donors->links()}}
  </div>
</div>

@endsection
