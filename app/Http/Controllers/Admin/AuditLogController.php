<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\DB;

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
}
