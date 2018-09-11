@extends('layouts.app')
@include('inc.navbar1')
@section('content')
  <div class="jumbotron mt-3 text-center">
    <h3>{{$title}}</h3>
    <p class="lead">This is WeRecycle!</p>
    <a class="btn btn-success btn-lg" href="#log" role="button">Login </a>
    <a class="btn btn-lg btn-primary" href="#log" role="button">Register </a>
  </div>
@endsection
