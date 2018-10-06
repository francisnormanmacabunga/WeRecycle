<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\userTable;
use Roketin\Auditing\Log;
use Spatie\Activitylog\Models\Activity;


class PagesController extends Controller
{
    public function index()
    {
      $volunteersCount = userTable::SELECT('*')
      ->where('status', 'Activated')
      ->where('usertypeID', '2')
      ->get();
      return view('pages.index', compact('volunteersCount'));
    }

    public function createApplicant()
    {
      return view('applicants.create');
    }

    public function createDonor(){
      return view('users.create');
    }

    public function auditlogs()
    {
      /*$logs = Log::with(['user'])->get();
      //dd($logs);
      return view('audits.index', ['logs' => $logs]);*/

      $activity = Activity::all()->last();
      //dd($lastActivity);

      return view('audits.index', compact('activity'));
    }

    public function index2()
    {
      $volunteersCount = userTable::SELECT('*')
      ->where('status', 'Activated')
      ->where('usertypeID', '2')
      ->get();

      return view('pages.index2', compact('volunteersCount'));
    }

}
