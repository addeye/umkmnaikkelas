<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        if(\Auth::user())
        {
            if(\Auth::user()->role_id==ROLE_ADMIN)
            {
                return view('home');
            }
        }
        return view('welcome');
         
    }

    public function portal()
    {
        return view('welcome');
    }
}
