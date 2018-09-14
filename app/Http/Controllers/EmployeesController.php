<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usertypeTable;
use DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$usertype = usertypeTable::all();
      $usertype = DB::table('usertype')->pluck('usertype');
      return view('employees.index', compact('usertype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //$dropdown = DB::table('usertype')->pluck('usertype', 'userID')->all();
      $dropdown = usertypeTable::all();
      return view('employees.create',compact('dropdown'));

      // $test= usertypeTable::select('usertypeID','usertype')->get();
      // return view('employees.create')->with('test', $test);
      // $usertype = DB::table('usertype')->pluck('usertypeID');
      // return view('employees.create', compact('usertype'));
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
        //
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
        //
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
