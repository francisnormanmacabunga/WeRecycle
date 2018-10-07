@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send notification through SMS</div>
                <div class="card-body">
                  <div class="panel-body">
                    {!! Form::open(['action' => 'TwilioController@sendMessageVolunteer', 'method' => 'POST' ]) !!}
                      {{ csrf_field() }}
                      <div class="form-group">
                        {{Form::textArea('message','', ['class' => 'form-control', 'placeholder' => 'Place your message here...'])}}
                      </div>
                      @if(count($applicants)>0)
                      <table class="table table-striped table-hover">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile Number</th>
                          <th>Status</th>
                        </tr>

                        @foreach ($applicants as $applicant)
                          <tr>
                            <td><input type= "radio" name= "mobile" class= "radio" value="{{$applicant->cellNo}}"/></td>
                            <td>{{$applicant->firstname}} {{$applicant->lastname}}</td>
                            <td>{{$applicant->email}}</td>
                            <td>{{$applicant->cellNo}}</td>
                            <td>{{$applicant->status}}</td>
                        @endforeach

                      </table>

                    @else
                      <div align="center" style="color:red;">
                        <h3>No applicants found.</h3>
                      </div>
                    @endif
                      <div class="form-group">
                        <div>
                          {{Form::submit('Send Message',['class' => 'btn btn-primary btn-lg btn-block'])}}
                        {!! Form::close() !!}
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
