@extends('layouts.app')

@section('content')

<center>
  <div class="top-left">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-info">
          <h4 class="card-title">Tambah Surat Keluar</h4>
        </div>
        <div class="card-body">
          {!! Form::open(['action' => 'OutlettersController@store', 'method' => 'POST', 'enctype' => 'multipart/data']) !!}
          <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  {{Form::label('no_surat', 'Nomor Surat',['class' => 'bmd-label-floating'])}}
                  {{Form::text('no_surat', '',['class' => 'form-control', 'placeholder' => '' , 'required' => ''])}}
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  {{Form::label('klasifikasi', 'Klasifikasi Surat',['class' => 'bmd-label-floating'])}}
                  <select class="form-control" name="klasifikasi">
                    <option value="Penting">Penting</option>
                    <option value="Biasa">Biasa</option>
                    <option value="Dinas">Dinas</option>
                    <option value="Umum">Umum</option>
                    <option value="Khusus">Khusus</option>
                  </select> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  {{Form::label('asal', 'Asal Surat',['class' => 'bmd-label-floating'])}}
                  <select class="form-control" name="asal"> 
                    <option value="IPDS">IPDS</option>
                    <option value="Keuangan">Keuangan</option>
                    <option value="Sosial">Sosial</option>
                    <option value="Distribusi">Distribusi</option>
                    <option value="Nerwilis">Nerwilis</option>
                  </select> 
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                {{Form::label('tujuan', 'Tujuan Surat',['class' => 'bmd-label-floating'])}}
                {{Form::text('tujuan', '',['class' => 'form-control', 'placeholder' => ''])}}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                {{Form::label('perihal', 'Perihal Surat',['class' => 'bmd-label-floating'])}}
                {{Form::text('perihal', '',['class' => 'form-control', 'placeholder' => ''])}}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
               {{Form::label('detail_surat', 'Ringkasan Surat',['class' => 'bmd-label-floating'])}}
                {{Form::textarea('detail_surat', '',['class' => 'form-control','rows' =>'5', 'placeholder' => '' , 'required' => ''])}}
              </div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                {{Form::label('petugas', 'Nama Petugas',['class' => 'bmd-label-floating'])}}
                {{Form::text('petugas', '',['class' => 'form-control', 'placeholder' => ''])}}
              </div>
            </div>
        </div> -->
          {{Form::submit('Tambah Surat', ['class' => 'btn btn-info pull-right' ])}}
          <div class="clearfix"></div>
          {!! Form::close() !!}
      </div>
    </div>
  </div>
   <a href="/outletters" class="btn btn-danger pull-right">Kembali</a>
</center>
@endsection