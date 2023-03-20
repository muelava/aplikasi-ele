@extends('admin.layouts.main')
@section('title', 'Data Kelas')
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
                            <h2 class="content-header-title float-left mb-0"><a href="{{ route('pengumuman') }}">Pengumuman</a></h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    {{ $pengumuman->judul }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- content start --}}
            <div class="card">
                <form action="/administrator/pengumuman/ubah/{{ $pengumuman->id }}" method="POST" enctype='multipart/form-data'>

                    @csrf
                    <div class="modal-body">
                        @if ($errors->any())
                            <div id="error-modal-tambah-pengumuman" class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" placeholder="Judul" class="form-control" name="judul" required value="{{ old('judul') ? old('judul') : $pengumuman->judul }}" />
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="" rows="5" placeholder="deskripsi">{{ old('judul') ? old('judul') : $pengumuman->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="customFile">File Pengumuman</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" value="{{ asset('files/pengumuman/' . $pengumuman->file ? $pengumuman->file : '') }}" name="file">
                                <label class="custom-file-label" for="customFile" data-label="tugas_update">{{ $pengumuman->file ? $pengumuman->file : '' }}</label>
                                <div class="form-text">Diizinkan PDF, maksimal 4 MB</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
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
