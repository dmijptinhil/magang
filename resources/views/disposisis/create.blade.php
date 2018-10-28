@extends('layouts.app')

@section('content')

<center>
  <div class="top-left">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Tambah Disposisi Surat</h4>
        </div>
        <div class="card-body">
        {!! Form::open(['action' => 'DisposisisController@store', 'method' => 'POST']) !!}
        <input type="hidden" name="id_inletter" value="{{ $id_inletter }}">
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                {{Form::label('tujuan', 'Tujuan Disposisi',['class' => 'bmd-label-floating'])}} <br>

                <div style="text-align: left; padding-left: 70px">
                  @foreach($users as $user)
                
                  <input type="checkbox" name="tujuan[]" value="{{ $user->id}}"> {{ $user->name }} <br>

                  @endforeach
                </div>

              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                {{Form::label('batas_waktu', 'Batas Penyelesaian',['class' => 'bmd-label-floating'])}}
                {{Form::date('batas_waktu', '',['class' => 'form-control', 'placeholder' => '', 'required'])}}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                {{Form::label('sifat_disposisi', 'Sifat Disposisi',['class' => 'bmd-label-floating'])}}
                <select class="form-control" name="sifat_disposisi" required=""> 
                  <option value="SR"> SR - Sangat Rahasia</option>
                  <option value="R"> R - Rahasia</option>
                  <option value="B"> B - Biasa</option>
                </select> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                {{Form::label('catatan', 'Catatan Surat',['class' => 'bmd-label-floating'])}}
                {{Form::textarea('catatan', '',['class' => 'form-control','rows' =>'5', 'placeholder' => '' , 'required' => ''])}}
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
<a href="/inletters/{{$id_inletter}}" class="btn btn-danger pull-right">Kembali</a>  
@endsection