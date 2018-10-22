@extends('layouts.frontend')
@include('layouts.admin-nav')

@section('content')

{!! Form::open(['action' => ['Admin\CatalogController@update', $products['productsID']], 'method' => 'POST', 'files' => true, 'enctype' =>"multipart/form-data" ]) !!}
  <div class="py-5 text-center">
        <h3>Update item # {{$products['productsID']}}</h3>
      </div>
      <div class="container col-md-9 center-align">
            <div class="row">
            <div class="col-md-6 mb-3">
              {{Form::label('productname','Item Name')}}
              {{Form::text('productname','', ['class' => 'form-control'])}}
            </div>
            <div class="col-md-6 mb-3">
              {{Form::label('status','Status')}}
              <br>
              {{Form::select('status', ['Activated' => 'Activated', 'Deactivated' => 'Deactivated'])}}
            </div>
            </div>
            <div class="mb-3">
              {{Form::label('description','Description')}}
              {{Form::textarea('description','', ['class' => 'form-control'])}}
            <div class="row">
              <div class="col-md-6 mb-3">
                {{Form::label('price','Price')}}
                {{Form::number('price','', ['class' => 'form-control'])}}
              </div>
              <div class="col-md-6 mb-3">
                {{Form::label('productimage','Image')}}
                {{Form::file('productimage',['class' => 'form-control'])}}
              </div>
            </div>
            <h5 align="left"><a href="/admin/manageshop">Back</a></h5>
            <hr class="mb-4">
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Save',['class' => 'btn btn-success btn-lg btn-block', 'onclick' => 'Confirm()'])}}
            {!! Form::close() !!}
        </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>

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
