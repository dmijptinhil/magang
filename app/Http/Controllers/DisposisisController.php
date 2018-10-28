<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Disposisi;
use App\Inletter;

class DisposisisController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
      $disposisis=\App\Disposisi::all();
      return view('disposisis.create', compact('disposisis', $user->disposisis));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_inletter)
    {
       $users = User::all()->except([1, 3, 2]);
       return view('disposisis/create')->with('id_inletter', $id_inletter)->with('users', $users);
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $disposisi= new \App\Disposisi;
        $disposisi->tujuan = serialize($request->input('tujuan'));
        $disposisi->catatan=$request->input('catatan');
        $disposisi->batas_waktu=$request->input('batas_waktu');
        $disposisi->sifat_disposisi=$request->input('sifat_disposisi');
        $disposisi->inletter_id=$request->input('id_inletter');
        $disposisi->user_id = auth()->user()->id;

        $disposisi->save();
        
        return redirect('inletters/' . $request->input('id_inletter'))->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $disposisi = \App\Disposisi::find($id);
       $sm = \App\Inletter::find($disposisi->inletter_id);
       return view('disposisis.show')->with('data', $disposisi)
       ->with('no_surat', $sm->no_surat);
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $disposisi = Disposisi::find($id); 
       $users = User::all()->except([1, 3, 2]);
       return view('disposisis.edit')->with('disposisi', $disposisi)->with('users', $users);
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
        $disposisi = Disposisi::find($id);
        $disposisi->tujuan = serialize($request->input('tujuan'));
        $disposisi->catatan = $request->input('catatan');
        $disposisi->batas_waktu = $request->input('batas_waktu');
        $disposisi->sifat_disposisi = $request->input('sifat_disposisi');
        $disposisi->save();

        return redirect('disposisis/' . $id)->with('sucess', 'Changes are saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disposisi = Disposisi::find($id);
        $disposisi->delete();
        return redirect('inletters')->with('delete', 'Post Berhasil dihapus');
    }
}
