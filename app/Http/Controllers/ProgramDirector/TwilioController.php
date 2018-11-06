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

    public function indexVolunteerOrder($id)
    {
      $applicants = Transaction::find($id);
      return view('ProgramDirector/Transactions.sendSMS-V-O', ['applicants'=>$applicants]);
    }

    public function assignOrder(Request $request)
    {
     $this->validate($request, [
       'message' => 'required',
     [
       'message.required' => 'The message field is required.'
     ]]);
      session()->flash('sms','Message Sent!');
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

    public function indexDonorOrder($id)
    {
      $applicants = Transaction::find($id);
      return view('ProgramDirector/Transactions.sendSMS-D-O', ['applicants'=>$applicants]);
    }

    public function sendMessageDonorOrder(Request $request)
    {
      $this->validate($request, [
        'message' => 'required',
      [
        'message.required' => 'The message field is required.'
      ]]);
        session()->flash('sms','Message Sent!');
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

      public function indexVolunteerRequest($id)
      {

        $applicants = Transaction::find($id);
        return view('ProgramDirector/Transactions.sendSMS-V-R', ['applicants'=>$applicants]);
      }

      public function assignRequest(Request $request)
      {
       $this->validate($request, [
         'message' => 'required',
       [
         'message.required' => 'The message field is required.'
       ]]);
         session()->flash('sms','Message Sent!');
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

    public function indexDonorRequest($id)
    {
      $applicants = Transaction::find($id);
      return view('ProgramDirector/Transactions.sendSMS-D-R', ['applicants'=>$applicants]);
    }

    public function sendMessageDonorRequest(Request $request)
    {
      $this->validate($request, [
        'message' => 'required',
      [
        'message.required' => 'The message field is required.'
      ]]);
        session()->flash('sms','Message Sent!');
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

}
