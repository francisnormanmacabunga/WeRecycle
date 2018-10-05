<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userTable;
use DB;

class Test extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (request()->has('status')){
        $applicants = userTable::SELECT('*')
        -> join('contacts', 'contacts.userID', '=', 'user.userID')
        -> where('status',request('status'))
        -> where('usertypeID', '2')
        -> sortable()
        -> paginate(5)->appends('status', request('status'));
      } else {
        $applicants = userTable::SELECT('*')
        -> join('contacts', 'contacts.userID', '=', 'user.userID')
        -> where('usertypeID', '2')
        -> sortable()
        -> paginate(5);
      }

        return view('index', compact('applicants'));
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
      $applicants = userTable::find($id);
      return view('edit', compact('applicants'));
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
      $post = userTable::find($id);
      $post->status = $request->input('status');
      $post->save();
      return redirect('/test')->with('success', 'Profile updated');
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
