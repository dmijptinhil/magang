@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header card-header-danger">
        <h2 class="card-title ">Surat Masuk</h2>
        <h4 class="card-category">
          Surat ini diinputkan oleh : {{$inletter->petugas}}
          <br>
          Hari :
          {{$inletter->created_at->format('l') }}
          <br>
          Tanggal :
          {{$inletter->created_at->format('d F Y') }}
        </h4>
      </div>
      <div class="card-body">
        <div id="typography">
          <div class="row">
          </div>
            
            @if(Auth::user()->role == 3)
              <a href="/inletters/{{$inletter->id}}/edit" class="btn btn-success bottom-left">Edit</a>
              {!!Form::open(['action' => ['InlettersController@destroy', $inletter->id], 'method' => 'POST'])!!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Hapus',['class' => 'btn btn-danger bottom-left'])}}
            @endif
            @if(Auth::user()->role == 1)
              <a href="/inletters/{{$inletter->id}}/edit" class="btn btn-success bottom-left">Edit</a>
              {!!Form::open(['action' => ['InlettersController@destroy', $inletter->id], 'method' => 'POST'])!!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Hapus',['class' => 'btn btn-danger bottom-left'])}}
            @endif
            {!!Form::close()!!}
          </div>
        </div>
      </div>                       
    </div> 
 
   <div class="col-md-8">
      <div class="card card-chart">
        <div class="card-header card-header-success">
          <div class="ct-chart">Detail Surat</div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Nomor Surat : {{$inletter->no_surat}}</h4>
          <h4 class="card-title">Klasifikasi Surat :{{$inletter->klasifikasi}} </h4>
          <h4 class="card-title">Asal Surat  : {{$inletter->asal}}</h4>
          <h4 class="card-title">Perihal Surat : {{$inletter->perihal}}</h4>
          <h4 class="card-title">Tujuan Surat : {{$inletter->tujuan}}</h4>
          <h4 class="card-title">Ringkasan Surat : <br>{{$inletter->detail_surat}}</h4>  
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i>terakhir diperbarui
          </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
  <!-- FILE SURAT -->
  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-warning card-header-icon">
        <div class="card-icon">
          <i class="material-icons">content_copy</i>
        </div>
          <p class="card-category">File Surat</p>
          <h3 class="card-title">
            @if($inletter->filename == null && $inletter->filename == "")
              @if(Auth::user()->role != 2)
                <a href="{{ route('uploadFileIn', $inletter->id)}}" class="btn btn-warning bottom-left"><i class="material-icons">add</i>Tambah File</a>  
              @endif
            @else
              <a class="btn btn-warning bottom-left" href="{{ url('files/' . $inletter->filename) }}">Download file</a>
              
                <form onclick="return confirm('Are you sure you want to delete this file?');" action="{{ route('deleteFileIn', [$inletter->id, $inletter->filename]) }}" method="post">
                <input type="hidden" name="_method" value="delete" />
                {!! csrf_field() !!}
                <button class="btn btn-danger pull-right">Delete</button>
                </form>
  
            @endif
          </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">date_range</i> tearkhir diperbarui
        </div>
      </div>
    </div>
  </div>
   <!-- DISPOSISI -->
  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-primary card-header-icon">
        <div class="card-icon">
          <i class="material-icons">library_books</i>
        </div>
        <p class="card-category">Disposisi Surat</p>
        <h3 class="card-title">
          @if($inletter->disposisi)
            {{-- Disposisi ada, tampilkan tombol lihat disposisi --}}
              <a href="{{ route('disposisis.show', $inletter->disposisi->id)}} " class="btn btn-primary pull-right" style="margin-right: 3px; ">Lihat Disposisi</a>
            @else
            {{-- Disposisi TIDAK ada. Check apakah pimpinan atau bukan --}}
            @if(Auth::user()->role == 2)
            {{-- Login sebagai pimpinan, tampilkan tombol tambah disposisi --}}
              <a href="{{ route('add_disposisi', $inletter->id)}}" class="btn btn-primary pull-right"><i class="material-icons">add</i>Tambah Disposisi</a>  
            @else
            {{-- Login BUKAN sebagai pimpinan, tampilkan pesan tidak ada disposisi --}}
            <p>Tidak ada disposisi</p>
             @endif
          @endif
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">date_range</i> Terakhir diperbarui
        </div>
      </div>
    </div>
  </div>  
</div>
 <a href="/inletters" class="btn btn-danger pull-right">Kembali</a>
</div>

@endsection