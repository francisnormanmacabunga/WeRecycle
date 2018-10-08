<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Twilio\Rest\Client;
//use App\requestTable;
use App\Models\Donor;
use DB;

class TwilioController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:programdirector');
    }

    public function indexDonor()
    {
      $applicants = Donor::SELECT('*')
      -> join('contacts', 'contacts.userID', '=', 'user.userID')
      -> where('usertypeID', '1')
      -> where('status','Activated')
      -> get();
      return view('ProgramDirector/ManageDonors.sendSMS-D', compact('applicants'));
    }

    public function indexVolunteer()
    {
      $applicants = Employee::SELECT('*')
      -> join('contacts', 'contacts.userID', '=', 'user.userID')
      -> where('usertypeID', '2')
      -> where('status','Activated')
      -> get();
      return view('ProgramDirector/ManageVolunteers.sendSMS-V', compact('applicants'));
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
                     "from" => "(619) 724-4011"));

        return redirect('/programdirector/sendSMS-D')->with('success', 'Message Sent Succesfully');
      }

     public function sendMessageVolunteer(Request $request)
     {
    /*  $this->validate($request, [
        'message' => 'nullable',
      [
        'message.required' => 'The message field is required.'
      ]]);
        $applicant = new requestTable();
        //$feedback->userID = (Select from user where userID = session('username'))
        $applicant->message = $request ->input('message');
        $applicant->userID = auth()->user()->userID;
        $applicant->save(); */

        $sid    = "AC8a7060e979f382acdb6ba484275f218b";
        $token  = "addb0fa1287d36f40d566e65bc764f4a";
        $twilio = new Client($sid, $token);
        $message = $twilio->messages
        ->create($twilio->mobile = $request->input('mobile'), // to
                 array(
                     "body" => $twilio->message = $request->input('message'),
                     "from" => "(619) 724-4011"));

        return redirect('/programdirector/sendSMS-V')->with('success', 'Message Sent Succesfully');
    }

}
