<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Disposisi;
use App\Inletter;
use App\TujuanDisposisi;

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
       
     $disposisi = \App\Disposisi::all();
     $sm = \App\Inletter::where('no_surat')->get();

     $tujuan = TujuanDisposisi::where('user_id')->get();

     return view('disposisis.index')
        ->with('disposisi', $disposisi)
        ->with('inletters', $sm)
        ->with('tujuan', $tujuan);
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
        $disposisi->catatan=$request->input('catatan');
        $disposisi->batas_waktu=$request->input('batas_waktu');
        $disposisi->sifat_disposisi=$request->input('sifat_disposisi');
        $disposisi->inletter_id=$request->input('id_inletter');
        $disposisi->user_id = auth()->user()->id;

        $disposisi->save();

        $this->storeTujuanDisposisi($disposisi->id, $request->input('tujuan'));
        
        return redirect('inletters/' . $request->input('id_inletter'))->with('success', 'Information has been added');
    }

    private function storeTujuanDisposisi($disposisi_id, $user_id) {

        $data = [[]];

        for($i = 0; $i < count($user_id); $i++) {
            $data[$i] = ['disposisi_id' => $disposisi_id, 'user_id' => $user_id[$i]];
        }
        
        TujuanDisposisi::insert($data);
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

     $tujuan = TujuanDisposisi::where('disposisi_id', $id)->get();

     return view('disposisis.show')
        ->with('data', $disposisi)
        ->with('no_surat', $sm->no_surat)
        ->with('tujuans', $tujuan);
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
     $tujuan = TujuanDisposisi::where('disposisi_id', $id)->pluck('user_id')->toArray();
     return view('disposisis.edit')->with('disposisi', $disposisi)->with('users', $users)->with('tujuan', $tujuan);
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
        $disposisi->catatan = $request->input('catatan');
        $disposisi->batas_waktu = $request->input('batas_waktu');
        $disposisi->sifat_disposisi = $request->input('sifat_disposisi');
        $disposisi->save();

        $this->emptyTujuanDisposisi($disposisi->id);
        $this->storeTujuanDisposisi($disposisi->id, $request->input('tujuan'));

        return redirect('disposisis/' . $id)->with('sucess', 'Changes are saved');
    }

    private function emptyTujuanDisposisi($disposisi_id) {
        TujuanDisposisi::where('disposisi_id',$disposisi_id)->delete();
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
