    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('/administrator') }}">
                        <span class="brand-logo">
                            <img src="{{ asset('/img/logo_bina_ikhwani.png') }}" alt="">
                        </span>
                        <h2 class="brand-text">B. Ikhwani</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item {{ $active === 'beranda' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ url('/administrator') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Beranda">Beranda</span></a>
                </li>
                <li class="nav-item {{ $active === 'jadwal-pelajaran' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ url('/administrator/jadwal-pelajaran') }}"><i data-feather="clock"></i><span class="menu-title text-truncate" data-i18n="Jadwal Pelajaran">Jadwal Pelajaran</span></a>
                </li>
                <li class="nav-item {{ $active === 'kelas-siswa' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('kelas-siswa') }}"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Kelas Siswa">Kelas Siswa</span></a>
                </li>
                <li class="nav-item {{ $active === 'pengumuman' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('pengumuman') }}"><i data-feather="volume-1"></i><span class="menu-title text-truncate" data-i18n="Pengumuman">Pengumuman</span></a>
                </li>
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Kelola Data</span><i data-feather="more-horizontal"></i>
                </li>
                <li class="nav-item {{ $active === 'data-guru' || $active === 'data-siswa' || $active === 'data-kelas' ? 'open' : '' }}">
                    <a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Data">Data</span></a>
                    <ul class="menu-content">
                        <li class="{{ $active === 'data-guru' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('data-guru') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Guru">Guru</span></a>
                        </li>
                        <li class="{{ $active === 'data-siswa' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('data-siswa') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Siswa">Siswa</span></a>
                        </li>
                        <li class="{{ $active === 'data-kelas' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('data-kelas') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Kelas">Kelas</span></a>
                        </li>
                        <li class="{{ $active === 'data-mapel' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('data-mapel') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Mata Pelajaran">Mata Pelajaran</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
