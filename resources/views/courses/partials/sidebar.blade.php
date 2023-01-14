    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('/guru') }}">
              <span class="brand-logo">
                  <img src="{{asset('/img/logo_bina_ikhwani.png')}}" alt="">
                </span>
                <h2 class="brand-text">B. Ikhwani</h2></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
          </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ $active === 'course' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('courses')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Course">Course</span></a>
            </li>
            <li class="nav-item {{ $active === 'materi' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('guru-materi')}}"><i data-feather="book"></i><span class="menu-title text-truncate" data-i18n="Materi">Materi</span></a>
            </li>
            <li class="nav-item {{ $active === 'jadwal' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('guru-jadwal')}}"><i data-feather="clock"></i><span class="menu-title text-truncate" data-i18n="Jadwal">Jadwal</span></a>
            </li>
            <li class="nav-item {{ $active === 'nilai' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{url('/guru/nilai')}}"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Nilai">Nilai</span></a>
            </li>
          </ul>
        </div>
      </div>
      <!-- END: Main Menu-->