<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Inletter;
use App\Outletter;
use App\Disposisi;
use DB;

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
         $masuk = Inletter::orderBy('created_at', 'desc')->paginate(5);
         $keluar = Outletter::orderBy('created_at', 'desc')->paginate(5);
         $users = User::orderBy('id', 'asc')->paginate(5);
         
        $no_all_masuk = Inletter::all()->count();
        $no_all_keluar = Outletter::all()->count();
        $no_all_disposisi = Disposisi::all()->count();
         return view('dashboard', compact('masuk', 'keluar'))
            ->with('no_all_masuk', $no_all_masuk)
            ->with('no_all_keluar', $no_all_keluar)
            ->with('no_all_disposisi', $no_all_disposisi);
    }
}
