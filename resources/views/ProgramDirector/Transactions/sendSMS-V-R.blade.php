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
                  {!! Form::open(['action' => 'ProgramDirector\TwilioController@assignRequest', 'method' => 'POST' ]) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                      {{Form::textArea('message','', ['class' => 'form-control', 'placeholder' => 'Place your message here...'])}}
                    </div>
                    <h3 class="text-center">List of Volunteers</h3>
                    <hr style="margin:5px 0 5px 0;"><br>
                    <table class="table table-striped table-hover">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                      </tr>
                        <tr>
                          <input type= "hidden" name= "mobile" class= "radio"
                          value="{{$applicants->volunteer['contacts']['cellNo']}}"/>
                          <input type= "hidden" name= "volunteerID"
                          value="{{$applicants->volunteerID}}">
                          <td>{{$applicants->volunteer['firstname']}} {{$applicants->volunteer['lastname']}}</td>
                          <td>{{$applicants->volunteer['email']}}</td>
                          <td>{{$applicants->volunteer['contacts']['cellNo']}}</td>
                        </tr>
                    </table>
                    <div class="form-group">
                    <div>
                      {{Form::submit('Send Message',['class' => 'btn btn-primary btn-lg btn-block'])}}
                      {!! Form::close() !!}
                    <!--  <a class="btn btn-block btn-primary btn-lg btn-block" href="{{ url()->previous() }}" role="button">Back</a> -->
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<script type="text/javascript">
    function Confirm() {
        var confirm_value = document.createElement("INPUT");
        confirm_value.type = "hidden";
        confirm_value.name = "confirm_value";
        if (confirm("Do you want to save data?")) {
            confirm_value.value = "Yes";
        } else {
            confirm_value.value = "No";
        }
        document.forms[0].appendChild(confirm_value);
    }
</script>

@endsection
