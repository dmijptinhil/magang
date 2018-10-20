@extends('layouts.app')

@section('content')

<div class="content">
 <div class=container-fluid">
   <div class="row">
     <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-danger">
          <h4 class="card-title ">Tabel Surat Masuk</h4>
          <p class="card-category">Surat ini masuk pada tanggal {{ $outletter->date }} dan diinputkan pada tanggal {{$outletter->created_at->format('F d, Y h:ia') }}</p>
        </div>
        <div class="card-body">
          <div id="typography">
            <div class="row">
              <div class="tim-typo">
                <h4>
                  <span class="tim-note">Nomor Surat</span>{{$outletter->no_surat}}</h4>
                </div>
                <div class="tim-typo">
                  <h4>
                    <span class="tim-note">Klasifikasi Surat</span>{{$outletter->klasifikasi}}</h4>
                  </div>
                  <div class="tim-typo">
                    <h4>
                      <span class="tim-note">Asal Surat</span>{{$outletter->asal}}</h4>
                    </div>
                    <div class="tim-typo">
                      <h4>
                        <span class="tim-note">Perihal Surat</span>{{$outletter->perihal}}</h4>
                      </div>
                      <div class="tim-typo">
                        <h4>
                          <span class="tim-note">Tujuan Surat</span>{{$outletter->tujuan}}</h4>
                        </div>
                        <div class="tim-typo">
                          <p>
                            <span class="tim-note">Ringkasan Surat</span>{{$outletter->detail_surat}}</p>
                          </div>
                          <div class="tim-typo">
                            <h4>
                              <span class="tim-note">Petugas</span>{{$outletter->petugas}}</h4>
                            </div>
                            <div class="tim-typo">
                              <h4>

                                @if($outletter->filename == null || $outletter->filename == "")
                                <span class="tim-note">File Surat</span>Tidak ada file</h4>
                                @else
                                <span class="tim-note">File Surat</span><a href="{{ url('files/' . $outletter->filename) }}">Download file</a></h4>
                                @endif

                              </div>
                              <div class="tim-typo">
                                <h3>
                                  <span class="tim-note">Disposisi Surat</span>


                                  {{-- True jika file tidak ada, DAN login sebagai pimpinan --}}
                                  @if($outletter->filename == null && Auth::user()->role == 2)

                                  <a href="{{ route('uploadFileOut', $outletter->id)}}" class="btn btn-warning bottom-left"><i class="material-icons">add</i>Insert an attachment</a>  

                                  @endif



                                </h3>
                              </div>
                            </div>
                            <a href="/outletters/{{$outletter->id}}/edit" class="btn btn-success bottom-left">Edit</a>
                            {!!Form::open(['action' => ['OutlettersController@destroy', $outletter->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Hapus',['class' => 'btn btn-danger bottom-left'])}}
                            {!!Form::close()!!}
                          </div>
                        </div>
                      </div>
                      <a href="/outletters" class="btn btn-danger pull-right">Kembali</a>  
                    </div>
                  </div>
                </div>

                @endsection