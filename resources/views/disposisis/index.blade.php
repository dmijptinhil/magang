@extends('layouts.app')

@section('content')

@if(count($tujuans) > 0)
<div class="row">
 <div class="col-md-6">
  <div class="card">
    <div class="card-header card-header-danger">
      <h4 class="card-title ">
        @if(Auth::user()->name != 'Admin')
        Disposisi surat untuk {{Auth::user()->name}}
        @else
        Tabel Disposisi Surat
      @endif</h4>
    </div>
    <div class="card-body">
     <div class="table-responsive">
       <table class="table">
         <thead class=" text-danger">
          <th>Tanggal Disposisi</th>
          <th>Nomor Surat</th>
          <th>File</th>
          <th>Aksi</th>
        </thead>
        <tbody>
         @foreach($tujuans as $tujuan)
           <tr>
             <td>{{Common::indDate(date('l, d F Y', strtotime($tujuan->getDisposisi->created_at)))}}</td>
             <td>{{$tujuan->getDisposisi->inletters->no_surat}}</td>
             
             @if($tujuan->getDisposisi->inletters->filename == null)
             <td>Tidak ada file</td>
             @else
             <td>{{$tujuan->getDisposisi->inletters->filename}}</td>
             @endif

             <td><a href="{{ route('disposisis.show', $tujuan->disposisi_id)}} " class="btn btn-success pull-left" style="margin-right: 3px; ">Lihat Disposisi</a></td>
           </tr>
        @endforeach
      </tbody>
    </table>
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
      <p class="card-category"> Disposisi Surat</p>
      <h3 class="card-title">
        tidak ada disposisi <br>
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