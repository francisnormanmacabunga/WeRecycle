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

<<<<<<< HEAD
      //dd($audits);
=======
      $audits = userTable::first();
      //$all = audits()->with('userTable')->get();
      //$userTable = userTable;
      //$all = $userTable->audits;
      //$audits = $donors->audits()->with('user')->get();
      //$audits = userTable::find(1);
      //$audits = userTable::with('audits.userTable'->find($model->getKey());
      return view('audits.index', compact('audits'));
    }

    public function index2(){
      $volunteersCount = userTable::SELECT('*')
      ->where('status', 'Activated')
      ->where('usertypeID', '2')
      ->get();

      return view('pages.index2', compact('volunteersCount'));
    }

    //public function createEmployee(){
      //return view('employees.create');
    //}

    //public function createCatalog(){
      //return view('catalog.create');
    //}

    //public function createFeedback(){
      //return view('usersFeedback.create');
    //}

    //public function login(){
      //return view('login.login');
    //}

    //public function indexUser(){
        //return view('pages.indexUser');
    //}

    //public function indexAC(){
      //return view('pages.indexAC');
    //}
>>>>>>> 4f8730ee4ca7d81b669bd5cb1fe2fe8a7f9c5089

      return view('audits.index', ['audits' => $audits]);

    }

}
