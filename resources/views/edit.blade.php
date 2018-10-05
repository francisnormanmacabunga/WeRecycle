@extends('layouts.frontend')
@include('layouts.app')

@section('content')

  {!! Form::open(['action' => ['Test@update', $applicants['userID']], 'method' => 'POST' ]) !!}
  <div class="row">
    <div class="col-md-12">
      <br/>
      <h3 align="center">Update status</h3>
      <br/>
      <h5 align="left"><a href="/activitycoordinator/applicant">Back</a></h5>
      <table class="table table-bordered">
        <tr>
          <th>Name</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
          <tr>
            <td>{{$applicants['firstname']}} {{$applicants['lastname']}}</td>
            <td>{{$applicants['status']}}</td>
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
