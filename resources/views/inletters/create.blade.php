@extends('layouts.app')

@section('content')

<center>
  <div class="top-left">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-danger">
          <h4 class="card-title">Tambah Surat Masuk</h4>
        </div>
        <div class="card-body">
          {!! Form::open(['action' => 'InlettersController@store', 'method' => 'POST', 'enctype' => 'multipart/data']) !!}
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                {{Form::label('no_surat', 'No. Surat',['class' => 'bmd-label-floating'])}}
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
                {{Form::label('tujuan', 'Tujuan Surat',['class' => 'bmd-label-floating'])}}
                <select class="form-control" name="tujuan"> 
          
                  @foreach($users as $user)
                  <!--  @if($user->id != 1 && $user->id != 13) -->
                    <option value="{{ $user->id}}">{{ $user->name }}</option>
                <!--     @endif -->
                  @endforeach
               

                </select> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                {{Form::label('asal', 'Asal Surat',['class' => 'bmd-label-floating'])}}
                {{Form::text('asal', '',['class' => 'form-control', 'placeholder' => ''])}}
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
            </div> -->
            <!-- <div class="col-md-4">
              <div class="form-group">
                {{Form::label('date', 'Tanggal Masuk Surat',['class' => 'bmd-label-floating'])}}
                {{Form::date('date', '',['class' => 'form-control', 'placeholder' => '', 'required'])}}
              </div>
            </div> -->
            {{Form::submit('Tambah Surat', ['class' => 'btn btn-danger pull-right' ])}}
          <div class="clearfix"></div>
          {!! Form::close() !!}
          </div>
          
        </div>
      </div>
    </div>
  </div>
</center>
<a href="/inletters/" class="btn btn-danger pull-right">Kembali</a>

@endsection