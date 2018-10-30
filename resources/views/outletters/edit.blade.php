@extends('layouts.app')

@section('content')
   
<center>
  <div class="pull-center">
    <div class="top-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">Edit Surat Keluar</h4>
          </div>
          <div class="card-body">
            {!! Form::open(['action' => ['OutlettersController@update', $outletter->id], 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                {{Form::label('no_surat', 'Nomor Surat',['class' => 'bmd-label-floating'])}}
                {{Form::text('no_surat', $outletter->no_surat, ['class' => 'form-control', 'placeholder' => '' , 'required' => ''])}}
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                {{Form::label('klasifikasi', 'Klasifikasi Surat',['class' => 'bmd-label-floating'])}}
                <select class="form-control" name="klasifikasi">
                  <option value="Penting" @if($outletter->klasifikasi=="Penting") selected @endif>Penting</option>
                  <option value="Biasa" @if($outletter->klasifikasi=="Biasa") selected @endif>Biasa</option>
                  <option value="Dinas" @if($outletter->klasifikasi=="Dinas") selected @endif>Dinas</option>
                  <option value="Umum" @if($outletter->klasifikasi=="Umum") selected @endif>Umum</option>
                  <option value="Khusus" @if($outletter->klasifikasi=="Khusus") selected @endif>Khusus</option>
                </select> 
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                {{Form::label('asal', 'Asal Surat',['class' => 'bmd-label-floating'])}}
                <select class="form-control" name="asal">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($outletter->tujuan == $user->id) selected @endif>{{ $user->name }}</option>
                    @endforeach

                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                {{Form::label('perihal', 'Perihal Surat',['class' => 'bmd-label-floating'])}}
                {{Form::text('perihal',  $outletter->perihal,['class' => 'form-control', 'placeholder' => ''])}}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                {{Form::label('tujuan', 'Tujuan Surat',['class' => 'bmd-label-floating'])}}
                {{Form::text('tujuan',  $outletter->tujuan,['class' => 'form-control', 'placeholder' => ''])}}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  {{Form::label('detail_surat', 'Ringkasan Surat',['class' => 'bmd-label-floating'])}}
                  {{Form::textarea('detail_surat',  $outletter->detail_surat, ['class' => 'form-control','rows' =>'5', 'placeholder' => '' , 'required' => ''])}}
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  {{Form::label('petugas', 'Nama Petugas',['class' => 'bmd-label-floating'])}}
                  {{Form::text('petugas',  $outletter->petugas, ['class' => 'form-control', 'placeholder' => ''])}}
                </div>
              </div> -->
              <!--  <div class="col-md-4">
                  <div class="form-group">
                    {{Form::label('date', 'Tanggal Keluar Surat',['class' => 'bmd-label-floating'])}}
                    {{Form::date('date', $outletter->date,['class' => 'form-control', 'placeholder' => '', 'required'])}}
                  </div>
                </div> --> 
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Perbarui Surat', ['class' => 'btn btn-info pull-right' ])}}
                <div class="clearfix"></div>
                 {!! Form::close() !!}
              </div>
                
                </div>

              </div>
            </div>
          </div>
         </div>
</center>
<a href="/outletters/{{$outletter->id}}" class="btn btn-danger pull-right">Kembali</a>
@endsection