@extends('layouts.pd-nav')

@section('content')

          <div class="container">
            @if(session()->has('notif'))
            <div class="content">
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Notification</strong> {{session()->get('notif')}}
              </div>
            </div>
            @endif

            </div>
              <div class="row justify-content-center">
                  <div class="col-md-8">
                      <div class="card">
                          <div class="card-header">Welcome to Program Director Homepage</div>

                          <div class="card-body">
                              @if (session('status'))
                                  <div class="alert alert-success" role="alert">
                                      {{ session('status') }}
                                  </div>
                              @endif

                              You are logged in! Welcome <?php Auth::user()->username?>!
                          </div>
                      </div>
                  </div>
              </div>
          </div>

@endsection
