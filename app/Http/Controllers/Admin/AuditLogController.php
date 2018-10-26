<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class AuditLogController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function auditlogs()
  {
    if (request()->has('log_name')){
    $lastActivity = Activity::select('*')
    -> where('log_name',request('log_name'))
    -> paginate();
    } else {
    $lastActivity = Activity::select('*')
    -> paginate();
    }

    return view('Admin/Audits.index', compact('lastActivity'));
  }

}
