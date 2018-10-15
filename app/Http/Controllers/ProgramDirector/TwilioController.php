<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Twilio\Rest\Client;
use App\Models\MessageRequests;
use App\Models\MessageOrders;
use App\Models\Donor;
use App\Models\Transaction;
use App\Models\Volunteer;
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

    public function indexVolunteerRequest()
    {
      $applicants = Volunteer::SELECT('*')
      -> join('contacts', 'contacts.volunteerID', '=', 'volunteer.volunteerID')
      -> where('usertypeID', '2')
      -> where('status','Activated')
      -> get();

      $transaction = Volunteer::where('status','Ordered')->get();
      return view('ProgramDirector/ManageVolunteers.sendSMS-V-R', compact('applicants','transaction'));
    }

    public function indexVolunteerRequestID($volunteerID)
    {
      $applicants = Volunteer::SELECT('*')
      -> join('contacts', 'contacts.volunteerID', '=', 'volunteer.volunteerID')
      -> where('usertypeID', '2')
      -> where('volunteer.volunteerID', $volunteerID)
      -> where('status','Activated')
      -> get();

      $transaction = Transaction::all();
      return view('ProgramDirector/ManageVolunteers.sendSMS-V-R', compact('applicants', 'transaction'));
    }

    public function indexVolunteerOrder()
    {
      $applicants = Employee::SELECT('*')
      -> join('contacts', 'contacts.userID', '=', 'user.userID')
      -> where('usertypeID', '2')
      -> where('status','Activated')
      -> get();

      $transaction = Transaction::all();
      return view('ProgramDirector/ManageVolunteers.sendSMS-V-O', compact('applicants','transaction'));
    }

    public function indexVolunteerOrderID($userID)
    {
      $applicants = Employee::SELECT('*')
      -> join('contacts', 'contacts.userID', '=', 'user.userID')
      -> where('usertypeID', '2')
      -> where('user.userID', $userID)
      -> where('status','Activated')
      -> get();

      $transaction = Transaction::all();
      return view('ProgramDirector/ManageVolunteers.sendSMS-V-O', compact('applicants', 'transaction'));
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

     public function assignRequest(Request $request)
     {
      $this->validate($request, [
        'message' => 'nullable',
      [
        'message.required' => 'The message field is required.'
      ]]);

        $applicant = new MessageRequests();
        $applicant->message = $request ->input('message');
        $applicant->volunteerID = $request->volunteerID;
        $applicant->save();

      /*  $applicant = Transaction::find($transid);
        $applicant->transid = $request ->input('transid');
        $applicant->save(); */

        $sid    = "AC8a7060e979f382acdb6ba484275f218b";
        $token  = "addb0fa1287d36f40d566e65bc764f4a";
        $twilio = new Client($sid, $token);
        $message = $twilio->messages
        ->create($twilio->mobile = $request->input('mobile'), // to
                 array(
                     "body" => $twilio->message = $request->input('message'),
                     "from" => "(619) 724-4011"));

        return redirect('/programdirector/requests')->with('success', 'Message Sent Succesfully');
    }

    public function assignOrder(Request $request)
    {
     $this->validate($request, [
       'message' => 'nullable',
     [
       'message.required' => 'The message field is required.'
     ]]);

       $applicant = new MessageOrders();
       $applicant->message = $request ->input('message');
       $applicant->volunteerID = $request->volunteerID;
       $applicant->save();

       $sid    = "AC8a7060e979f382acdb6ba484275f218b";
       $token  = "addb0fa1287d36f40d566e65bc764f4a";
       $twilio = new Client($sid, $token);
       $message = $twilio->messages
       ->create($twilio->mobile = $request->input('mobile'), // to
                array(
                    "body" => $twilio->message = $request->input('message'),
                    "from" => "(619) 724-4011"));

       return redirect('/programdirector/orders')->with('success', 'Message Sent Succesfully');
   }

}
