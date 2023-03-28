@extends('guru.layouts.main')
@section('title', 'Tidak Ada Jadwal')
@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
@endsection

@section('container')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">

                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Jadwal</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    Guru
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- content start --}}
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="mb-3">Jadwal Pelajaran</h4>
                            @if ($jadwal)
                                <iframe src="{{ asset('files/jadwal/' . $jadwal->jadwal) }}#toolbar=0&scrollbar=0" frameBorder="0" scrolling="auto" style="height:100vh" width="100%"></iframe>
                                <div class="text-center">
                                    <a class="btn btn-outline-primary" href="{{ asset('files/jadwal/' . $jadwal->jadwal) }}" target="_blank">Download Jadwal</a>
                                </div>
                            @else
                                <h4>Tidak ada jadwal</h4>
                            @endif
                        </div>

                    </div>
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
    <script src="{{ asset('/admin/assets/js/main.js') }}"></script>
@endsection
