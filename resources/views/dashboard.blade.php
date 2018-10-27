@extends('layouts.app')

@section('content')

<div class="row">
  @if(Auth::user()->role == 2)
  <div class="col-md-4">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">library_books</i>
        </div>
          <p class="card-category">Selamat Datang {{Auth::user()->name}}</p>
          <h3 class="card-title">Total Pengarsipan Surat</h3>
           <h4 class="card-title">{{$no_all_masuk}}
          <small>surat masuk</small>
          </h4>
          <h4 class="card-title">{{$no_all_disposisi}}
          <small>disposisi</small>
          </h4>
          <h4 class="card-title">{{$no_all_keluar}}
          <small>surat keluar</small>
          </h4>
      </div>
      <div class="card-footer">
        <div class="stats">
         <i class="material-icons">local_offer</i>
         <a class="text-danger" href="#">Pengarsipan Surat</a>
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="col-md-4">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">library_books</i>
        </div>
          <p class="card-category">Selamat Datang {{Auth::user()->name}}</p>
          <h3 class="card-title">Total Pengarsipan Surat</h3>
          <h4 class="card-title">{{$no_all_masuk}}
          <small>surat masuk</small>
          <h4 class="card-title">{{$no_all_keluar}}
          <small>surat keluar</small>
          </h4>
      </div>
      <div class="card-footer">
        <div class="stats">
         <i class="material-icons">local_offer</i>
         <a class="text-danger" href="#">Pengarsipan surat</a>
        </div>
      </div>
    </div>
  </div>
  @endif
  <div class="col-md-4">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">archive</i>
        </div>
          <p class="card-category">Surat Masuk</p>
          <h3 class="card-title">
            Pengarsipan surat masuk
            Hari ini {{ $no_today_masuk }} surat
          </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">local_offer</i>
          <a class="text-danger" href="#">surat masuk</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-stats">
      <div class="card-header card-header-info card-header-icon">
        <div class="card-icon">
          <i class="material-icons">unarchive</i>
        </div>
        <p class="card-category">Surat Keluar</p>
          <h3 class="card-title">Pengarsipan surat keluar
          <h3 class="card-title">
            Hari ini {{ $no_today_keluar }} surat
          </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">local_offer</i>
          <a class="text-info" href="#">surat keluar</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- menampilkan tabel surat masuk & surat keluar-->
<div class="row">
  <!-- menampilkan surat masuk -->
  @if(count($masuk) > 0)
    <div class="col-lg-6 col-md-12">
      <div class="card">
        <div class="card-header card-header-danger">
          <h4 class="card-title">Tabel Surat Masuk Hari Ini</h4>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead class="text-danger">
              <th>Tanggal Masuk</th>
              <th>Asal</th>
              <th>Tujuan</th>
              <th>File</th>
              <th>Aksi</th>
            </thead>
            <tbody>            
            @foreach($masuk as $in)
              @if(Auth::user()->id == $in->tujuan)
                <tr>
                  <td>{{Common::indDate($in->created_at->format('l, d F Y'))}} </td>
                  <td>{{$in->asal}}</td>
                  <td>{{$in->getTujuan->name}}</td>
                  @if($in->filename == null || $in->filename == "")
                    <td>Tidak ada file</td>
                  @else
                    <td><a class="text-danger" href="{{ url('files/' . $in->filename) }}">Lihat file</a></td>
                  @endif
                  <td><a href="/inletters/{{ $in->id}}" class="btn btn-danger pull-center">Detail Surat</a>  </td>
                </tr>
              @endif
              @if(Auth::user()->id == 1)
                <tr>
                  <td>{{Common::indDate($in->created_at->format('l, d F Y'))}} </td>
                  <td>{{$in->asal}}</td>
                  <td>{{$in->getTujuan->name}}</td>
                  @if($in->filename == null || $in->filename == "")
                    <td>Tidak ada file</td>
                  @else
                    <td><a class="text-danger" href="{{ url('files/' . $in->filename) }}">Lihat file</a></td>
                  @endif
                  <td><a href="/inletters/{{ $in->id}}" class="btn btn-danger pull-center">Detail Surat</a>  </td>
                </tr>
              @endif
            @endforeach 
            </tbody>
          </table>
          {{ $masuk->links()}}
        </div>
      </div>
    </div>
  @else
  <!-- menampilkan tidak ada surat masuk -->
  <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">info_outline</i>
        </div>
        <p class="card-category"> Surat Masuk</p>
          <h3 class="card-title">
            tidak ada surat masuk hari ini dari {{Auth::user()->name}}
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

  <!-- menampilkan surat keluar -->
  @if(count($keluar) > 0)
    <div class="col-lg-6 col-md-12">
      <div class="card">
        <div class="card-header card-header-info">
          <h4 class="card-title">Tabel Surat Keluar Hari Ini</h4>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead class="text-info">
              <th>Tanggal Keluar</th>
              <th>Asal</th>
              <th>Tujuan</th>
              <th>File</th>
              <th>Aksi</th>
            </thead>
            <tbody>            
            @foreach($keluar as $out)
            @if(Auth::user()->id == $out->asal)
              <tr>
                <td>{{Common::indDate($out->created_at->format('l, d F Y'))}} </td>
                <td>{{$out->asal}}</td>
                <td>{{$out->tujuan}}</td>
                @if($out->filename == null || $out->filename == "")
                  <td>Tidak ada file</td>
                @else
                  <td><a class="text-info" href="{{ url('files/' . $out->filename) }}">Lihat file</a></td>
                @endif
                <td><a href="/outletters/{{ $out->id}}" class="btn btn-info pull-center">Detail Surat</a>  </td>
              </tr>
            @endif
            @if(Auth::user()->id == 1)
                <tr>
                  <td>{{Common::indDate($in->created_at->format('l, d F Y'))}} </td>
                  <td>{{$out->asal}}</td>
                  <td>{{$out->getTujuan->name}}</td>
                  @if($out->filename == null || $out->filename == "")
                    <td>Tidak ada file</td>
                  @else
                    <td><a class="text-danger" href="{{ url('files/' . $in->filename) }}">Lihat file</a></td>
                  @endif
                  <td><a href="/inletters/{{ $in->id}}" class="btn btn-danger pull-center">Detail Surat</a>  </td>
                </tr>
            @endif
            @endforeach  
            </tbody>
          </table>
          {{ $keluar->links()}}
        </div>
      </div>
    </div>
  @else
  <!-- menampilkan tidak ada surat keluar -->
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">info_outline</i>
          </div>
            <p class="card-category"> Surat Keluar</p>
            <h3 class="card-title">
              tidak ada surat keluar hari ini dari {{Auth::user()->name}} 
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
</div>

@endsection
