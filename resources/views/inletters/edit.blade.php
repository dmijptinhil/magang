@extends('layouts.app')

@section('content')
   
<center>
  <div class="pull-center">
    <div class="top-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">Edit Surat Masuk</h4>
          </div>
          <div class="card-body">
            {!! Form::open(['action' => ['InlettersController@update', $inletter->id], 'method' => 'POST']) !!}
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  {{Form::label('no_surat', 'No. Surat',['class' => 'bmd-label-floating'])}}
                  {{Form::text('no_surat', $inletter->no_surat, ['class' => 'form-control', 'placeholder' => '' , 'required' => ''])}}
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  {{Form::label('klasifikasi', 'Klasifikasi Surat',['class' => 'bmd-label-floating'])}}
                    <select class="form-control" name="klasifikasi">
                      <option value="Penting" @if($inletter->klasifikasi=="Penting") selected @endif>Penting</option>
                      <option value="Biasa" @if($inletter->klasifikasi=="Biasa") selected @endif>Biasa</option>
                      <option value="Dinas" @if($inletter->klasifikasi=="Dinas") selected @endif>Dinas</option>
                      <option value="Umum" @if($inletter->klasifikasi=="Umum") selected @endif>Umum</option>
                      <option value="Khusus" @if($inletter->klasifikasi=="Khusus") selected @endif>Khusus</option>
                    </select>
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  {{Form::label('asal', 'Asal Surat',['class' => 'bmd-label-floating'])}}
                  {{Form::text('asal',  $inletter->asal,['class' => 'form-control', 'placeholder' => ''])}}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  {{Form::label('perihal', 'Perihal Surat',['class' => 'bmd-label-floating'])}}
                  {{Form::text('perihal',  $inletter->perihal,['class' => 'form-control', 'placeholder' => ''])}}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  {{Form::label('tujuan', 'Tujuan Surat',['class' => 'bmd-label-floating'])}}
                    <select class="form-control" name="tujuan">
                      <option value="Kepala" @if($inletter->tujuan=="Kepala") selected @endif>Kepala</option>
                      <option value="IPDS" @if($inletter->tujuan=="IPDS") selected @endif>IPDS</option>
                      <option value="Sosial" @if($inletter->tujuan=="Sosial") selected @endif>Sosial</option>
                      <option value="Produksi" @if($inletter->tujuan=="Produksi") selected @endif>Produksi</option>
                      <option value="Distribusi" @if($inletter->tujuan=="Distribusi") selected @endif>Distribusi</option>
                      <option value="Nerwilis" @if($inletter->tujuan=="Nerwilis") selected @endif>Nerwilis</option>
                    </select>
                </div>
              </div>
             </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    {{Form::label('detail_surat', 'Ringkasan Surat',['class' => 'bmd-label-floating'])}}
                    {{Form::textarea('detail_surat',  $inletter->detail_surat, ['class' => 'form-control','rows' =>'5', 'placeholder' => '' , 'required' => ''])}}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  {{Form::label('petugas', 'Nama Petugas',['class' => 'bmd-label-floating'])}}
                  {{Form::text('petugas',  $inletter->petugas,['class' => 'form-control', 'placeholder' => ''])}}
                </div>
              </div>
              </div>
              {{Form::hidden('_method', 'PUT')}}
              {{Form::submit('Perbarui Surat', ['class' => 'btn btn-danger pull-right' ])}}
              <div class="clearfix"></div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</center>
<a href="/inletters/{{$inletter->id}}" class="btn btn-danger pull-right">Kembali</a>
@endsection