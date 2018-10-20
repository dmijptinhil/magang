@extends('layouts.app')

@section('content')
   
<center>
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Tambah User</h4>
      </div>
      <div class="card-body">
        {!! Form::open(['action' => 'UsersController@store', 'method' => 'POST', 'enctype' => 'multipart/data']) !!}
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            {{Form::label('name', 'Nama User',['class' => 'bmd-label-floating'])}}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
          </div>
       </div>
       <div class="col-md-3">
          <div class="form-group">
           {{ Form::label('email', 'Email', array('class' => 'bmd-label-floating')) }}
           {{ Form::email('email', '', array('class' => 'form-control')) }}
          </div>
        </div>
       <div class="col-md-4">
          <div class="form-group">
          {{Form::label('role', 'Role User',['class' => 'bmd-label-floating'])}}
          <select name="role" class="form-control">
              <option value="1">Admin</option>
              <option value="2">Pimpinan</option>
              <option value="3">Kasubag. TU</option>
              <option value="4">Pegawai</option>
            </select>           
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          {{Form::label('password', 'Kata Sandi',['class' => 'bmd-label-floating'])}}
          {{ Form::password('password', array('class' => 'form-control')) }}            
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          {{Form::label('password-conf', 'Konfirmasi Kata Sandi',['class' => 'bmd-label-floating'])}}
          {{ Form::password('password-conf', array('class' => 'form-control')) }}            
          </div>
        </div>
      </div>
      {{ Form::submit('Tambah', array('class' => 'btn btn-primary pull-right')) }}

    {{ Form::close() }}
    </div>
  </div>
</center>
 <a href="/users" class="btn btn-danger pull-right">Kembali</a>   
@endsection