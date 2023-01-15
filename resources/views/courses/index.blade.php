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
    </div>
    <div class="content-body">
      <!-- Dashboard Ecommerce Starts -->
      <section id="dashboard-ecommerce">
        <div class="card">
          <div class="col-12 row mx-0 p-2">
            <a href="javascript:" class="col-xl-2 col-md-4 col-sm-6 shadow" title="Klik info untuk membuka materi">
              <div class="card text-left">
                <small class="d-block text-secondary mt-1 text-right" style="font-size:0.8rem">waktu</small>
                <div class="card-body p-1">
                  <div class="avatar bg-light-primary p-50 mb-1">
                    <div class="avatar-content">
                      <i data-feather="file-text" class="font-medium-5"></i>
                    </div>
                  </div>
                  <h5 class="font-weight-bolder text-uppercase">SMK</h5>
                  <p class="mb-0">mata pelajaran</p>
                  <small class="card-text text-dark mb-0">nama materi</small>
                </div>
              </div>
            </a>
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