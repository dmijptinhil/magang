<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inletter;
use App\Outletter;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    	 $masuk = Inletter::orderBy('created_at', 'desc')->paginate(5);
    	 $keluar = Outletter::orderBy('created_at', 'desc')->paginate(5);

         // find the number of item
         $no_all_masuk = Inletter::all()->count();
         $no_all_keluar = Outletter::all()->count();
         $no_today_masuk = Inletter::whereDate('created_at', '=', Carbon::today())->get()->count();
         $no_today_keluar = Outletter::whereDate('created_at', '=', Carbon::today())->get()->count();
         
    	 return view('pages.index', compact('masuk', 'keluar'))
            ->with('no_all_masuk', $no_all_masuk)
            ->with('no_all_keluar', $no_all_keluar)
            ->with('no_today_masuk', $no_today_masuk)
            ->with('no_today_keluar', $no_today_keluar);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keluar = new \App\Outletter;
        $keluar->no_surat = $request->input('no_surat');
        $keluar->klasifikasi = $request->input('klasifikasi');
        $keluar->asal = $request->input('asal');
        $keluar->perihal = $request->input('perihal');
        $keluar->tujuan = $request->input('tujuan');
        $keluar->detail_surat = $request->input('detail_surat');
        $keluar->petugas = $request->input('petugas');
        $keluar->filename = $request->input('filename');
        $keluar->save();
   

        //create surat masuk
        $masuk = new \App\Inletter;
        $masuk->no_surat = $request->input('no_surat');
        $masuk->klasifikasi = $request->input('klasifikasi');
        $masuk->asal = $request->input('asal');
        $masuk->perihal = $request->input('perihal');
        $masuk->tujuan = $request->input('tujuan');
        $masuk->detail_surat = $request->input('detail_surat');
        $masuk->petugas = $request->input('petugas');
        $masuk->filename = $request->input('filename');
        $masuk->save();

        return redirect('/pages.index')->with('keluar', 'masuk');
    }

    public function search(Request $request) {
        $from = $request->input('from');
        $to = $request->input('to');

        $in = Inletter::whereBetween('created_at', [$from, $to])
            ->orderBy('created_at', 'desc')->get();
        $out = Outletter::whereBetween('created_at', [$from, $to])
            ->orderBy('created_at', 'desc')->get();
        return view('pages.search')
            ->with('dateRange', ['from' => $from, 'to' => $to])
            ->with('ins', $in)
            ->with('outs', $out);
    }
}
