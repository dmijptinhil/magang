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
         <a href="#pablo">Pengarsipan surat</a>
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
         <a href="#pablo">Pengarsipan surat</a>
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
          <h3 class="card-title">Pengarsipan surat masuk
            <h3 class="card-title">Hari ini {{ $no_today_masuk }} 
               <small>SURAT</small>
              </h3>
          <small>     
            @if(Auth::user()->role == 1)
              <a href="{{ route('inletters.create') }}" class="btn btn-danger">Tambah Surat </a>
              <a href="{{ route('inletters.index') }}" class="btn btn-danger">Lihat Surat </a>
            @endif
            @if(Auth::user()->role == 2)   
              <a href="{{ route('inletters.index') }}" class="btn btn-danger">Lihat Surat </a>
            @endif
            @if(Auth::user()->role == 3)
              <a href="{{ route('inletters.create') }}" class="btn btn-danger">Tambah Surat </a>
            @endif
            @if(Auth::user()->role == 4)
              <a href="{{ route('inletters.index') }}" class="btn btn-danger">Lihat Surat </a>
            @endif
          </small>
          </h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">local_offer</i>
            <a href="#pablo">surat masuk</a>
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
            <h3 class="card-title">Hari ini {{ $no_today_keluar }} 
                <small>SURAT</small></h3>
              <small>
                @if(Auth::user()->role == 1) 
                  <a href="{{ route('outletters.create') }}" class="btn btn-info">Tambah Surat </a>
                  <a href="{{ route('outletters.index') }}" class="btn btn-info">Lihat Surat </a>
                @endif
                @if(Auth::user()->role == 2)
                  <a href="{{ route('outletters.index') }}" class="btn btn-info">Lihat Surat </a>
                @endif
                @if(Auth::user()->role >= 3)
                  <a href="{{ route('outletters.create') }}" class="btn btn-info">Tambah Surat </a>
                @endif
              </small>
            </h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">local_offer</i>
            <a href="#pablo">surat keluar</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
   <!-- menampilkan tabel surat masuk & surat keluar-->
     @if(count($masuk) > 0)
      <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">Tabel Surat Masuk</h4>
              </div>
              <div class="card-body table-responsive">
                <table class="table table-hover">
                  <thead class="text-danger">
                      <th>Tanggal Masuk</th>
                      <th>Asal</th>
                      <th>Tujuan</th>
                      <th>File</th>
                  </thead>
                  <tbody>            
                    @foreach($masuk as $in)
                      <tr>
                        <td>{{ $in->created_at->format('d F Y') }}</td>
                        <td>{{$in->asal}}</td>
                        <td>{{$in->tujuan}}</td>
                        <td>{{$in->filekeluar}}</td>
                        @if($in->filename == null || $in->filename == "")
                          <td>Tidak ada file</td>
                        @else
                          <td><a class="btn btn-danger" href="{{ url('files/' . $in->filename) }}">Lihat file</a></td>
                        @endif
                       </tr>
                    @endforeach  
                  </tbody>
                </table>
                {{ $masuk->links()}}
              </div>
            </div>
          </div>
        @else
          <!-- menampilkan tidak ada surat masuk -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
             <div class="card-header card-header-danger card-header-icon">
               <div class="card-icon">
                 <i class="material-icons">info_outline</i>
                </div>
                <p class="card-category"> Surat Masuk</p>
                  <h3 class="card-title">
                    tidak ada surat masuk
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

        @if(count($keluar) > 0)
          <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Tabel Surat Keluar</h4>
              </div>
              <div class="card-body table-responsive">
                <table class="table table-hover">
                  <thead class="text-info">
                      <th>Tanggal Keluar</th>
                      <th>Asal</th>
                      <th>Tujuan</th>
                      <th>File</th>
                  </thead>
                  <tbody>            
                    @foreach($keluar as $out)
                      <tr>
                        <td>{{ $out->created_at->format('d F Y') }}</td>
                        <td>{{$out->asal}}</td>
                        <td>{{$out->tujuan}}</td>
                        @if($out->filename == null || $out->filename == "")
                          <td>Tidak ada file</td>
                        @else
                          <td><a class="btn btn-info" href="{{ url('files/' . $out->filename) }}">Lihat file</a></td>
                        @endif
                       </tr>
                    @endforeach  
                  </tbody>
                </table>
                {{ $keluar->links()}}
              </div>
            </div>
          </div>
        @else
          <!-- menampilkan tidak ada surat keluar -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
             <div class="card-header card-header-info card-header-icon">
               <div class="card-icon">
                 <i class="material-icons">info_outline</i>
                </div>
                <p class="card-category"> Surat Keluar</p>
                  <h3 class="card-title">
                   tidak ada surat keluar
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
