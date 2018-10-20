<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Inletter;
class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard')->with('no_all_input', 3);
    }
}
