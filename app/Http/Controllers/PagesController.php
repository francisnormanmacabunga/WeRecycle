<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\userTable;

class PagesController extends Controller
{
    public function index(){

      $volunteersCount = userTable::SELECT('*')
      ->where('status', 'Activated')
      ->where('usertypeID', '2')
      ->get();
      return view('pages.index', compact('volunteersCount'));
      //return view('pages.index');
    }

    public function createApplicant()
    {
      return view('applicants.create');
    }

    public function createDonor(){
      return view('users.create');
    }

    public function auditlogs(){

      $audits = \OwenIt\Auditing\Models\Audit::with('user')
      ->orderBy('created_at', 'desc')
      ->get();

      //dd($audits);

      return view('audits.index', ['audits' => $audits]);

    }

}
