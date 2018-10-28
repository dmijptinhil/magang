@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header card-header-primary">
        <h2 class="card-title ">Disposisi Surat</h2>
        <h4 class="card-category">
          Surat ini diinputkan pada
          <br>
          Hari :
          {{Common::indDate($data->created_at->format('l'))}}
          <br>
          Tanggal :
          {{Common::indDate($data->created_at->format('d F Y'))}}
        </h4>
      </div>
      <div class="card-body">
        <div id="typography">
          <div class="row">
          </div>

          @if(Auth::user()->role == 2)
          <a href="/disposisis/{{$data->id}}/edit" class="btn btn-success bottom-left">Edit</a>
          {!!Form::open(['action' => ['DisposisisController@destroy', $data->id], 'method' => 'POST'])!!}
          {{Form::hidden('_method', 'DELETE')}}
          {{Form::submit('Hapus',['class' => 'btn btn-danger bottom-left'])}}
          {!!Form::close()!!}
          @endif
        </div>
      </div>
    </div>                       
  </div> 

  <div class="col-md-8">
    <div class="card card-chart">
      <div class="card-header card-header-success">
        <div class="ct-chart">Detail Disposisi</div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Nomor Surat Masuk : {{$no_surat}}</h4>
        <h4 class="card-title">Tujuan Disposisi  : 

          <ol>

            @foreach($tujuans as $tujuan)
            <li>{{ $tujuan->getUser->name }}</li>
            @endforeach

          </ol>


        </h4>
        <h4 class="card-title">Tanggal Penyelesaian Surat : {{Common::indDate(date("d F Y", strtotime($data->batas_waktu)))}} </h4>
        <h4 class="card-title">Sifat Disposisi : <br>{{$data->sifat_disposisi}}</h4>  
        <h4 class="card-title">Catatan Disposisi : {{$data->catatan}}</h4>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">access_time</i>terakhir diperbarui
        </div>
      </div>
    </div>
  </div>

</div>
<a href="/inletters" class="btn btn-danger pull-right">Kembali</a>
@endsection