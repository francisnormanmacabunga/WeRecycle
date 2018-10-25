<?php

namespace App\Http\Controllers\ActivityCoordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Twilio\Rest\Client;
use Session;
use DB;

class TwilioController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:activitycoordinator');
  }

  public function index()
  {
    $applicants = Volunteer::SELECT('*')
    -> join('contacts', 'contacts.userID', '=', 'volunteer.volunteerID')
    -> where('usertypeID', '2')
    -> where('status','Activated')
    -> get();
    return view('ActivityCoordinator/ManageApplicants.sendSMS', compact('applicants'));
  }

  public function sendMessageApplicant(Request $request)
  {
    $sid    = "AC8a7060e979f382acdb6ba484275f218b";
    $token  = "addb0fa1287d36f40d566e65bc764f4a";
    $twilio = new Client($sid, $token);
    $message = $twilio->messages
    ->create($twilio->mobile = $request->input('mobile'), // to
             array(
                 "body" => $twilio->message = $request->input('message'),
                 "from" => "(619) 724-4011"));
    return redirect('/activitycoordinator/sendSMS')->with('success', 'Message Sent Succesfully');
  }

}
