<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class PagesController extends Controller
{
    public function index(){
      return view('pages.index');
    }

    public function createApplicant(){
      return view('applicants.create');
    }

    public function createDonor(){
      return view('users.create');
    }

    public function sms(){
      return view('activity_coordinators.sms');
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
