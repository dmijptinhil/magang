<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outletter;
use DB;
use App\User;
use Illuminate\Support\Facades\File;

class OutlettersController extends Controller
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
     
        $outletters = Outletter::orderBy('created_at', 'desc')->paginate(10);

        return view('outletters.index', compact('outletters'));
    }

    public function upload($id_outletter){
        return view('/outletters.up')->with('id_outletter', $id_outletter);
    }

    public function up(Request $request) {
        if($request->hasFile('filename')) {
            $filenameWithExt = $request->file('filename')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('filename')->getClientOriginalExtension();
            $newFileName = $filename . '_' . time() . '.' . $ext;
            $path = $request->file('filename')->move(public_path('files'), $newFileName);

            $outletter = Outletter::find($request->input('suratmasuk_id'));
            $outletter->filename = $newFileName;
            $outletter->save();

            return redirect('/outletters/' . $request->input('suratmasuk_id'))
                ->with('outletter', $outletter)
                ->with('success', "File is uploaded successfully");
        }else{
            return 'FAILED FAILED FAILED FAILED FAILED';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view ('outletters.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $outletter = new \App\Outletter;
        $outletter->no_surat = $request->input('no_surat');
        $outletter->klasifikasi = $request->input('klasifikasi');
        $outletter->asal = $request->input('asal');
        $outletter->perihal = $request->input('perihal');
        $outletter->tujuan = $request->input('tujuan');
        $outletter->detail_surat = $request->input('detail_surat');
        $outletter->petugas = $request->input('petugas');
        $outletter->date = $request->input('date');
        $outletter->user_id = auth()->user()->id;
        $outletter->save();

        return redirect('/outletters')->with('sucess', 'Surat Berhasil diinput');
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
        $outletter = Outletter::find($id); 
        return view('outletters.show')->with('outletter', $outletter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outletter = Outletter::find($id); 
        $users = User::all();
        return view('outletters.edit')->with('outletter', $outletter)->with('users', $users);
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
        $outletter = Outletter::find($id);
        $outletter->no_surat = $request->input('no_surat');
        $outletter->klasifikasi = $request->input('klasifikasi');
        $outletter->asal = $request->input('asal');
        $outletter->perihal = $request->input('perihal');
        $outletter->tujuan = $request->input('tujuan');
        $outletter->detail_surat = $request->input('detail_surat');
        $outletter->petugas = $request->input('petugas');
        $outletter->filename = $request->input('filename');
        $outletter->save();

        return redirect('/outletters')->with('update', 'Surat Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outletter = Outletter::find($id);
        $outletter->delete();

        return redirect('/outletters')->with('delete');
    }

    public function deleteFile($letter_id, $filename) {
    File::delete(public_path('files/' . $filename));
    
    $ol = Outletter::find($letter_id);
    $ol->filename = null;
    $ol->save();

    return redirect('outletters/' . $letter_id)->with('success', 'File is deleted successfully');
}

}
