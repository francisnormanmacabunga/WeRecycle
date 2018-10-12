<?php

namespace App\Http\Controllers\ProgramDirector;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Order;
use DB;

class VolunteersController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:programdirector');
    }

    public function requests()
    {
      $request = Transaction::SELECT('*')
      -> where('type', 'Donate')
      -> get();

      return view('ProgramDirector/ManageVolunteers.requests',compact('request'));
    }

    public function orders()
    {
      $order = Transaction::SELECT('*')
      -> where('type', 'Shop')
      -> get();

      return view('ProgramDirector/ManageVolunteers.orders',compact('order'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
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
      return view('ProgramDirector/ManageVolunteers.edit', compact('order'));
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
      $order->status = $request->input('status');
      $order->save();
      return redirect('/programdirector/viewRequests')->with('success', 'Profile updated');
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
