@extends('layouts.donor-nav')

@section('content')

          <div class="container">
            @if(session()->has('notif'))
            <div class="content">
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('notif')}}</strong>
              </div>
            </div>
            @endif
              <div class="row justify-content-center">
                  <div class="col-md-8">
                      <div class="card">
                          <div class="card-header">Welcome to Donor Homepage</div>
                          <div class="card-body">
                              @if (session('status'))
                                  <div class="alert alert-success" role="alert">
                                      {{ session('status') }}
                                  </div>
                              @endif
                              Hello {{Auth::user()->firstname}}!
                          </div>
                          <div class="card-body">
                          <a href="/addpointeru">Add points</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

@endsection
