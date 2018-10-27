<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inletter;
use App\User;
use App\Disposisi;
use DB;
use Illuminate\Support\Facades\File;

class InlettersController extends Controller
{   
     /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

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
        $users = User::all()->except([1, 3, 13]);
        return view ('inletters.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //create surat masuk
        $inletter = new \App\Inletter;
        $inletter->no_surat = $request->input('no_surat');
        $inletter->klasifikasi = $request->input('klasifikasi');
        $inletter->asal = $request->input('asal');
        $inletter->perihal = $request->input('perihal');
        $inletter->tujuan = $request->input('tujuan');
        $inletter->detail_surat = $request->input('detail_surat');
        $inletter->petugas = $request->input('petugas');
        $inletter->date = $request->input('date');
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
     $users = User::all()->except([1, 3, 13]);
     return view('inletters.edit')->with('inletter', $inletter)->with('users', $users);
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
        $inletter->date = $request->input('date');
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


    public function upload($id_inletter){
        return view('/inletters.up')->with('id_inletter', $id_inletter);
    }

    public function up(Request $request) {
        if($request->hasFile('filename')) {
            $filenameWithExt = $request->file('filename')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('filename')->getClientOriginalExtension();
            $newFileName = $filename . '_' . time() . '.' . $ext;
            $path = $request->file('filename')->move(public_path('files'), $newFileName);

            $inletter = Inletter::find($request->input('suratmasuk_id'));
            $inletter->filename = $newFileName;
            $inletter->save();

            return redirect('/inletters/' . $request->input('suratmasuk_id'))
                ->with('inletter', $inletter)
                ->with('success', "File is uploaded successfully");
        }else{
            return 'FAILED FAILED FAILED FAILED FAILED';
        }
    }
    
    // public function download() {

    //     return response()->download('/files/to/file.pdf', 'example.pdf', [], 'inline');
    // }
   public function deleteFile($letter_id, $filename) {
    File::delete(public_path('files/' . $filename));

    $il = Inletter::find($letter_id);
    $il->filename = null;
    $il->save();

    return redirect('inletters/' . $letter_id)->with('success', 'File is deleted successfully');
}
}
