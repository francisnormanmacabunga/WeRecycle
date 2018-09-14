@extends('layouts.backend')
@include('inc.navbar5')

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
          </table>
        </div>
      </div>

          <div class="form-group">
        {{ Form::select('usertype', $usertype) }}
          </div

          <div class="col-md-3 mb-3">
            {{Form::label('usertype','User Type')}}
            {{Form::select('usertype', ['Choose' , $usertype], null, ['class' => 'custom-select d-block w-100'])}}




@endsection
