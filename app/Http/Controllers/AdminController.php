<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.indexAdmin');
    }

    public function createEmployee()
    {
        return view('Admin/Employees.create');
    }

    public function createCatalog()
    {
        return view('catalog.create');
    }

}
