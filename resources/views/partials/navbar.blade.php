<nav class="navbar navbar-expand-lg navbar-dark bg-transparent {{ ($active === 'courses' || $active === 'register') ? 'bg-premiere-2' : '' }} px-5 position-fixed w-100" style="top: 0;">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="/">
        <img src="{{asset('/img/logo_bina_ikhwani.png')}}" alt="" width="50" class="d-inline-block align-text-top">
        SMP SMK Bina Ikhwani
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          {{-- <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Pendaftaran</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Kalender
            </a>
            <ul class="dropdown-menu border-0" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="#">SMP</a></li>
              <li><a class="dropdown-item" href="#">SMK</a></li>
            </ul>
          </li> --}}
        </ul>
                  
          <ul class="ms-auto navbar-nav">
            @if(auth('admin')->check() || auth('guru')->check() || auth('siswa')->check())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, 
                @if (auth('admin')->check())
                {{ auth('admin')->user()->nama }}
                @elseif(auth('guru')->check())
                {{ auth('guru')->user()->nama }}
                @elseif(auth('siswa')->check())
                {{ auth('siswa')->user()->nama }}
                @endif
              </a>  
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <p class="dropdown-item text-capitalize"><i class="bi bi-person"></i> Dashboard</p>
                </li>
                <li><a class="dropdown-item" href="{{asset('/courses')}}"><i class="bi bi-layout-text-sidebar-reverse"></i> My Course</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  </form>
                </li>
              </ul>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
            @endif
          </ul>
      </div>
    </div>
  </nav>