@extends('layouts.app')

@section('content')

<center>
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Edit User</h4>
      </div>
      <div class="card-body">
       {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST']) !!}
       <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              {{Form::label('name', 'Nama User',['class' => 'bmd-label-floating'])}}
              {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => '' , 'required' => ''])}}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
             {{ Form::label('email', 'Email', array('class' => 'bmd-label-floating')) }}
             {{Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => '' , 'required' => ''])}}
           </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
              {{Form::label('role', 'Role User',['class' => 'bmd-label-floating'])}} 
              <select class="form-control" name="role">
                <option value="1" @if($user->role=="1") selected @endif>Admin</option>
                <option value="2" @if($user->role=="2") selected @endif>Pimpinan</option>
                <option value="3" @if($user->role=="3") selected @endif>Kasubag. TU</option>
                <option value="4" @if($user->role=="4") selected @endif>Pegawai</option>
                <option value="5" @if($user->role=="5") selected @endif>Operator</option>
              </select>            
            </div> 
         </div>
         <div class="col-md-4">
            <div class="form-group">
              {{Form::label('password', 'Kata Sandi',['class' => 'bmd-label-floating'])}}
              {{Form::text('password', '', ['class' => 'form-control', 'placeholder' => ''])}}            
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
              {{Form::label('password', 'Konfirmasi Kata Sandi',['class' => 'bmd-label-floating'])}}
              {{Form::text('password-conf', '', ['class' => 'form-control', 'placeholder' => ''])}}          
            </div>
         </div>
       </div>
      {{Form::hidden('_method', 'PUT')}}
      {{ Form::submit('Perbarui', array('class' => 'btn btn-primary pull-right')) }}

      {{ Form::close() }}
    </div>
  </div>
</center>
 <a href="/users" class="btn btn-danger pull-right">Kembali</a> 
@endsection