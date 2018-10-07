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
    $lastActivity = Activity::all();
    return view('Admin/Audits.index', compact('lastActivity'));
  }

}
