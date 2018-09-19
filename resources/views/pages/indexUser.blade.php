@extends('layouts.frontend')
@include('inc.navbar3')
@section('content')

  <h3>Welcome {{session('username') }}</h3>

@endsection
