@extends('layouts.frontend')
@include('layouts.admin-nav')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <br/>
      <h3 align="center">Audit Logs</h3>
      <a href="/admin/auditlogs">
       <button style="float: right;">Reset</button>
      </a>
    
      <a href="/admin/auditlogs/?log_name=Donor Account">
        <button style="float: right;">Sort by Donor</button>
      </a>
      <a href="/admin/auditlogs/?log_name=Employee Account">
        <button style="float: right;">Sort by Employee</button>
      </a>
      <br/>
      <br/>
        @if(count($lastActivity) > 0)
      <table class="table table-bordered">
        <tr>
          <th>@sortablelink('updated_at', 'Date')</th>
          <th>Causer</th>
          <th>Action</th>
          <th>Subject</th>
          <th>Subject Type</th>
        </tr>
        @foreach ($lastActivity as $lastActivitys)
        <tr>
          <td> {{date('F d, Y, h:i:sa', strtotime($lastActivitys->updated_at))}} </td>
          <td> {{$lastActivitys->causer['username']}} </td>
          <td> {{$lastActivitys->description}} </td>
          <td> {{$lastActivitys->subject['username']}} </td>
          <td> {{$lastActivitys->log_name}} </td>
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
    {{$lastActivity->links()}}
    </div>
  </div>

@endsection
