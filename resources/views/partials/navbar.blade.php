<nav class="navbar navbar-expand-lg navbar-dark bg-transparant px-5 position-fixed w-100" style="top: 0;">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="/">
        <img src="/img/logo_bina_ikhwani.png" alt="" width="50" class="d-inline-block align-text-top">
        SMP-SMK Bina Ikhwani
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          
          <li class="nav-item">
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
          </li>
        </ul>
          @if ($active != 'login')
          <ul class="ms-auto navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
          </ul>
          @endif
      </div>
    </div>
  </nav>