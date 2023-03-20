@extends('admin.layouts.main')
@section('title', 'Jadwal')
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
                            <h2 class="content-header-title float-left mb-0">Jadwal Pelajaran</h2>
                        </div>
                    </div>
                </div>
            </div>

            {{-- content start --}}
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="card-body">
                            @if ($jadwal)
                                <label for="">Jadwal Pelajaran Saat ini:</label>
                                <br>
                                <a href="{{ asset('files/jadwal/' . $jadwal->jadwal) }}" target="_blank" rel="noopener noreferrer">Lihat {{ $jadwal->jadwal }}</a>
                                <br>
                                <br>
                                <br>

                                <p>Perbarui Jadwal</p>
                                <form action="/administrator/jadwal-pelajaran/ubah/{{ $jadwal->id }}" method="POST" enctype='multipart/form-data'>
                                    @csrf
                                    <div class="form-group">
                                        <label for="customFile">File Pengumuman</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" value="{{ asset('files/jadwal/' . $jadwal->jadwal ? $jadwal->jadwal : '') }}" name="jadwal" required>
                                            <label class="custom-file-label" for="customFile" data-label="tugas_update">{{ $jadwal->jadwal ? $jadwal->jadwal : '' }}</label>
                                            <div class="form-text">Diizinkan PDF, maksimal 4 MB</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Perbarui</button>
                                    </div>
                                </form>
                            @else
                                <p>Belum ada jadwal pelajara. Silakan Upload jadwal pelajaran</p>
                                <form action="/administrator/jadwal-pelajaran/tambah" method="POST" enctype='multipart/form-data'>
                                    @csrf
                                    <div class="form-group">
                                        <label for="customFile">Jadwal Pelajaran</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="jadwal" required>
                                            <label class="custom-file-label" for="customFile">Pilih file Jadwal Pelajaran</label>
                                            <div class="form-text">Diizinkan PDF, maksimal 4 MB</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Publish</button>
                                    </div>
                                </form>
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
