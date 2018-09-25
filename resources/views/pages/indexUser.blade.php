@extends('layouts.donor-nav')

@section('content')

          <div class="container">
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

                              You are logged in! Welcome <?php Auth::user()->username?>!
                          </div>
                      </div>
                  </div>
              </div>
          </div>

@endsection
