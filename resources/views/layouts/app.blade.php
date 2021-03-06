<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--template -->
      <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('../assets/img/BPS.png') }}">
      <link rel="icon" type="image/png" href="{{ asset('../assets/img/BPS.png') }}">
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>Aplikasi Pengarsipan Surat</title>

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>

      <!-- Fonts -->
      <link rel="dns-prefetch" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
      <!--template-->

      <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
      <!-- CSS Files -->
      <link href="{{ asset('../assets/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
   <style>
  body {
    font-family: "Open Sans", sans-serif;
    height: 100vh;
    background: url("{{ asset('log/images/bg.jpg') }}")50% fixed; 
    background-size: cover;
  }
</style>
  </head>

  <body class="">
    <div class="wrapper ">
      <div id="app">
        
       <nav class="navbar navbar-expand-md navbar-light navbar-laravel  ">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href="{{ url('/dashboard') }}">  Aplikasi Pengarsipan Surat
                  </a></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end">  
              <ul class="navbar-nav ml-auto" >
                @guest
                
                @else
                  
                <form action="{{ route('search') }}" method="get" class="navbar-form">
                  <!-- {{ csrf_field() }} -->
                    <div class="input-group no-border">
                      <input type="text" name="from" value="" class="form-control" placeholder="Cari Surat..." required="">
                      <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                      </button>
                    </div>
                  </form>
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard </a>
                  </li>
                   <!--jika usernya admin-->
                   @if(Auth::user()->role == 1)
                      <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Kelola User <span class="caret"></span></a>

                      <div data-color="danger" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" color="danger" href="{{ route('userIndex') }}">
                        {{ __('lihat user') }}</a>
                        <a class="dropdown-item" href="{{ route('userCreate') }}">
                        {{ __('tambah user') }}</a>
                      </div>
                    </li>
                   @endif
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Kelola Surat <span class="caret"></span></a>

                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('inletters.index') }}">
                           {{ __('surat masuk') }}</a>
                           
                          @if(Auth::user()->role != 2)
                          
                          <a class="dropdown-item" href="{{ route('disposisis.index') }}">{{ __('disposisi') }}</a>
                          @endif
                          <a class="dropdown-item" href="{{ route('outletters.index') }}">
                          {{ __('surat keluar') }}</a>
                       </div>
                  </li>

                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> <!-- <i class="material-icons">person</i> -->
                      {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">{{ __('Keluar') }}
                       </a>

                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                       </form>
                      </div>
                </li>
                @endguest
              </ul>
            </div>
          </div>
        </nav>
         
          <div class="content">
          <div class="container-fluid">
        
             <!-- include pesan error -->
            @include('inc.messages')
             <!-- your content here -->
            @yield('content')

          </div>
          </div>
        </div>  
      </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery.min.js" type="text/javascript') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js" type="text/javascript') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/material-dashboard.min.js?v=2.1.0') }}" type="text/javascript"></script>
  </body>
</html>
