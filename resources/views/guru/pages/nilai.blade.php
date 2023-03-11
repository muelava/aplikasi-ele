@extends('guru.layouts.main')
@section('title', 'Tidak Ada Nilai')
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
                            <h2 class="content-header-title float-left mb-0">Nilai</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    Daftar Nilai
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
                            <h4>Tidak ada Nilai</h4>
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
