@extends('layouts.app')

@section('content')

<div class="content">
 <div class=container-fluid">
   <div class="row">
     <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-danger">
          <h4 class="card-title ">Tabel Surat Masuk</h4>
          <p class="card-category">Surat ini masuk pada tanggal {{ $inletter->date }} dan diinputkan pada tanggal {{$inletter->created_at->format('F d, Y h:ia') }}</p>
        </div>
        <div class="card-body">
          <div id="typography">
            <div class="row">
              <div class="tim-typo">
                <h4>
                  <span class="tim-note">Nomor Surat</span>{{$inletter->no_surat}}</h4>
                </div>
                <div class="tim-typo">
                  <h4>
                    <span class="tim-note">Klasifikasi Surat</span>{{$inletter->klasifikasi}}</h4>
                  </div>
                  <div class="tim-typo">
                    <h4>
                      <span class="tim-note">Asal Surat</span>{{$inletter->asal}}</h4>
                    </div>
                    <div class="tim-typo">
                      <h4>
                        <span class="tim-note">Perihal Surat</span>{{$inletter->perihal}}</h4>
                      </div>
                      <div class="tim-typo">
                        <h4>
                          <span class="tim-note">Tujuan Surat</span>{{$inletter->tujuan}}</h4>
                        </div>
                        <div class="tim-typo">
                          <p>
                            <span class="tim-note">Ringkasan Surat</span>{{$inletter->detail_surat}}</p>
                          </div>
                          <div class="tim-typo">
                            <h4>
                              <span class="tim-note">Petugas</span>{{$inletter->petugas}}</h4>
                            </div>
                            <div class="tim-typo">
                              <h4>

                                @if($inletter->filename == null || $inletter->filename == "")
                                <span class="tim-note">File Surat</span>Tidak ada file</h4>
                                @else
                                <span class="tim-note">File Surat</span><a href="{{ url('files/' . $inletter->filename) }}">Download file</a></h4>
                                @endif

                              </div>
                              <div class="tim-typo">
                                <h3>
                                  <span class="tim-note">Disposisi Surat</span>


                                  @if($inletter->disposisi)

                                  {{-- Disposisi ada, tampilkan tombol lihat disposisi --}}
                                  <a style="background-color: green" href="{{ route('disposisis.show', $inletter->disposisi->id)}} " class="btn btn-info pull-left" style="margin-right: 3px; ">Lihat disposisi</a>

                                  @else

                                  {{-- Disposisi TIDAK ada. Check apakah pimpinan atau bukan --}}
                                  @if(Auth::user()->role == 2)

                                  {{-- Login sebagai pimpinan, tampilkan tombol tambah disposisi --}}
                                  <a href="{{ route('add_disposisi', $inletter->id)}}" class="btn btn-warning bottom-left"><i class="material-icons">add</i>Tambah Disposisi</a>  

                                  @else

                                  {{-- Login BUKAN sebagai pimpinan, tampilkan pesan tidak ada disposisi --}}
                                  <p>Tidak ada disposisi</p>

                                  @endif

                                  @endif


                                  {{-- True jika file tidak ada, DAN login sebagai pimpinan --}}
                                  @if($inletter->filename == null && Auth::user()->role == 2)

                                  <a href="{{ route('uploadFileIn', $inletter->id)}}" class="btn btn-warning bottom-left"><i class="material-icons">add</i>Insert an attachment</a>  

                                  @endif



                                </h3>
                              </div>
                            </div>
                            <a href="/inletters/{{$inletter->id}}/edit" class="btn btn-success bottom-left">Edit</a>
                            {!!Form::open(['action' => ['InlettersController@destroy', $inletter->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Hapus',['class' => 'btn btn-danger bottom-left'])}}
                            {!!Form::close()!!}
                          </div>
                        </div>
                      </div>
                      <a href="/inletters" class="btn btn-danger pull-right">Kembali</a>  
                    </div>
                  </div>
                </div>

                @endsection