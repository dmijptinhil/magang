@extends('layouts.app')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- menampilkan jumlah surat masuk hari ini -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">archive</i>
            </div>
            <p class="card-category">Surat Masuk Hari Ini</p>
              <h3 class="card-title">{{ $no_today_masuk }} 
               <small>SURAT</small>
              </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">update</i> Terakhir diperbarui
            </div>
          </div>
        </div>
      </div>
       <!-- menampilkan jumlah surat keluar hari ini -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
         <div class="card-header card-header-success card-header-icon">
           <div class="card-icon">
             <i class="material-icons">unarchive</i>
           </div>
            <p class="card-category">Surat Keluar Hari Ini</p>
             <h3 class="card-title">{{ $no_today_keluar }} 
                <small>SURAT</small></h3>
         </div>
          <div class="card-footer">
            <div class="stats">
               <i class="material-icons">update</i> Terakhir diperbarui
            </div>
          </div>
        </div>
      </div>
       <!-- menampilkan total surat masuk -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
         <div class="card-header card-header-danger card-header-icon">
           <div class="card-icon">
             <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category">Total Surat Masuk</p>
              <h3 class="card-title">{{ $no_all_masuk }} <small>SURAT</small></h3>
         </div>
         <div class="card-footer">
           <div class="stats">
              <i class="material-icons">local_offer</i> Total Keseluruhan
           </div>
          </div>
        </div>
      </div>
       <!-- menampilkan total surat masuk -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category">Total Surat Keluar</p>
              <h3 class="card-title">{{ $no_all_keluar }} <small>SURAT</small></h3>
           </div>
           <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> Total Keseluruhan
              </div>
           </div>
          </div>
        </div>
      </div>
       <!-- menampilkan tabel surat masuk & surat keluar-->
      <div class="row">
        @if(count($masuk) > 0)
          <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                <h4 class="card-title">Tabel Surat Masuk</h4>
              
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active">
                    <table class="table">
                      <thead class=" text-danger">
                        <th>Tanggal Masuk</th>
                        <th>Nomor Surat</th>
                        <th>Tujuan</th>  
                        <th>File</th>
                      </thead>
                      <tbody>
                        @foreach($masuk as $in)
                          <tr>
                            <td>{{$in->created_at->format('d F Y')}}</td>
                            <td>{{$in->no_surat}}</td>
                            <td>{{$in->tujuan}}</td>
                            @if($in->filename == null || $in->filename == "")
                              <td>Tidak ada file</td>
                            @else
                              <td><a href="{{ url('files/' . $in->filename) }}">Download file</a></td>
                            @endif
                          </tr>   
                        @endforeach          
                      </tbody>
                    </table>
                     <!-- pagination -->
                    {{ $masuk->links()}}
                  </div>
                </div>
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
                      <th>Nomor Surat</th>
                      <th>Asal</th>
                      <th>Tujuan</th>  
                      <th>File</th>
                  </thead>
                  <tbody>            
                    @foreach($keluar as $out)
                      <tr>
                        <td>{{ $out->created_at->format('d F Y') }}</td>
                        <td>{{$out->no_surat}}</td>
                        <td>{{$out->asal}}</td>
                        <td>{{$out->tujuan}}</td>
                        <td>{{$out->filekeluar}}</td>
                        @if($out->filekeluar == null || $out->filekeluar == "")
                          <td>Tidak ada file</td>
                        @else
                          <td><a href="{{ url('filesout/' . $out->filekeluar) }}">Download file</a></td>
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
    </div>
  </div>
</div>
@endsection