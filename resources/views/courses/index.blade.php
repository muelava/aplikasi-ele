@extends('courses.layouts.main')
@section('title', "Selamat Datang Siswa!")

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{asset('/admin/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/admin/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{asset('/admin/css/core/menu/menu-types/vertical-menu.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
@endsection

@section('container')
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper">

    <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Courses</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">
                {{ $siswa->kelas->kelas }}
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content-body">
      <!-- Dashboard Ecommerce Starts -->
      <section id="dashboard-ecommerce">
        <div class="card">
          <div class="col-12 row mx-0 p-2">
            @if ($materis->count() > 0)
              @foreach ($materis as $materi)
              <a href="courses/materi/{{ $materi->id }}" class="col-xl-2 col-md-4 col-sm-6 shadow-sm" title="Klik info untuk membuka materi">
                <div class="card text-left">
                  <small class="d-block text-secondary mt-1 text-right" style="font-size:0.8rem">{{ $materi->created_at->diffForHumans() }}</small>
                  <div class="card-body p-1">
                    <div class="avatar bg-light-primary p-50 mb-1">
                      <div class="avatar-content">
                        <i data-feather="file-text" class="font-medium-5"></i>
                      </div>
                    </div>
                    <h5 class="font-weight-bolder text-uppercase">{{ $materi->mata_pelajaran->mapel }}</h5>
                    <p class="mb-0">{{ $materi->materi }}</p>
                    <small class="card-text text-dark mb-0">{{ $materi->deskripsi }}</small>
                  </div>
                </div>
              </a>
              @endforeach
            @else
              <p class="h5 mx-auto">Tidak Ada Materi <b>{{ request('materi') }}</b></p>
            @endif
          </div>
        </div>
      </section>
    <!-- Dashboard Ecommerce ends -->

    </div>
  </div>
</div>
@endsection

@section('page-vendor-js')
<script src="{{ asset('/admin/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page-js')
<script src="{{asset('/admin/assets/js/main.js')}}"></script>
@endsection