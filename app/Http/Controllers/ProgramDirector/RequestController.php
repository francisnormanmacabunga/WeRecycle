<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\MessageRequests;
use App\Models\Volunteer;
use App\Models\Order;
use App\Models\Employee;
use App\Models\Points;
use App\Models\PointsLog;
use DB;

class RequestController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:programdirector');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $request = Transaction::orderBy('updated_at', 'desc')
      -> where('type', 'Donate')
      -> paginate(10);

      $message = MessageRequests::all()->last();

      return view('ProgramDirector/Transactions.requests',compact('request', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $request = Transaction::find($id);
      $volunteer = Volunteer::where('status','Activated')
      ->get();
      return view('ProgramDirector/Transactions.editRequest', compact('request', 'volunteer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if ($request->input('status') == 'Delivered') {
        $order = Transaction::find($id);
        $order->status = $request->input('status');
        $order->volunteerID = $request->input('volunteer');
        $order->save();

        /*foreach ($order as $o) {
            $cart = json_decode($o->cart);
        foreach($cart as $c){
             for ($i = 0; $i = 1000; $i+=2) {
        }
      }*/

        $randompoints = 5;
        $id = $order->userID;
        $points = Points::where('userID',$id)->first();
        $points->pointsaccumulated = $points->pointsaccumulated + $randompoints;
        $points->userID = $id;
        $points->push();


        $plog = new PointsLog;
        $plog->userID = $id;
        $plog->activity = 'Donated';
        $plog->points = $randompoints;
        $plog->save();

      return redirect('/programdirector/orders')->with('success', 'Profile updated');
    }else {
      $order = Transaction::find($id);
      $order->status = $request->input('status');
      $order->volunteerID = $request->input('volunteer');

      $order->save();
      return redirect('/programdirector/orders')->with('success', 'Profile updated');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
