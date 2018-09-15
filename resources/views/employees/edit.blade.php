@extends('layouts.backend')
@include('inc.navbar5')

@section('content')

  {!! Form::open(['action' => ['EmployeesController@update', $employee['userID']], 'method' => 'POST' ]) !!}
  <div class="row">
    <div class="col-md-12">
      <br/>
      <h3 align="center">List of Applicants</h3>
      <br/>
      <h5 align="left"><a href="/applicants">Back</a></h5>
      <table class="table table-bordered">
        <tr>
          <th>Name</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
          <tr>
            <td>{{$employee['firstname']}} {{$employee['lastname']}}</td>
            <td>{{$employee['status']}}</td>
            <td>
                {{Form::select('status', ['Activated' => 'Activated', 'Deactivated' => 'Deactivated'])}}
            </td>
          </tr>
      </table>
    </div>
  </div>
  {{Form::hidden('_method','PUT')}}
  {{Form::submit('Save',['class' => 'btn btn-success btn-lg btn-block'])}}
  {!! Form::close() !!}
@endsection
