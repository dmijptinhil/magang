@extends('layouts.app')

@section('content')

     <center>
        <div class="top-left">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">Tambah Surat Masuk</h4>
                  <p class="card-category">Lengkapi Data Surat Masuk</p>
                </div>
                <div class="card-body">
                  {!! Form::open(['action' => 'InlettersController@store', 'method' => 'POST']) !!}
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
                          {{Form::text('klasifikasi', '',['class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          {{Form::label('asal', 'Asal Surat',['class' => 'bmd-label-floating'])}}
                          {{Form::text('asal', '',['class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                         {{Form::label('perihal', 'Perihal Surat',['class' => 'bmd-label-floating'])}}
                          {{Form::text('perihal', '',['class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          {{Form::label('tujuan', 'Tujuan Surat',['class' => 'bmd-label-floating'])}}
                          {{Form::text('tujuan', '',['class' => 'form-control', 'placeholder' => ''])}}
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
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          {{Form::label('petugas', 'Nama Petugas',['class' => 'bmd-label-floating'])}}
                          {{Form::text('petugas', '',['class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          {{Form::label('filename', 'Unggah File',['class' => 'bmd-label-floating'])}}
                          {{Form::text('filename', '',['class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                      </div>
                    </div>
                   <!--  <button type="submit" class="btn btn-danger pull-right">Tambah Surat</button> -->
                   {{Form::submit('Tambah Surat', ['class' => 'btn btn-danger pull-right' ])}}
                    <div class="clearfix"></div>
                 {!! Form::close() !!}
                </div>
              </div>
            </div>
        </div>
    </center>
         

@endsection