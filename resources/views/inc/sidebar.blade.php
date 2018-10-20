
          <div class="sidebar" data-color="danger" data-background-color="white">
          <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
               ADMIN
            </a>
          </div>
            <div class="sidebar-wrapper">
              <ul class="nav">
                <li class="{{ Request::is('dashboard') ? 'nav-item active' : '' }}  ">
                  <a class="nav-link" href="{{ url('/dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <!-- your sidebar here -->
                <li class="{{ Request::is('inletters') ? 'nav-item active' : '' }}  ">
                  <a class="nav-link" href="{{ route('inletters.index') }}">
                    <i class="material-icons">archive</i>
                    <p>Surat Masuk</p>
                  </a>
                </li>
                 <li class="{{ Request::is('inletters/create') ? 'nav-item active' : '' }} ">
                  <a class="nav-link" href="{{ route('inletters.create') }}">
                    <i class="material-icons">add</i>
                    <p>Tambah Surat Masuk</p>
                  </a>
                </li>
                <li class="{{ Request::is('outletters') ? 'nav-item active' : '' }}  ">
                  <a class="nav-link" href="{{ url('/outletters') }} ">
                    <i class="material-icons">unarchive</i>
                    <p>Surat Keluar</p>
                  </a>
                </li>
                 <li class="{{ Request::is('outletters/create') ? 'nav-item active' : '' }} ">
                  <a class="nav-link" href="{{ route('outletters.create') }}">
                    <i class="material-icons">add</i>
                    <p>Tambah Surat Keluar</p>
                  </a>
                </li>
                 <li class="nav-item ">
                  <a class="nav-link" href="#0">
                    <i class="material-icons">person</i>
                    <p>Manajemen User</p>
                  </a>
                </li>
                 <li class="nav-item ">
                  <a class="nav-link" href="#0">
                    <i class="material-icons">people</i>
                    <p>Manajemen Role</p>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="#0">
                    <i class="material-icons">security</i>
                    <p>Manajemen Hak Akses</p>
                  </a>
                </li>

              </ul>
            </div>
        </div>