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
                    <form class="form-horizontal" method="POST" action="{{ action('TwilioController@sendMessageDonor') }}">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <textarea class="form-control" type="text" name="message" placeholder="Place your message here!"></textarea>
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
                  <button type="submit" class="btn btn-primary" style="float: right;"> Send Message </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
