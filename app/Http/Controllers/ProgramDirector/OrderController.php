<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Volunteer;
use App\Models\MessageOrders;
use App\Models\Order;
use App\Models\Points;
use App\Models\PointsLog;
use DB;
use Auth;
use App\Services\PayUService\Exception;

class OrderController extends Controller
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
      if (request()->has('status')){
      $order = Transaction::orderBy('updated_at', 'desc')
      -> where('status',request('status'))
      -> where('type', 'Shop')
      -> paginate(0)->appends('status', request('status'));
      } else {
        $order = Transaction::orderBy('updated_at', 'desc')
        -> where('type', 'Shop')
        -> paginate(0);
      }
    //  $messageOrder = MessageOrders::all()->last();
      return view('ProgramDirector/Transactions.orders',compact('order', 'messageOrder'));
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
      $order = Transaction::find($id);
      $volunteer = Volunteer::all();
      return view('ProgramDirector/Transactions.editOrder', compact('order', 'volunteer'));
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

        $order = Transaction::find($id);
      if($order->status == "Delivered" || $order->status == "Cancelled"){
        return back();
      }else{
        if ($request->input('status') == 'Delivered') {
          $order = Transaction::find($id);
          $order->status = $request->input('status');
          $order->volunteerID = $request->input('volunteer');
          $order->save();

        return redirect('/programdirector/orders')->with('success', 'Profile updated');
      }else {
        $order = Transaction::find($id);
        $order->status = $request->input('status');
        $order->volunteerID = $request->input('volunteer');

        $order->save();
        return redirect('/programdirector/orders')->with('success', 'Profile updated');
            }
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
