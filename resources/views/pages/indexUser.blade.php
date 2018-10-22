@extends('layouts.donor-nav')

@section('content')

          <div class="container">
            @if(session()->has('pointsnotif'))
            <div class="content">
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('pointsnotif')}}</strong>
              </div>
            </div>
            @endif

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

                          <div class="w3-light-grey">
                            <div class="content-center"><center>your points:</center></div>
                            <div class="w3-container w3-green"  style=" max-width:100%; width:{{$width['pointsaccumulated']}}%" max="100%" min="0%">{{$width['pointsaccumulated']}}%</div>
                            <div class="w3-container w3-green"  style=" max-width:100; width:{{$width['pointsaccumulated']}};%">{{$width['pointsaccumulated']}}%</div>
                            <div class="content-center"><center>100% = discount code</center></div>
                          </div>
                          <br>
                          @if ($width['pointsaccumulated'] >= 100)
                          <div>
                          <center><a href="/redeemcode" onclick="confirm('Are you sure you want to claim your discount code?')" class="btn-lg" >Redeem</a></center>

                          </div>
                          @else
                          <div>
                          </div>
                          @endif
                        </div>
                      </div>
                  </div>
              </div>
          </div>

@endsection
