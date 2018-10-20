<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inletter;
use App\User;
use App\Disposisi;
use DB;
class InlettersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $inletters = Inletter::orderBy('created_at', 'desc')->paginate(10);

        return view('inletters.index', compact('inletters'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('inletters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'no_surat' => 'required',
        //     'asal' => 'required',
        //     'perihal' => 'required',
        //     'detail_surat' => 'required'
        // ]);
    //create surat masuk
        $inletter = new \App\Inletter;
        $inletter->no_surat = $request->input('no_surat');
        $inletter->klasifikasi = $request->input('klasifikasi');
        $inletter->asal = $request->input('asal');
        $inletter->perihal = $request->input('perihal');
        $inletter->tujuan = $request->input('tujuan');
        $inletter->detail_surat = $request->input('detail_surat');
        $inletter->petugas = $request->input('petugas');
        $inletter->filename = $request->input('filename');
        $inletter->user_id = auth()->user()->id;
        $inletter->save();

        return redirect('/inletters')->with('sucess', 'Surat Berhasil diinput');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //eloquent
        $inletter = Inletter::find($id); 
        return view('inletters.show')->with('inletter', $inletter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $inletter = Inletter::find($id); 
        return view('inletters.edit')->with('inletter', $inletter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inletter = Inletter::find($id);
        $inletter->no_surat = $request->input('no_surat');
        $inletter->klasifikasi = $request->input('klasifikasi');
        $inletter->asal = $request->input('asal');
        $inletter->perihal = $request->input('perihal');
        $inletter->tujuan = $request->input('tujuan');
        $inletter->detail_surat = $request->input('detail_surat');
        $inletter->petugas = $request->input('petugas');
        $inletter->filename = $request->input('filename');
        $inletter->save();

        return redirect('/inletters')->with('update', 'Surat Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inletter = Inletter::find($id);
        $inletter->delete();
        return redirect('/inletters')->with('delete', 'Post Berhasil dihapus');
    }
}
