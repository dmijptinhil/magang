<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--template -->
      <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('../assets/img/apple-icon.png') }}">
      <link rel="icon" type="image/png" href="{{ asset('../assets/img/favicon.png') }}">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>BPS Surat</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
   <!-- <link href="{{ asset('../assets/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet" /></head>
   -->

   <style>
   body {
    font-family: "Open Sans", sans-serif;
    height: 100vh;
    background: url("{{ asset('log/images/bg.jpg') }}")50% fixed; 
    background-size: cover;
  }
  .back{
    margin-top: 300px;
    margin-right: 20px;
  }
</style>
</head>
<body>
  <div id="app">
    @include('inc.navbar')
    <main class="py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">File Upload</div>
              <div class="card-body">
                @if (session('status'))
                  <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                  </div>
                @endif
                {!! Form::open(['action' => 'OutlettersController@up', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="hidden" name="suratmasuk_id" value="{{ $id_outletter }}">
                <div class="row">
                 <div class="col-md-12"></div>
                 <div class="form-group col-md-4 {{ !$errors->has('file') ?: 'has-error' }}">
                   <label for="filename">File:</label>
                   <input type="file" class="form-control" name="filename" >
                  <span class="help-block text-danger">{{ $errors->first('file') }}</span>
                </div>
              </div>
              {{Form::submit('Tambah File', ['class' => 'btn btn-danger pull-right' ])}}
              <div class="clearfix"></div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
<div class="back">
  <a href="/outletters/{{$id_outletter}}" class="btn btn-danger pull-right">Kembali</a>
</div>

</body>
</html>
































