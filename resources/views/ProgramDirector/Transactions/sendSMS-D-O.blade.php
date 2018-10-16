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
                    {!! Form::open(['action' => 'ProgramDirector\TwilioController@sendMessageDonorOrder', 'method' => 'POST' ]) !!}
                      {{ csrf_field() }}
                      <div class="form-group">
                        {{Form::textArea('message','', ['class' => 'form-control', 'placeholder' => 'Place your message here...'])}}
                      </div>
                      <h3 class="text-center">List of Donors Requested</h3>
                      <hr style="margin:5px 0 5px 0;"><br>
                      @if(count($applicants)>0)
                      <table class="table table-striped table-hover">
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile Number</th>
                          <th>Action</th>
                        </tr>
                        @foreach ($applicants as $applicant)
                          <tr>
                            <input type= "hidden" name= "mobile" class= "radio" value="{{$applicant->donor->contacts->cellNo}}"/>
                            <input type= "hidden" name= "userID"  value="{{$applicant->userID}}">
                            <td>{{$applicant->donor->firstname}} {{$applicant->donor->lastname}}</td>
                            <td>{{$applicant->donor->email}}</td>
                            <td>{{$applicant->donor->contacts->cellNo}}</td>
                            <td>
                              <a class="btn btn-primary"
                              href="/programdirector/sendSMS-D-O/donorID={{$applicant->userID}}"
                              role="button"> Select </a>
                            </td>
                          </tr>
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
