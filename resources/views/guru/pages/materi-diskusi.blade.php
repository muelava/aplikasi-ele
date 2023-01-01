@extends('guru.layouts.main')
@section('title', "Diskusi")
@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{asset('/admin/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/admin/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{asset('/admin/css/core/menu/menu-types/vertical-menu.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
@endsection

@section('container')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">
              <div class="row breadcrumbs-top">
                <div class="col-12">
                  <h2 class="content-header-title float-left mb-0"><a href="{{ route('guru-materi') }}">{{ $materi->kelas->kelas }}</a></h2>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                      <a href="{{ route('guru-materi') }}">{{ $materi->mata_pelajaran->mapel }}</a>
                    </li>
                    <li class="breadcrumb-item active">
                      <a href="{{ route('guru-materi') }}">{{ $materi->materi }}</a>
                    </li>
                    <li class="breadcrumb-item active">
                      Diskusi
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          {{-- content start --}}
            <div class="row" id="table-hover-row">
                <div class="col-12">

                  {{-- start Materi --}}
                  <div class="card">
                    <div class="card-header">
                      <h3>{{ $materi->materi }}</h3>
                    </div>

                    <div class="card-body">

                      <small class="d-block">Deskripsi</small>
                      <h5>{{ $materi->deskripsi }}</h5>
                      
                      <small class="d-block mt-2">File</small>
                      <a class="btn text-primary pl-0" target="_blank" href="{{ asset('files/materies/'.$materi->dok_materi) }}">Download Materi</a>

                      <small class="d-block mt-2">Tugas</small>
                      @if ($materi->tugas->count() > 0)
                      <a class="btn text-primary pl-0" href="{{ asset('guru/materi/tugas/'.$materi->id) }}">Lihat Tugas</a>
                      @else
                      <p>Belum ada tugas</p>
                      @endif

                    </div>
                  </div>
                  {{-- end Materi --}}

                  <button class="btn btn-sm btn-primary mb-1" ><i data-feather="plus"></i> Diskusi</button>

                  {{-- start diskusi --}}
                  <div class="card">
                    <div class="card-header">
                      <h5>Nama Siswa</h5>
                      <small>{{ $materi->created_at->diffForHumans() }}</small>
                    </div>

                    <div class="card-body">
                      <p>Pak saya mau tanya, apakah bisa menjadi seorang programmer?</p>
                    </div>
                  </div>
                  {{-- end diskusi --}}

                </div>
            </div>
          {{-- content start --}}
    </div>
</div>
@endsection

@section('page-vendor-js')
<script src="{{ asset('/admin/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page-js')
<script src="{{asset('/admin/assets/js/main.js')}}"></script>
@endsection