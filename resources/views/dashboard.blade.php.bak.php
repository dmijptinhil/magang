@extends('layouts.app')

@section('content')
<div class="wrapper">
 <div class="content">
    <div class="container-fluid">
          <!-- your content here -->
        <div class="row">
          <div class="col-md-4">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">library_books</i>
                  </div>
                  <p class="card-category">Selamat Datang {{Auth::user()->name}}</p>
                  <h3 class="card-title">Total Penginputan Surat
                     </h3>
                    <h4 class="card-title">{{$no_all_input}}
                    <small>disposisi</small>
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

            <div class="col-md-4">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">archive</i>
                  </div>
                  <p class="card-category">Surat Masuk</p>
                  <h3 class="card-title">Pengarsipan surat masuk
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
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">unarchive</i>
                  </div>
                  <p class="card-category">Surat Keluar</p>
                  <h3 class="card-title">Pengarsipan surat keluar
                    <small>
                      
                    @if(Auth::user()->role == 1) 
                    <a href="{{ route('outletters.create') }}" class="btn btn-success">Tambah Surat </a>
                    <a href="{{ route('outletters.index') }}" class="btn btn-success">Lihat Surat </a>
                    @endif
                    @if(Auth::user()->role == 2)
                    <a href="{{ route('outletters.index') }}" class="btn btn-success">Lihat Surat </a>
                    @endif
                    @if(Auth::user()->role >= 3)
                    <a href="{{ route('outletters.create') }}" class="btn btn-success">Tambah Surat </a>
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
        
        @if(Auth::user()->role == 1)
            <div class="row">
                <div class="ol-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-header card-header-info">
                      <h4 class="card-title">Tabel User </h4>
                      <p class="card-category">Tabel ini berisi pengguna sistem</p>
                    </div>
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane active">
                          <table class="table">
                            <thead class=" text-info">
                              <th>ID User</th>  
                              <th>Username</th>
                              <th>Alamat E-mail</th>
                              <th>Role</th>
                              <th> Aksi </th>
                            </thead>
                             <tbody>
                                @foreach($users as $user)
                                <tr>
                                  <td>{{$user->id}}</td>
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->email}}</td>
                                  <td>{{$user->role}}</td>
                                  <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Ubah</a>

                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                                {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                                  </td>
                                 @endforeach
                               </tr>          
                             </tbody>
                          </table>
                          {{ $users->links()}}
                        </div>
                      </div>
                    </div>
                  </div> 
                </div> 
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">person</i>
                      </div>
                      <p class="card-category">Tambah User</p>
                      <h3 class="card-title">
                       {{Form::hidden('_method', 'PUT')}}
                       {{Form::submit('Tambah User', ['class' => 'btn btn-warning pull-right' ])}}
                        <div class="clearfix"></div>
                     {!! Form::close() !!}
                      </h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                       
                        <a href="#pablo">tambah user...</a>
                      </div>
                    </div>
                      </div>
                    </div>
            </div> 
        @endif

      



        <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                 <div class="card-header card-header-primary">
                  <h4 class="card-title">Tabel Surat Masuk</h4>
                  <p class="card-category">Tabel ini berisi surat masuk</p>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="suratmasuk">
                      <table class="table">
                        <thead class=" text-primary">
                          <th>Tanggal Masuk</th>
                          <th>No. Surat</th>
                          <th>Tujuan</th>  
                          <th>File</th>
                        </thead>
                         <tbody>
                            @foreach($masuk as $in)
                            <tr>
                              <td>{{$in->date}}</td>
                              <td>{{$in->no_surat}}</td>
                              <td>{{$in->tujuan}}</td>
                              @if($in->filename == null || $in->filename == "")
                            <td>Tidak ada file</td>
                          @else
                            <td><a href="{{ url('files/' . $in->filename) }}">Download file</a></td>
                          @endif
                              
                             @endforeach
                           </tr>          
                         </tbody>
                      </table>
                      {{ $masuk->links()}}
                    </div>
                  </div>
                </div>
              </div>
            </div>

               @if(count($keluar) > 0)
              <div class="col-lg-6 col-md-12">
                <div class="card">
                  <div class="card-header card-header-warning">
                    <h4 class="card-title">Tabel Surat Keluar</h4>
                    <p class="card-category">Tabel ini berisi surat keluar</p>
                  </div>
                  <div class="card-body table-responsive">
                    <table class="table table-hover">
                      <thead class="text-warning">
                        <th>Tanggal Keluar</th>
                        <th>No. Surat</th>
                        <th>Asal</th>
                        <th>Tujuan</th>  
                       <!--  <th>File</th> -->
                      </thead>
                      <tbody>
                       
                           @foreach($keluar as $out)
                          <tr>
                            <td>{{$out->date}}</td>
                            <td>{{$out->no_surat}}</td>
                            <td>{{$out->asal}}</td>
                            <td>{{$out->tujuan}}</td>
                           <!--  <td>{{$out->filename}}</td> -->
                          </tr>
                          @endforeach
                        
                       
                      </tbody>
                    </table>
                      {{ $keluar->links()}}
                  </div>
                </div>
              </div>
               @else
                <p>Tidak Ada Surat Masuk</p>
              @endif
        </div>
        
    </div>
  </div>
</div>
@endsection
