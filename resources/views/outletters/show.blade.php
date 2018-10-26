@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header card-header-info">
          <h2 class="card-title ">Surat Keluar</h2>
            <h4 class="card-category">
              Surat ini diinputkan oleh : {{Auth::user()->name}}
              <br>
              Hari : 
              {{Common::indDate($outletter->created_at->format('l'))}}
              <br>
              Tanggal :
             {{Common::indDate($outletter->created_at->format('d F Y'))}}
            </h4>
        </div>
        <div class="card-body">
          <div id="typography">
            
            @if(Auth::user()->role == 3)
              <a href="/outletters/{{$outletter->id}}/edit" class="btn btn-success bottom-left">Edit</a>
              {!!Form::open(['action' => ['OutlettersController@destroy', $outletter->id], 'method' => 'POST'])!!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Hapus',['class' => 'btn btn-danger bottom-left'])}}
            @endif
            @if(Auth::user()->role == 1)
              <a href="/outletters/{{$outletter->id}}/edit" class="btn btn-success bottom-left">Edit</a>
              {!!Form::open(['action' => ['OutlettersController@destroy', $outletter->id], 'method' => 'POST'])!!}
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
          <h4 class="card-title">Nomor Surat : {{$outletter->no_surat}}</h4>
          <h4 class="card-title">Klasifikasi Surat :{{$outletter->klasifikasi}} </h4>
          <h4 class="card-title">Asal Surat  : {{$outletter->asal}}</h4>
          <h4 class="card-title">Perihal Surat : {{$outletter->perihal}}</h4>
          <h4 class="card-title">Tujuan Surat : {{$outletter->tujuan}}</h4>
          <h4 class="card-title">Ringkasan Surat : <br>{{$outletter->detail_surat}}</h4>  
        </div>
        <div class="card-footer">
          <div class="stats">
           <i class="material-icons">access_time</i> Terakhir diperbarui
          </div>
        </div>
      </div>
  </div>
</div>

<!-- FILE SURAT -->
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-info card-header-icon">
        <div class="card-icon">
          <i class="material-icons">content_copy</i>
        </div>
          <p class="card-category">File Surat</p>
          <h3 class="card-title">
            @if($outletter->filename == null && $outletter->filename == "")
                @if(Auth::user()->role != 2)
                  <a href="{{ route('uploadFileOut', $outletter->id)}}" class="btn btn-info bottom-left"><i class="material-icons">add</i>Tambah File</a>  
                @endif
            @else
              <a class="btn btn-info bottom-left" href="{{ url('files/' . $outletter->filename) }}">Lihat file</a> 
                 <form onclick="return confirm('Yakin ingin menghapus file?');" action="{{ route('deleteFileOut', [$outletter->id, $outletter->filename]) }}" method="post">
                  <input type="hidden" name="_method" value="delete" />
                  {!! csrf_field() !!}
                  <button class="btn btn-danger pull-right">Delete</button>
                  </form>
            @endif
          </h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">date_range</i>Terakhir diperbarui
          </div>
        </div>
      </div>
    </div>   
</div>
 <a href="/outletters" class="btn btn-danger pull-right">Kembali</a>

@endsection