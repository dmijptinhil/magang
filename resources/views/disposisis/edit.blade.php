@extends('layouts.app')

@section('content')

<center>
  <div class="top-left">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Edit Disposisi Surat</h4>
        </div>
        <div class="card-body">
         {!! Form::open(['action' => ['DisposisisController@update', $disposisi->id], 'method' => 'PUT']) !!}
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                {{Form::label('tujuan', 'Tujuan Disposisi',['class' => 'bmd-label-floating'])}}
               {{Form::text('tujuan', $disposisi->tujuan, ['class' => 'form-control', 'placeholder' => ''])}}
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                {{Form::label('batas_waktu', 'Batas Waktu',['class' => 'bmd-label-floating'])}}
                 {{Form::date('batas_waktu', $disposisi->batas_waktu, ['class' => 'form-control', 'placeholder' => ''])}}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                {{Form::label('sifat_disposisi', 'Sifat Disposisi',['class' => 'bmd-label-floating'])}}
                 <select class="form-control" name="sifat_disposisi">
                    <option value="SR" @if($disposisi->sifat_disposisi=="SR") selected @endif> SR - Sangat Rahasia</option>
                    <option value="R" @if($disposisi->sifat_disposisi=="R") selected @endif> R - Rahasia</option>
                    <option value="B" @if($disposisi->sifat_disposisi=="B") selected @endif> B - Biasa</option>
                  </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                {{Form::label('catatan', 'Catatan Surat',['class' => 'bmd-label-floating'])}}
                 {{Form::textarea('catatan', $disposisi->catatan, ['class' => 'form-control','rows' =>'5', 'placeholder' => '' , 'required' => ''])}}
              </div>
            </div>
          </div>
          {{Form::submit('Tambah Disposisi', ['class' => 'btn btn-primary pull-right' ])}}
          <div class="clearfix"></div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</center>
<a href="/disposisis/{{$disposisi->id}}" class="btn btn-danger pull-right">Kembali</a>  
@endsection