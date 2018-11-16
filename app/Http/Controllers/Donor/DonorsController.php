<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Models\Contacts;
use App\Models\Donor;
use App\Models\Points;
use App\Models\Reward;
use App\Models\PointsLog;
use Exception;
use Session;
use Hash;
use Auth;
use DB;
use Carbon\Carbon;

class DonorsController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:donor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $width = Points::where('userID',Auth::user()->userID)->first();
      $donors = Auth::user();
      return view('Donor/Profile.index')->with(['donors' => $donors])->with('width',$width);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

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
      $width = Points::where('userID',Auth::user()->userID)->first();
      $donors = Donor::with('contacts')->find(Auth::user()->userID);
      return view('Donor/Profile.edit', compact('donors'))->with('width',$width);
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
      $this->validate($request, [
      'firstname' => 'regex:/^[a-zA-Z-. ]*$/',
      'lastname' => 'regex:/^[a-zA-Z-. ]*$/',
      'email' => "unique:user,email,$id".$request->get('userID').',userID',
      'birthdate' => 'before:'.Carbon::now()->subYears(15),
      'cellNo' => 'min:13|max:13|regex:/^\+63[0-9]{10}$/',
      'tellNo' => 'min:7|max:7',
      'city' => 'regex:/^[\pL\s]+$/u',
      'street' => 'nullable|regex:/^[a-zA-Z0-9,.!? ]*$/',
      'barangay' => 'nullable|regex:/^[a-zA-Z0-9,.!? ]*$/',
      'zip' => 'nullable|min:4|max:4',
      'username' => "alpha_dash|unique:user,username,$id".$request->get('userID').',userID',
    ],
    [
      'firstname.regex' => 'The First Name fieldmust only contain letters, period, and hyphen.',
      'lastname.regex' => 'The Last Name field must only contain letters, period, and hyphen.',
      'email.unique' => 'The Email you registered is already in use.',
      'cellNo.min' => 'The Cellphone field must be at least 13 characters.',
      'cellNo.max' => 'The Cellphone field may not be greater than 13 characters.',
      'cellNo.regex' => 'Incorrect cellphone number format (e.g +63XXXXXXXXXX)',
      'tellNo.min' => 'The Telephone field must be at least 7 characters.',
      'tellNo.max' => 'The Telephone field may not be greater than 7 characters.',
      'city.regex' => 'The City field must only contain letters.',
      'street.regex' => 'The Street field must only contain letters, numbers, period, and comma.',
      'barangay.regex' => 'The Barangay field must only contain letters, numbers, period, and comma.',
      'zip.min' => 'The Zip field must be at least 4 characters.',
      'zip.max' => 'The Zip field may not be greater than 4 characters.',
      'username.unique' => 'The Username you registered is already in use.',
      'username.alpha_dash' => 'The Username may only contain letters, numbers, dashes and underscores.',
    ]);
      $donors = Donor::find(Auth::user()->userID);
      $donors->username = $request->input('username');
      $donors->firstname = $request->input('firstname');
      $donors->lastname = $request->input('lastname');
      $donors->email = $request->input('email');
      $donors->contacts->cellNo = $request->input('cellNo');
      $donors->contacts->tellNo = $request->input('tellNo');
      $donors->birthdate = $request->input('birthdate');
      $donors->city = $request->input('city');
      $donors->street = $request->input('street');
      $donors->barangay = $request->input('barangay');
      $donors->zip = $request->input('zip');
      $donors->push();

      return redirect('/donor/donors')->with('success','Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

    }

    public function redeemcode(Request $request,$id){
      $reward = new Reward;
      $random = str_random(6);
      $reward->code = $random;
      $reward->status = 'Activated';
      $reward->userID = Auth::user()->userID;
      $reward->save();

      $id = $request->id;
      $points= Points::where('userID',$id)->first();
      $points->pointsaccumulated = '0';
      $points->push();

      $plog = new PointsLog;
      $plog->userID = Auth::user()->userID;
      $plog->activity = 'Redeem';
      $plog->points = '-100';
      $plog->save();

      session()->flash('cod','Your code is '.$random.'');
       return back();
    }

}
