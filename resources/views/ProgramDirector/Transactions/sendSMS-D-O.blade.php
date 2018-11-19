<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
</head>
<body>
<div id="main-wrapper">
  @include('navbar.pd-navbar')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center"
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Orders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Message Donor</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
          <form class="form-horizontal" method="POST" action="{{ action('ProgramDirector\TwilioController@sendMessageDonorOrder') }}">
            {{ csrf_field() }}
                  <!-- Card -->
                  <div class="card">
                      <div class="card-body" style="height: 300px;">
                        <h4 class="card-title" align="center">Send a message</h4>
                                            <div class="card">
                                                <div class="card-body">

                                                  </div>
                                                    <div class="table-responsive">
                                                      @if($applicants->userID > 0)
                                                      <table class="table">
                                                          <thead class="thead-light">
                                                              <tr>
                                                                  <th scope="col">Name</th>
                                                                  <th scope="col">Email</th>
                                                                  <th scope="col">Mobile Number</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody class="customtable">
                                                              <tr>
                                                                <input type= "hidden" name= "mobile" class= "radio"
                                                                value="{{$applicants->donor->contacts->cellNo}}"/>
                                                                <input type= "hidden" name= "userID"
                                                                value="{{$applicants->userID}}">
                                                                <td> {{$applicants->donor['firstname']}} {{$applicants->donor['lastname']}}  </td>
                                                                <td> {{$applicants->donor['email']}} </td>
                                                                <td> {{$applicants->donor['contacts']['cellNo']}} </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                      @else
                                                      <div align="center" style="color:red;">
                                                          <br>
                                                          <br>
                                                          <h5>No donors found.</h5>
                                                      </div>
                                                      @endif
                                                    </div>
                                            </div>
                      </div>
                      <div class="card-body border-top">
                          <div class="row">
                              <div class="col-9">
                                <div class="form-group">
                                  <div>
                                    <label>Select Date:</label>
                                    <input class="btn-rounded btn-sm" aria-describedby="basic-addon1" type="date" name="date">
                                  </div>
                                  <div>
                                    <br />
                                    <select class="select2 form-control custom-select" name="message1" style="width: 100%; height:36px;">
                                          <optgroup label="Select Message">
                                              <option value="">Select Message</option>
                                            <option value="Sorry, but we cannot provide you with our products at this moment. We will notify you once are products are already available. ">Reject</option>
                                            <option value="Your volunteer is on the way to deliver your order! ">Update</option>
                                    </select>
                                    </div>

                                  <div class="input-field m-t-0 m-b-0">

                                      <textarea id="textarea1" class="form-control border-0" name="message" placeholder="Place your message here!"></textarea>
                                  </div>
                                  </div>
                              </div>
                              <div class="col-3">
                                  <button class="btn-circle btn-lg btn-cyan float-right text-white" type="submit" data-toggle="tooltip" data-placement="top" title="Send"><i class="fas fa-paper-plane"></i></button>
                              </div>
                          </div>
                      </div>
                  </div>
            </form>
            </div>
    </div>
    <footer class="footer text-center">
        Copyright
        &copy; <?php
          $fromYear = 2018;
          $thisYear = (int)date('Y');
          echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?>
         WeRecycle™
    </footer>
  </div>
</div>
@include('navbar.footer')
  </body>
  </html>
