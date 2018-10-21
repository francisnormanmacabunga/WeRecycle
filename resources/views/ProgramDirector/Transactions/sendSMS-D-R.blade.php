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
                    {!! Form::open(['action' => 'ProgramDirector\TwilioController@sendMessageDonorRequest', 'method' => 'POST' ]) !!}
                      {{ csrf_field() }}
                      <div class="form-group">
                        {{Form::textArea('message','', ['class' => 'form-control', 'placeholder' => 'Place your message here...'])}}
                      </div>
                      <h3 class="text-center">List of Donors Requested</h3>
                      <hr style="margin:5px 0 5px 0;"><br>
                      <table class="table table-striped table-hover">
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile Number</th>
                        </tr>
                          <tr>
                            <input type= "hidden" name= "mobile" class= "radio"
                            value="{{$applicants->donor->contacts->cellNo}}"/>
                            <input type= "hidden" name= "userID"
                            value="{{$applicants->userID}}">
                            <td>{{$applicants->donor->firstname}} {{$applicants->donor->lastname}}</td>
                            <td>{{$applicants->donor->email}}</td>
                            <td>{{$applicants->donor->contacts->cellNo}}</td>
                          </tr>
                      </table>
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
