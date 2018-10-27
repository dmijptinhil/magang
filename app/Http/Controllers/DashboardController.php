<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Inletter;
use App\Outletter;
use App\Disposisi;
use Carbon\Carbon;
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
        //variabel surat masuk hari ini
        $masuk = Inletter::where('tujuan', '=', auth()->user()->id)->whereDate('created_at', '=', Carbon::today())->paginate(5);
        //variabel surat keluar hari ini
        $keluar = Outletter::where('tujuan', '=', auth()->user()->id)->whereDate('created_at', '=', Carbon::today())->paginate(5);
        //variabel untuk menghitung jumlah surat
        $no_all_masuk = Inletter::all()->count();
        $no_all_keluar = Outletter::all()->count();
        $no_all_disposisi = Disposisi::all()->count();
        $no_today_masuk = Inletter::whereDate('created_at', '=', Carbon::today())->get()->count();
        $no_today_keluar = Outletter::whereDate('created_at', '=', Carbon::today())->get()->count();
        
        return view('dashboard', compact('masuk', 'keluar'))
            ->with('no_all_masuk', $no_all_masuk)
            ->with('no_all_keluar', $no_all_keluar)
            ->with('no_all_disposisi', $no_all_disposisi)
            ->with('no_today_masuk', $no_today_masuk)
            ->with('no_today_keluar', $no_today_keluar);
    }

    public function search(Request $request) {
        //keywoard untuk mencari surat
        $keywoard = $request->input('from');
        //cari surat masuk
        $in = Inletter::where('no_surat', 'like', '%'. $keywoard. '%')->orWhere('asal','like', '%'. $keywoard. '%')->orWhere('tujuan','like', '%'. $keywoard. '%')->orWhere('perihal','like', '%'. $keywoard. '%')->orWhere('detail_surat','like', '%'. $keywoard. '%')->orderBy('created_at', 'desc')->get();
        //cari surat keluar
        $out = Outletter::where('no_surat', 'like', '%'. $keywoard. '%')->orWhere('asal','like', '%'. $keywoard. '%')->orWhere('tujuan','like', '%'. $keywoard. '%')->orWhere('perihal','like', '%'. $keywoard. '%')->orWhere('detail_surat','like', '%'. $keywoard. '%')->orderBy('created_at', 'desc')->get();
        return view('pages.search')
            ->with('ins', $in)
            ->with('outs', $out);
    }
}
