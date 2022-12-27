@extends('guru.layouts.main')
@section('title', "Selamat Datang Guru!")

@section('container')
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <!-- Dashboard Ecommerce Starts -->
      <section id="dashboard-ecommerce">
        <div class="row match-height">
          <!-- Medal Card -->
          <div class="col-xl-4 col-md-6 col-12">
            <div class="card card-congratulation-medal">
              <div class="card-body">
                <h5>Pengumuman untuk {{auth()->user()->nama}}!</h5>
                <p class="card-text font-small-3">Bahwa hari senin akan diadakan upacara bendera</p>
                <h3 class="mb-75 mt-2 pt-50">
                  <a href="javascript:void(0);">Pukul 08.00 WIB</a>
                </h3>
                <button type="button" class="btn btn-primary">Info Lebih Lanjut</button>
              </div>
            </div>
          </div>
          <!--/ Medal Card -->

          <!-- Statistics Card -->
          <div class="col-xl-8 col-md-6 col-12">
            <div class="card card-statistics">
              <div class="card-header">
                <h4 class="card-title">Mengajar</h4>
                <div class="d-flex align-items-center">
                  <p class="card-text font-small-2 mr-25 mb-0">1 bulan terakhir</p>
                </div>
              </div>
              <div class="card-body statistics-body">
                <div class="row">
                  <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="media">
                      <div class="avatar bg-light-primary mr-2">
                        <div class="avatar-content">
                          <i data-feather="book" class="avatar-icon"></i>
                        </div>
                      </div>
                      <div class="media-body my-auto">
                        <h4 class="font-weight-bolder mb-0">0</h4>
                        <p class="card-text font-small-3 mb-0">Materi</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--/ Statistics Card -->
        </div>
      </section>
    <!-- Dashboard Ecommerce ends -->

    </div>
  </div>
</div>
@endsection