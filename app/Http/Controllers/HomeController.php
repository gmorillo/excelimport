<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use File;
use Illuminate\Support\Facades\DB;

//use App\Imports\SigorImport;
//use App\Imports\RecordImport;

use Illuminate\Support\Str;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('sections.home.main');
    }

    public function admin()
    {
        return view('sections.administracion.admin-menu.main-admin-menu');
    }

    
}
