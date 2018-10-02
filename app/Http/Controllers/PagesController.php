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

      //$audits = Audit::all();
      //$all = audits()->with('userTable')->get();
      //$userTable = userTable;
      //$all = $userTable->audits;
      //$audits = $donors->audits()->with('user')->get();
      //$audits = userTable::find(1);
      //$audits = userTable::with('audits.userTable'->find($model->getKey());
      return view('audits.index', compact('audits'));
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

    //public function indexPD(){
      //return view('pages.indexPD');
    //}

    //public function indexAdmin(){
      //return view('pages.indexAdmin');
    //}

}
