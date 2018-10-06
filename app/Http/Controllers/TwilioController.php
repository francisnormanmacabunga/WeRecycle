<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\userTable;
use App\requestTable;
use Session;
use Auth;
use DB;

class TwilioController extends Controller
{
  public function __construct()
  {

    $this->middleware('auth:programdirector', ['only'=> [
      'indexVolunteer','indexDonor', 'sendMessageVolunteer', 'sendMessageDonor', 'sendMessageVolunteer'
      ]]);

    $this->middleware('auth:activitycoordinator', ['except'=> [
      'indexVolunteer','indexDonor', 'sendMessageVolunteer', 'sendMessageDonor', 'sendMessageVolunteer'
      ]]);
  }

  public function index()
  {
    $applicants = userTable::SELECT('*')
    -> join('contacts', 'contacts.userID', '=', 'user.userID')
    -> where('usertypeID', '2')
    -> where('status','Activated')
    -> get();
    return view('activity_coordinators.sendSMS', compact('applicants'));
  }

  public function indexVolunteer()
  {
    $applicants = userTable::SELECT('*')
    -> join('contacts', 'contacts.userID', '=', 'user.userID')
    -> where('usertypeID', '2')
    -> where('status','Activated')
    -> get();
    return view('program_directors.sendSMS-V', compact('applicants'));
  }

  public function indexDonor()
  {
    $applicants = userTable::SELECT('*')
    -> join('contacts', 'contacts.userID', '=', 'user.userID')
    -> where('usertypeID', '1')
    -> where('status','Activated')
    -> get();
    return view('program_directors.sendSMS-V', compact('applicants'));
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
                 "from" => "(619) 724-4011"
             )
    );

    return redirect('/activitycoordinator/sendSMS')->with('success', 'Message Sent Succesfully');
  }

  public function sendMessageVolunteer(Request $request)
  {
    $this->validate($request, [
    'message' => 'nullable',
    [
      'message.required' => 'The message field is required.'
    ]
  ]);
    $applicant = new requestTable();
    //$feedback->userID = (Select from user where userID = session('username'))
    $applicant->message = $request ->input('message');
    $applicant->userID = auth()->user()->userID;
    $applicant->save();

    $sid    = "AC8a7060e979f382acdb6ba484275f218b";
    $token  = "addb0fa1287d36f40d566e65bc764f4a";
    $twilio = new Client($sid, $token);
    $message = $twilio->messages
    ->create($twilio->mobile = $request->input('mobile'), // to
             array(
                 "body" => $twilio->message = $request->input('message'),
                 "from" => "(619) 724-4011"
             )
    );


    return redirect('/programdirector/sendSMS-V')->with('success', 'Message Sent Succesfully');
  }

  public function sendMessageDonor(Request $request)
  {
    $sid    = "AC8a7060e979f382acdb6ba484275f218b";
    $token  = "addb0fa1287d36f40d566e65bc764f4a";
    $twilio = new Client($sid, $token);
    $message = $twilio->messages
    ->create($twilio->mobile = $request->input('mobile'), // to
             array(
                 "body" => $twilio->message = $request->input('message'),
                 "from" => "(619) 724-4011"
             )
    );

    return redirect('/programdirector/sendSMS-D')->with('success', 'Message Sent Succesfully');
  }

}
