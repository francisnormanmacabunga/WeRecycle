<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function createAC()
    {
        return view('Admin/Employees/AC.create');
    }

    public function createPD()
    {
        return view('Admin/Employees/PD.create');
    }

    public function createCatalog()
    {
        return view('Admin/Catalog.create');
    }

}
