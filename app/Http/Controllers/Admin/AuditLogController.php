<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AuditLogController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function auditlogs()
  {
    if (request()->has('log_name')){
      $lastActivity = Activity::orderBy('updated_at', 'desc')
      -> where('log_name', request('log_name'))
      -> get();
    } else {
      $lastActivity = Activity::orderBy('updated_at', 'desc')
      -> get();
    }
    return view('Admin/Audits.index', compact('lastActivity'));
  }

  public function auditlogsFilter(Request $request)
  {
      date_default_timezone_set('Asia/Manila');
      $start = Carbon::parse($request->start)->startOfDay();
      $end = Carbon::parse($request->end)->endOfDay();

      $lastActivity = Activity::orderBy('updated_at', 'desc')
      -> whereBetween('updated_at', array(new Carbon($start), new Carbon($end)))
      -> get();

      return view('Admin/Audits.index', compact('lastActivity'));
  }


}
