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
        return view('admins.index');
    }

    public function createEmployee()
    {
        return view('employees.create');
    }

    public function employees()
    {
        return view('employees.index');
    }

    public function createCatalog()
    {
        return view('catalog.create');
    }

    public function catalog()
    {
        return view('catalog.index');
    }

    public function feedback()
    {
        return view('usersFeedback.index');
    }


}
