<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      $title = 'Welcome to Landing Page!';
      return view('pages.index')->with('title', $title);
    }

    public function indexAC(){
      $title = 'Welcome Activity Coordinator!';
      return view('pages.indexAC')->with('title', $title);
    }

    public function create(){
      return view('applicants.create');
    }

    

}
