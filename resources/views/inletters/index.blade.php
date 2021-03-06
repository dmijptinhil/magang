@extends('layouts.app')

@section('content')
   
@if(count($inletters) > 0)
 	<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-danger">
          <h4 class="card-title ">Surat Masuk</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-danger">
                <th>Tanggal Masuk</th>
                <th>Nomor Surat</th>
	              <th>Asal</th>
	              <th>Perihal</th>
	              <th>Tujuan</th>  
	              <th>File</th>
	              <th>Aksi</th>
              </thead>
              <tbody>
                @foreach($inletters as $inletter)
                  @if(Auth::user()->id == $inletter->tujuan)
                  <tr>
                    <td>{{Common::indDate($inletter->created_at->format('l, d F Y'))}} </td>
                    <td>{{$inletter->no_surat}}</td>
                    <td>{{$inletter->asal}}</td>
                    <td>{{$inletter->perihal}}</td>
                    <td>{{$inletter->getTujuan->name}}</td>
                    @if($inletter->filename == null || $inletter->filename == "")
                      <td>Tidak ada file</td>
                    @else
                      <td><a class="text-danger" href="{{ url('files/' . $inletter->filename) }}">Lihat file</a></td>
                    @endif
                    <td>   <a href="/inletters/{{ $inletter->id}}" class="btn btn-success pull-center">Detail Surat</a>  </td>
                  </tr>
                  @endif
                  @if(Auth::user()->id == 1)
                  <tr>
                    <td>{{Common::indDate($inletter->created_at->format('l, d F Y'))}} </td>
                    <td>{{$inletter->no_surat}}</td>
                    <td>{{$inletter->asal}}</td>
                    <td>{{$inletter->perihal}}</td>
                    <td>{{$inletter->getTujuan->name}}</td>
                    @if($inletter->filename == null || $inletter->filename == "")
                      <td>Tidak ada file</td>
                    @else
                      <td><a class="text-danger" href="{{ url('files/' . $inletter->filename) }}">Lihat file</a></td>
                    @endif
                    <td>   <a href="/inletters/{{ $inletter->id}}" class="btn btn-success pull-center">Detail Surat</a>  </td>
                  </tr>
                  @endif
                @endforeach
              </tbody>
            </table>

            {{ $inletters->links()}}
            @if(Auth::user()->role == 1)
               <a href="/inletters/create" class="btn btn-danger  bottom-left">Tambah Surat</a>      
            @elseif(Auth::user()->role == 3)
               <a href="/inletters/create" class="btn btn-danger  bottom-left">Tambah Surat</a>  
            @endif
            
            </div>
          </div>
        </div>
      </div>      
		</div>
  </div>
  
@else
  <div class="col-lg-8 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">info_outline</i>
        </div>
        <p class="card-category"> Surat Masuk</p>
          <h3 class="card-title">
            tidak ada surat masuk <br>
            <a href="/inletters/create" class="btn btn-danger  bottom-left">Tambah Surat</a>
          </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">local_offer</i> Total Keseluruhan
        </div>
      </div>
    </div>
  </div>
@endif

@endsection