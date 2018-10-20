@extends('layouts.app')

@section('content')

  @if(count($ins) > 0)
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title ">Surat Masuk</h4>
              <p class="card-category">Hasil pencarian surat masuk dari tanggal {{ date('d M Y', strtotime($dateRange['from'])) }} dan {{ date('d M Y', strtotime($dateRange['to'])) }} menampilkan {{ count($ins) }} hasil {{ count($ins) != 1 ? "" : "" }}</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-danger">
                  <th>Nomor Surat</th>
	                <th>Asal</th>
	                <th>Perihal</th>
	                <th>Tujuan</th>  
	                <th>File</th>
	                <th>Aksi</th>
                </thead>
                <tbody>
                  @foreach($ins as $in)
                    <tr>
                      <td>{{$in->no_surat}}</td>
                      <td>{{$in->asal}}</td>
                      <td>{{$in->perihal}}</td>
                      <td>{{$in->tujuan}}</td>
                      @if($in->filename == null || $in->filename == "")
                        <td>Tidak ada attachment</td>
                      @else
                        <td><a href="{{ url('files/' . $in->filename) }}">Download file</a></td>
                      @endif
                      <td><a href="/inletters/{{ $in->id}}" class="btn btn-success pull-center">Detail Surat</a></td>    
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
    <!-- menampilkan tidak ada surat masuk -->
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category"> Surat Masuk</p>
            <h3 class="card-title">Hasil pencarian surat masuk dari tanggal {{ date('d M Y', strtotime($dateRange['from'])) }} dan {{ date('d M Y', strtotime($dateRange['to'])) }} menampilkan {{ count($ins) }} hasil {{ count($ins) != 1 ? "" : "" }}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">local_offer</i> Total Keseluruhan
            </div>
          </div>
        </div>
      </div>
  @endif

  @if(count($outs) > 0)
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Surat Keluar</h4>
             <p class="card-category">Hasil pencarian surat keluar dari tanggal {{ date('d M Y', strtotime($dateRange['from'])) }} dan {{ date('d M Y', strtotime($dateRange['to'])) }} menampilkan {{ count($outs) }} hasil {{ count($outs) != 1 ? "" : "" }}</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-info">
                  <th>Nomor Surat</th>
                  <th>Asal</th>
                  <th>Perihal</th>
                  <th>Tujuan</th>  
                  <th>File</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  @foreach($outs as $out)
                    <tr>
                      <td>{{$out->no_surat}}</td>
                      <td>{{$out->asal}}</td>
                      <td>{{$out->perihal}}</td>
                      <td>{{$out->tujuan}}</td>
                      @if($out->filename == null || $out->filename == "")
                        <td>Tidak ada file</td>
                      @else
                        <td><a href="{{ url('files/' . $out->filename) }}">Download file</a></td>
                      @endif
                      <td>   <a href="/inletters/{{ $out->id}}" class="btn btn-success pull-center">Detail Surat</a>  </td>
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
      <!-- menampilkan tidak ada surat keluar -->
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category"> Surat Keluar</p>
            <h3 class="card-title">Hasil pencarian surat keluar dari tanggal {{ date('d M Y', strtotime($dateRange['from'])) }} dan {{ date('d M Y', strtotime($dateRange['to'])) }} menampilkan {{ count($outs) }} hasil {{ count($outs) != 1 ? "" : "" }}</h3>
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