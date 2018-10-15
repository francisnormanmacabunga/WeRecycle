@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')

  {!! Form::open(['action' => ['ProgramDirector\RequestController@update', $request['transid']], 'method' => 'POST' ]) !!}
  <div class="row">
    <div class="col-md-12">
      <br/>
      <h3 align="center">Update status</h3>
      <br/>
      <h5 align="left"><a href="/programdirector/viewRequests">Back</a></h5>
      <table class="table table-bordered">
        <tr>
          <th>Name</th>
          <th>Status</th>
          <th>Action</th>
          <th>Volunteer</th>
        </tr>
          <tr>
            <td>{{$request->user->firstname}} {{$request->user->lastname}}</td>
            <td>{{$request['status']}}</td>
            <td>{{Form::select('status', ['Shipping' => 'Shipping', 'Delivered' => 'Delivered', 'Cancelled' => 'Cancelled'])}}</td>
            <td>
              <select name="volunteer">
              @foreach($volunteer as $volunteers)
                <option value="{{$volunteers->volunteerID}}">{{$volunteers->firstname}}</option>
              @endforeach
              </select>
            </td>
          </tr>
      </table>
    </div>
  </div>
  <div>
  {{Form::hidden('_method','PUT')}}
  {{Form::submit('Save',['class' => 'btn btn-success btn-lg btn-block', 'onclick' => 'Confirm()'])}}
  {!! Form::close() !!}
  <a class="btn btn-block btn-primary btn-lg btn-block" href="/programdirector/requests" role="button">Back</a>
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





    <div class="row">
      <div class="col-lg-3">
      <h3>Donation</h3>
      <div class="list-group">
          <a href="/donor/donationCatalog" class="list-group-item">Donation</a>
          <a href="/donor/shopCatalog" class="list-group-item">Fertilizer</a>
      </div>
      </div>

      <div class="col-lg-9">
        <div class="row">



          <div class="col-lg-4 col-md-6 mb-4">

            <div class="col-md-12">
            <div class="row">



                  <table class="table table-bordered" class="fixed">
                  <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Volunteer</th>
                </tr>

                <tr>
                  <td>{{$request->user->firstname}} {{$request->user->lastname}}</td>
                  <td>{{$request['status']}}</td>
                  <td>{{Form::select('status', ['Shipping' => 'Shipping', 'Delivered' => 'Delivered', 'Cancelled' => 'Cancelled'])}}</td>
                  <td>
                    <select name="volunteer">
                    @foreach($volunteer as $volunteers)
                      <option value="{{$volunteers->volunteerID}}">{{$volunteers->firstname}}</option>
                    @endforeach
                    </select>
                  </td>
                </tr>

              </table>

            </div>
          </div>


          </div>



        </div>
      </div>
    </div>






@endsection
