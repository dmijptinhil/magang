@extends('layouts.app')

@section('content')

  @if(count($ins) > 0)
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title ">Surat Masuk</h4>
              <p class="card-category">Hasil pencarian surat masuk menampilkan {{ count($ins) }} hasil</p>
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
                </thead>
                <tbody>
                  @foreach($ins as $in)
                  @if(Auth::user()->id == $in->tujuan)
                    <tr>
                      <td>{{Common::indDate($in->created_at->format('l, d F Y'))}} </td>
                      <td>{{$in->no_surat}}</td>
                      <td>{{$in->asal}}</td>
                      <td>{{$in->perihal}}</td>
                      <td>{{$in->getTujuan->name}}</td>
                    </tr>
                  @endif
                  @if(Auth::user()->id == 1)
                    <tr>
                      <td>{{Common::indDate($in->created_at->format('l, d F Y'))}} </td>
                      <td>{{$in->no_surat}}</td>
                      <td>{{$in->asal}}</td>
                      <td>{{$in->perihal}}</td>
                      <td>{{$in->getTujuan->name}}</td>
                    </tr>
                  @endif
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
            <h3 class="card-title">Hasil pencarian surat masuk menampilkan {{ count($ins) }} hasil</h3>
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
             <p class="card-category">Hasil pencarian surat keluar menampilkan {{ count($outs) }} hasil</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-info">
                  <th>Tanggal Keluar</th>
                  <th>Nomor Surat</th>
                  <th>Asal</th>
                  <th>Perihal</th>
                  <th>Tujuan</th>
                </thead>
                <tbody>
                  @foreach($outs as $out)
                  @if(Auth::user()->id == $out->asal)
                    <tr>
                       <td>{{Common::indDate($out->created_at->format('l, d F Y'))}} </td>
                      <td>{{$out->no_surat}}</td>
                      <td>{{$out->getAsal->name}}</td>
                      <td>{{$out->perihal}}</td>
                      <td>{{$out->tujuan}}</td>
                    </tr>
                  @endif
                   @if(Auth::user()->id == 1)
                    <tr>
                       <td>{{Common::indDate($out->created_at->format('l, d F Y'))}} </td>
                      <td>{{$out->no_surat}}</td>
                      <td>{{$out->getAsal->name}}</td>
                      <td>{{$out->perihal}}</td>
                      <td>{{$out->tujuan}}</td>
                    </tr>
                  @endif
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
            <h3 class="card-title">Hasil pencarian surat keluar menampilkan {{ count($outs) }} hasil</h3>
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