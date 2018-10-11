@extends('layouts.frontend')
@include('layouts.pd-nav')

@section('content')

  @foreach ($message as $messages)
    {{$messages->message}}
  @endforeach

@endsection
