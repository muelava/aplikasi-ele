    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
          <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
              <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
          </div>
          <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge badge-pill badge-danger badge-up d-none">1</span></a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <div class="dropdown-header d-flex">
                    <h4 class="notification-title mb-0 mr-auto">Pemberitahuan</h4>
                  </div>
                </li>
                <li class="scrollable-container media-list"><a class="d-flex" href="javascript:void(0)">
                  <a class="d-flex" href="javascript:void(0)">
                    <div class="media d-flex align-items-start">
                      <div class="media-left">
                        <div class="avatar bg-light-danger">
                          <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                        </div>
                      </div>
                      <div class="media-body">
                        <p class="media-heading"><span class="font-weight-bolder">Belum ada pemberitahuan</span></p><small class="notification-text">Wait for it.</small>
                      </div>
                    </div>
                    </a>
                </li>
                {{-- <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="javascript:void(0)">Lihat Semua Pemberitahuan</a></li> --}}
              </ul>
            </li>
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ auth()->user()->nama }}</span><span class="user-status">Admin</span></div><span class="avatar"><img class="round" src="{{asset('/admin/images/avatars/user.jpg')}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                  <a class="dropdown-item" href="{{url('/administrator/profil')}}"><i class="mr-50" data-feather="user"></i> Profil</a>
                  <a class="dropdown-item" href="{{url('/administrator/pengaturan')}}"><i class="mr-50" data-feather="settings"></i> Pengaturan</a>
                  <div class="dropdown-divider"></div>
                  <form action="/logout" method="post" onclick="return confirm('yakin ingin keluar?')">
                      @csrf
                      <button class="dropdown-item btn w-100" type="submit"><i class="mr-50" data-feather="power"></i> Keluar</button>
                  </form>
              </div>
            </li>
          </ul>
        </div>
      </nav>
