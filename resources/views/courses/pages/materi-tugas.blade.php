@extends('courses.layouts.main')
@section('title', "Tugas")
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
                      Tugas
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

                      @if (session()->has('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                      @endif
                      @error('tugas')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                      @if (empty($tugas))
                      <div class="card-header">
                          <h6>Belum ada Tugas untuk materi <b>"{{ $materi->materi }}"</b>.</h6>
                      </div>
                      @else
                      <div class="card-header">
                          <h6>Tugas:</h6>
                          <p>created {{ $tugas->created_at->diffForHumans() }}</p>
                      </div>
                      <form action="/guru/materi/tugas/ubah/{{ $tugas->id }}" method="POST" enctype='multipart/form-data' class="card-header pt-0" style="gap:1rem">

                        {{ csrf_field() }}
                        <div id="show-tugas" class="col-12">
                          <article>
                            {{ $tugas->tugas }}
                          </article>
                          <div class="mt-2">
                            <label for="">File Tugas</label>
                            <a href="{{ asset('files/tugas/'.$tugas->dok_tugas) }}" target="_blank" class="d-block">{{ $tugas->dok_tugas }}</a>
                          </div>
                        </div>
                        <hr>
                        <div id="input-ubah-tugas" class="form-group col-12">
                          <label>Tugas/Intruksi</label>
                          <textarea class="form-control mb-2" name="tugas" rows="10" required>{{ $tugas->tugas ? $tugas->tugas : old('tugas') }}</textarea>
                          <div class="form-group">
                            <label for="customFile">Dokumen Tugas</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" data-dok="tugas_update" name="dok_tugas" required value="{{ $tugas->dok_tugas ? $tugas->dok_tugas : old('tugas') }}">
                              <label class="custom-file-label" for="customFile" data-label="tugas_update">{{ $tugas->dok_tugas ? $tugas->dok_tugas : old('tugas') }}</label>
                              <div class="form-text">Diizinkan PDF, maksimal 4 MB</div>
                            </div>
                          </div>
                          <div class="d-flex justify-content-end" style="gap:1rem">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                          </div>
                        </div>
                      </form>
                      @endif

                    </div>

                    <div class="card">
                      <div class="card-body">
                        <p><b>0</b> Terkumpul dari <b>1</b> siswa.<a href="javascript:"> Lihat selengkapnya</a></p>
                      </div>
                    </div>

                </div>
            </div>
          {{-- content start --}}
    </div>
</div>

<!-- Modal tambah -->
<div class="modal fade text-left" id="modal-tambah-tugas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Buat Tugas untuk <b>{{ $materi->materi }}</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/guru/materi/tugas/tambah/{{ $materi->id }}" method="POST" enctype='multipart/form-data'>
        
        {{ csrf_field() }}
        <div class="modal-body">
          <label>Materi</label>
          <div class="form-group">
            <input type="text" placeholder="Pythagoras" class="form-control" required value="{{ $materi->materi }}" disabled />
          </div>
          <label>Tugas/Intruksi</label>
          <div class="form-group">
            <textarea class="form-control @error('tugas') is-invalid @enderror" name="tugas" cols="30" rows="10" required>{{ old('tugas') }}</textarea>
            @error('tugas')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="customFile">Dokumen Tugas</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="dok_tugas" required>
              <label class="custom-file-label" for="customFile">Pilih file</label>
              <div class="form-text">Diizinkan PDF, maksimal 4 MB</div>
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
@endsection

@section('page-vendor-js')
<script src="{{ asset('/admin/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page-js')
<script src="{{asset('/admin/assets/js/main.js')}}"></script>
@endsection