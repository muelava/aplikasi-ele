@extends('courses.layouts.main')
@section('title', 'Materi')
@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">

    <meta name="_token" content="{{ csrf_token() }}">
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
                            <a class="btn text-primary pl-0" target="_blank" href="{{ asset('files/materies/' . $materi->dok_materi) }}">Download
                                Materi</a>

                            <small class="d-block mt-2">Tugas</small>
                            @if ($materi->tugas->count() > 0)
                                <a class="btn text-primary pl-0" href="{{ asset('courses/materi/tugas/' . $materi->id) }}">Lihat Tugas</a>
                            @else
                                <p>Belum ada tugas</p>
                            @endif

                        </div>
                    </div>
                    {{-- end Materi --}}

                    @if ($diskusis->count() > 0)
                        <h4 class="text-center mb-2 mt-3">({{ $diskusis->count() }}) Diskusi</h4>
                    @else
                        <h4 class="text-center mb-2 mt-3">Tidak Ada Diskusi</h4>
                    @endif
                    <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modal-tambah-diskusi"><i data-feather="plus"></i>
                        Diskusi</button>

                    @if (session()->has('similiarity_error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('similiarity_error') }}
                        </div>
                    @endif

                    {{-- start diskusi --}}
                    @if ($diskusis->count() > 0)

                        @foreach ($diskusis as $diskusi)
                            <div class="diskusi card mb-1" diskusi="{{ $diskusi->id }}">
                                <div class="card-header">
                                    <div>
                                        <small class="font-weight-bold">{{ $diskusi->guru ? $diskusi->guru->nama : $diskusi->siswa->nama }}</small>
                                        •
                                        <small>{{ $diskusi->created_at->diffForHumans() }}</small>
                                    </div>
                                    <small class="d-block text-capitalize" style="margin-top: 0.25rem">{{ $diskusi->guru ? $diskusi->guru->role : $diskusi->siswa->role }}</small>
                                </div>

                                <div class="card-body">
                                    <p>{{ $diskusi->komentar }}</p>
                                    <button class="btn text-primary" onclick="reply_button_siswa(this)">Balas</button>
                                </div>
                            </div>

                            @php
                                $tbl_sub_diskusi = App\Models\SubDiskusi::where('diskusi_id', $diskusi->id)
                                    ->orderBy('id', 'desc')
                                    ->get();
                            @endphp

                            @if ($tbl_sub_diskusi->count() > 0)
                                @foreach ($tbl_sub_diskusi as $sub_diskusi)
                                    <div class="sub-diskusi card ml-3">
                                        <div class="card-header">
                                            <div>
                                                <small class="font-weight-bold">{{ $sub_diskusi->guru ? $sub_diskusi->guru->nama : $sub_diskusi->siswa->nama }}</small>
                                                •
                                                <small>{{ $sub_diskusi->created_at->diffForHumans() }}</small>
                                            </div>
                                            <small class="d-block text-capitalize" style="margin-top: 0.25rem">{{ $sub_diskusi->guru ? $sub_diskusi->guru->role : $sub_diskusi->siswa->role }}</small>
                                        </div>
                                        <div class="card-body">
                                            <p>{{ $sub_diskusi->komentar }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach

                    @endif
                    {{-- end diskusi --}}

                </div>
            </div>
            {{-- content start --}}
        </div>
    </div>

    <!-- Modal tambah -->
    <div class="modal fade text-left" id="modal-tambah-diskusi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Diskusi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/courses/materi/tambah-diskusi/{{ $materi->id }}" method="POST">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label>Diskusi materi</label>
                        <h4 class="mb-3">{{ $materi->materi }}</h4>
                        <label>Komentar</label>
                        <div class="form-group">
                            <textarea class="form-control @error('komentar') is-invalid @enderror" name="komentar" cols="30" rows="10" placeholder="Tulis komentar.." required>{{ old('komentar') }}</textarea>
                            @error('komentar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modal tambah -->
@endsection

@section('page-vendor-js')
    <script src="{{ asset('/admin/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('/admin/assets/js/main.js') }}"></script>
@endsection
