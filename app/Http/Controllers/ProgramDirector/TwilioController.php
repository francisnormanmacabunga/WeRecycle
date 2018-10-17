<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Twilio\Rest\Client;
use App\Models\MessageRequests;
use App\Models\MessageOrders;
use App\Models\MessageDonors;
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

    public function indexDonorRequest()
    {

      $applicants = Transaction::SELECT('*')
      -> where('type','Donate')
      -> get();

      return view('ProgramDirector/Transactions.sendSMS-D-R', compact('applicants'));
    }

    public function indexDonorRequestID($userID)
    {

      $applicants = Transaction::SELECT('*')
      -> where('type','Donate')
      -> where('transactions.userID', $userID)
      -> get();

      return view('ProgramDirector/Transactions.sendSMS-D-R', compact('applicants'));
    }



    public function indexDonorOrder()
    {

      $applicants = Transaction::SELECT('*')
      -> where('type','Shop')
      -> get();

      return view('ProgramDirector/Transactions.sendSMS-D-O', compact('applicants'));
    }

    public function indexDonorOrderID($userID)
    {

      $applicants = Transaction::SELECT('*')
      -> where('type','Shop')
      -> where('transactions.userID', $userID)
      -> get();

      return view('ProgramDirector/Transactions.sendSMS-D-O', compact('applicants'));
    }




    public function indexVolunteerRequest()
    {
      $applicants = Volunteer::SELECT('*')
      -> join('contacts', 'contacts.volunteerID', '=', 'volunteer.volunteerID')
      -> where('usertypeID', '2')
      -> where('status','Activated')
      -> get();

      $transaction = Volunteer::where('status','Ordered')->get();
      return view('ProgramDirector/Transactions.sendSMS-V-R', compact('applicants','transaction'));
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
      return view('ProgramDirector/Transactions.sendSMS-V-R', compact('applicants', 'transaction'));
    }

    public function indexVolunteerOrder()
    {
      $applicants = Volunteer::SELECT('*')
      -> join('contacts', 'contacts.volunteerID', '=', 'volunteer.volunteerID')
      -> where('usertypeID', '2')
      -> where('status','Activated')
      -> get();

      $transaction = Transaction::all();
      return view('ProgramDirector/Transactions.sendSMS-V-O', compact('applicants','transaction'));
    }

    public function indexVolunteerOrderID($volunteerID)
    {
      $applicants = Volunteer::SELECT('*')
      -> join('contacts', 'contacts.volunteerID', '=', 'volunteer.volunteerID')
      -> where('usertypeID', '2')
      -> where('volunteer.volunteerID', $volunteerID)
      -> where('status','Activated')
      -> get();

      $transaction = Transaction::all();
      return view('ProgramDirector/Transactions.sendSMS-V-O', compact('applicants', 'transaction'));
    }

    public function sendMessageDonorRequest(Request $request)
    {
      $this->validate($request, [
        'message' => 'nullable',
      [
        'message.required' => 'The message field is required.'
      ]]);

        $applicant = new MessageDonors();
        $applicant->message = $request ->input('message');
        $applicant->userID = $request->userID;
        $applicant->save();


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

      public function sendMessageDonorOrder(Request $request)
      {
        $this->validate($request, [
          'message' => 'nullable',
        [
          'message.required' => 'The message field is required.'
        ]]);

          $applicant = new MessageDonors();
          $applicant->message = $request ->input('message');
          $applicant->userID = $request->userID;
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
