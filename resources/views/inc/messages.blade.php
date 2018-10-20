@if(count($errors) > 1)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
        <span>
        <b> Terjadi Kesalahan - </b>{{$error}} </span>
     </div>
    @endforeach
@endif

@if(session('sucess'))
    <div class="alert alert-success">
        <span>
        <b> Data Berhasil Diinputkan  </b>{{session('success')}}
        </span> 
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        <span>
        <b> Terjadi Kesalahan - </b>{{session('error')}} </span>
     </div>
@endif

@if(session('update'))
    <div class="alert alert-success">
        <span>
        <b>Data Berhasil Di Perbarui </b></span>
     </div>
@endif

@if(session('delete'))
    <div class="alert alert-success">
        <span>
        <b>Data Berhasil Di Hapus </b></span>
     </div>
@endif