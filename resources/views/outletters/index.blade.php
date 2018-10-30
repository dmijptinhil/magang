@extends('layouts.app')

@section('content')

@if(count($outletters) > 0)
 	<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-info">
          <h4 class="card-title ">Surat Keluar</h4>
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
	            <th>File</th>
	            <th>Aksi</th>
            </thead>
            <tbody>
              @foreach($outletters as $outletter)
              @if(Auth::user()->id == $outletter->asal)
                <tr>
                  <td>{{Common::indDate($outletter->created_at->format('l, d F Y'))}}</td>
                  <td>{{$outletter->no_surat}}</td>
                  <td>{{$outletter->getAsal->name}}</td>
                  <td>{{$outletter->perihal}}</td>
                  <td>{{$outletter->tujuan}}</td>
                    @if($outletter->filename == null || $outletter->filename == "")
                     <td>Tidak ada file</td>
                    @else
                      <td><a class="text-info" href="{{ url('files/' . $outletter->filename) }}">Lihat file</a></td>
                    @endif
                  <td>   <a href="/outletters/{{ $outletter->id}}" class="btn btn-success pull-center">Detail Surat</a>  </td>
              </tr>
              @endif
              @if(Auth::user()->id == 1)
                  <tr>
                    <td>{{Common::indDate($outletter->created_at->format('l, d F Y'))}} </td>
                    <td>{{$outletter->no_surat}}</td>
                    <td>{{$outletter->getAsal->name}}</td>
                    <td>{{$outletter->perihal}}</td>
                    <td>{{$outletter->tujuan}}</td>
                    @if($outletter->filename == null || $outletter->filename == "")
                      <td>Tidak ada file</td>
                    @else
                      <td><a class="text-info" href="{{ url('files/' . $outletter->filename) }}">Lihat file</a></td>
                    @endif
                    <td>   <a href="/outletters/{{ $outletter->id}}" class="btn btn-success pull-center">Detail Surat</a>  </td>
                  </tr>
                  @endif
              @endforeach
            </tbody>
          </table>
          {{ $outletters->links()}}
           @if(Auth::user()->role == 1)
            <a href="/outletters/create" class="btn btn-info  bottom-left">Tambah Surat</a>     
          @elseif(Auth::user()->role == 3)
            <a href="/outletters/create" class="btn btn-info  bottom-left">Tambah Surat</a>
          @elseif(Auth::user()->role == 4)
            <a href="/outletters/create" class="btn btn-info  bottom-left">Tambah Surat</a>
          @endif  
        </div>
      </div>
    </div>   
  </div>
</div>
@else
    <div class="col-lg-8 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-info card-header-icon">
        <div class="card-icon">
          <i class="material-icons">info_outline</i>
        </div>
        <p class="card-category"> Surat Keluar</p>
          <h3 class="card-title">
            tidak ada surat keluar <br>
            <a href="/outletters/create" class="btn btn-info  bottom-left">Tambah Surat</a>
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

@endsection