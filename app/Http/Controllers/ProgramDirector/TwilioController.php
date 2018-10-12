<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Twilio\Rest\Client;
use App\Models\Message;
use App\Models\Donor;
use App\Models\Transaction;
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
      $transaction = Transaction::all();
      //dd($applicants);
      //$applicants['transid'] = $transid;

      return view('ProgramDirector/ManageVolunteers.sendSMS-V', compact('applicants','transaction'));
    }

    public function indexVolunteerID($userID)
    {
      $applicants = Employee::SELECT('*')
      -> join('contacts', 'contacts.userID', '=', 'user.userID')
      -> where('usertypeID', '2')
      -> where('user.userID', $userID)
      -> where('status','Activated')
      -> get();

      $transaction = Transaction::all();
      //dd($transaction);
      return view('ProgramDirector/ManageVolunteers.sendSMS-V', compact('applicants', 'transaction'));
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
      $this->validate($request, [
        'message' => 'nullable',
      [
        'message.required' => 'The message field is required.'
      ]]);

        $applicant = new Message();
        $applicant->message = $request ->input('message');
        $applicant->userID = $request->userID;
        $applicant->transid = $request ->input('transid');
        $applicant->save();


    /*    $transaction = Transaction::find($id);
        $transaction->volunteer = $applicant->userID;
        $transaction->save(); */

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

    public function showHistory()
    {
      $message = Message::all();
      return view ('ProgramDirector/ManageVolunteers.tasksHistory', compact('message'));
    }

}
