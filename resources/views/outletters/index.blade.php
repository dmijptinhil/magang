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
                      <td><a class="text-danger" href="{{ url('files/' . $outletter->filename) }}">Lihat file</a></td>
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
          @endif  
        </div>
      </div>
    </div>   
  </div>
</div>
    @else
      <p>Tidak Ada Surat Masuk</p>
      <a href="/outletters/create" class="btn btn-danger  bottom-left">Tambah Surat</a>
    @endif

		</div>
	</div>

@endsection