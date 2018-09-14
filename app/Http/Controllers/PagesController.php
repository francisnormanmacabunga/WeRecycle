<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      return view('pages.index');
    }

    public function indexUser(){
      return view('pages.indexUser');
    }

    public function indexAC(){
      return view('pages.indexAC');
    }

    public function indexPD(){
      return view('pages.indexPD');
    }

    public function indexAdmin(){
      return view('pages.indexAdmin');
    }

    public function createDonor(){
      return view('users.create');
    }

    public function createApplicant(){
      return view('applicants.create');
    }

    public function createActivityCoordinator(){
      return view('activity_coordinators.create');
    }

    public function createProgramDirector(){
      return view('program_directors.create');
    }

}
