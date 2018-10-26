<nav class="navbar navbar-expand-md navbar-light navbar-laravel  ">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href="{{ url('/dashboard') }}">  Aplikasi Pengarsipan Surat BPS
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
                  <li class="nav-item">
                   <a class="nav-link" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                  </li>
                  <li class="nav-item">
                   <a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                  </li>
                @else
                 <form action="{{ route('search') }}" method="get" class="navbar-form">
                  <!-- {{ csrf_field() }} -->
                    <div class="input-group no-border">
                      <input type="text" name="from" value="" class="form-control" placeholder="Cari Surat...">
                      <!-- <input type="text" name="to" value="" class="form-control" placeholder="Search..."> -->
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