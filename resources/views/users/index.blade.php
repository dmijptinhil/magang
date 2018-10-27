
@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
       <h4 class="card-title mt-0"> Tabel User</h4>
      </div>
      <div class="card-body">
       <div class="table-responsive">
         <table class="table">
           <thead class="">
             <th>Nama</th>
             <th>Email</th>
             <th>Tanggal Ditambah</th>
             <th>Role</th>
             <th>Aksi</th>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{Common::indDate($user->created_at->format('l, d F Y'))}}</td>
                    @if($user->role == 1)
                     <td>Administrator</td>
                    @elseif($user->role == 2)
                     <td>Pimpinan</td>
                    @elseif($user->role == 3)
                     <td>Kasubag. TU</td>
                    @elseif($user->role == 5)
                      <td>Operator</td>
                    @else
                     <td>Pegawai</td>
                    @endif
                  <td>
                    <a href="{{ route('userEdit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['userDestroy', $user->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach
            </tbody>
         </table>
         <a href="{{ route('userCreate') }}" class="btn btn-primary">Tambah User</a>

       </div>
      </div>
    </div>
  </div>
</div>

@endsection