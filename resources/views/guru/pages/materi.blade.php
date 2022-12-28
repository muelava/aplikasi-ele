@extends('guru.layouts.main')
@section('title', "Kelola Materi")
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
                  <h2 class="content-header-title float-left mb-0">Materi</h2>
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
                        <div class="card-header justify-content-start">
                            <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modal-tambah-materi"><i data-feather="plus"></i> Tambah Materi</button>
                        </div>
                        <hr>
                        <div class="card-header justify-content-start d-flex" style="gap:1rem">
                            <a href="javascript:" class="btn btn-primary" >Semua</a>
                            <a href="javascript:" class="btn btn-outline-primary" >SMP</a>
                            <a href="javascript:" class="btn btn-outline-primary" >SMK</a>
                        </div>
                        <!-- Stats Vertical Card -->
                        <div class="row mx-0 mb-3">
                          @foreach ($materis as $materi)
                          <a href="#" class="col-xl-2 col-md-4 col-sm-6 shadow" title="{{ $materi->materi }}" data-toggle="modal" data-target="#modal-view-materi" onclick="card_materi(this)">
                            <div class="card text-left">
                              <small class="d-block text-secondary mt-1 text-right" style="font-size:0.8rem">{{ $materi->created_at ? $materi->created_at->diffForHumans() : '' }}</small>
                              <div class="card-body p-1">
                                <div class="avatar bg-light-primary p-50 mb-1">
                                  <div class="avatar-content">
                                    <i data-feather="file-text" class="font-medium-5"></i>
                                  </div>
                                </div>
                                <h5 class="font-weight-bolder text-uppercase">{{ $materi->kelas->jenjang }} ({{ $materi->kelas->kelas }})</h5>
                                <small class="card-text text-dark mb-0">{{  Str::words($materi->materi, 2, ' ..') }}</small>
                              </div>
                            </div>
                          </a>
                          @endforeach
                        </div>
                        <!--/ Stats Vertical Card -->
                        
                      </div>

                </div>
            </div>
          {{-- content start --}}
    </div>
</div>

<!-- Modal tambah -->
<div class="modal fade text-left" id="modal-tambah-materi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Tambah Materi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/guru/materi/tambah" enctype='multipart/form-data' method="POST">
        
        {{ csrf_field() }}
        <div class="modal-body">
          @if ($errors->any())
              <div id="error-modal-tambah-materi" class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <label>Mata Pelajaran</label>
          <div class="form-group">
            <select class="form-control" name="mata_pelajaran_id" required>
              @foreach ($mapels as $mapel)
              <option value="{{ $mapel->id }}">{{ $mapel->mapel }}</option>
              @endforeach
            </select>
          </div>
          <label>Kelas</label>
          <div class="form-group">
            <select class="form-control" name="kelas_id" required>
              @foreach ($kelass as $kelas)
              <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
              @endforeach
            </select>
          </div>
          <label>Nama Materi</label>
          <div class="form-group">
            <input type="text" placeholder="Pythagoras" class="form-control" name="materi" required value="{{ old('materi') }}" />
          </div>
          <label>Deskripsi</label>
          <div class="form-group">
            <textarea class="form-control" name="deskripsi" cols="30" rows="10" placeholder="Berikan keterangan.." required>{{ old('deskripsi') }}</textarea>
          </div>
          <div class="form-group">
            <label for="customFile">Dokumen Materi</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="dok_materi">
              <label class="custom-file-label" for="customFile">Pilih file</label>
              <div class="form-text">Diharuskan PDF, maksimal 4MB</div>
            </div>
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

<!-- Modal view -->
<div class="modal fade text-left" id="modal-view-materi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal view -->
@endsection

@section('page-vendor-js')
<script src="{{ asset('/admin/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page-js')
<script src="{{asset('/admin/assets/js/main.js')}}"></script>
@endsection