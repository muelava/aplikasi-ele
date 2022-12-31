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
                      @error('dok_materi')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                        <div class="card-header justify-content-start">
                            <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modal-tambah-materi"><i data-feather="plus"></i> Tambah Materi</button>
                        </div>
                        <div class="card-header">
                          <h6>Cari Berdasarkan Kelas & Materi:</h6>
                        </div>
                        <form action="/guru/materi" method="GET" class="card-header justify-content-start d-flex pt-0" style="gap:1rem">
                          <div class="form-group col-12 col-md-3">
                            <select class="form-control" name="kelas">
                              <option value="">Semua Kelas</option>
                              @foreach ($kelass as $kelas)
                              <option value="{{ $kelas->kelas }}" {{ request('kelas') === $kelas->kelas ? 'selected': '' }}>{{ $kelas->kelas }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-8 col-md">
                            <input type="search" class="form-control" name="materi" placeholder="Nama Materi.." value="{{ request('materi') }}">
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cari</button>
                          </div>
                        </form>
                        <hr>
                        <!-- Stats Vertical Card -->
                        <div class="row mx-0 px-2 mb-3">
                          @if ($card_materis->count() > 0)
                            @foreach ($card_materis as $card_materi)
                            <a href="javascript:" class="col-xl-2 col-md-4 col-sm-6 shadow" title="Klik info untuk lebih lanjut" onclick="card_materi('{{ $card_materi->materi_id }}', '{{ $card_materi->materi }}', '{{ $card_materi->jenjang }}', '{{ $card_materi->kelas }}', '{{ $card_materi->mapel }}', '{{ $card_materi->deskripsi }}', '{{ $card_materi->dok_materi }}', '{{ $card_materi->mata_pelajaran_id }}', '{{ $card_materi->kelas_id }}')">
                              <div class="card text-left">
                                <small class="d-block text-secondary mt-1 text-right" style="font-size:0.8rem">{{ $card_materi->materi_created_at ? \Carbon\Carbon::parse($card_materi->materi_created_at)->diffForHumans() : '-' }}</small>
                                <div class="card-body p-1">
                                  <div class="avatar bg-light-primary p-50 mb-1">
                                    <div class="avatar-content">
                                      <i data-feather="file-text" class="font-medium-5"></i>
                                    </div>
                                  </div>
                                  <h5 class="font-weight-bolder text-uppercase">{{ $card_materi->jenjang }} ({{ $card_materi->kelas }})</h5>
                                  <p class="mb-0">{{ $card_materi->mapel }}</p>
                                  <small class="card-text text-dark mb-0">{{  Str::words($card_materi->materi, 2, ' ..') }}</small>
                                </div>
                              </div>
                            </a>
                            @endforeach
                          @else
                            <p class="h5 mx-auto">Tidak Ada Materi <b>{{ request('materi') }}</b></p>
                          @endif
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
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
              <input type="file" class="custom-file-input" id="customFile" name="dok_materi" required>
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

<!-- Modal view -->
<div class="modal fade text-left" id="modal-view-materi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div>
          <div class="jenjang mb-1">
            <small class="d-block text-secondary" style="margin-bottom: 0.2rem">Jenjang</small>
            <p class="h6 text-uppercase"></p>
          </div>
          <div class="kelas mb-1">
            <small class="d-block text-secondary" style="margin-bottom: 0.2rem">Kelas</small>
            <p class="h6 text-uppercase"></p>
          </div>
          <div class="mapel mb-1">
            <small class="d-block text-secondary" style="margin-bottom: 0.2rem">Mata Pelajaran</small>
            <p class="h6"></p>
          </div>
          <div class="materi mb-1">
            <small class="d-block text-secondary" style="margin-bottom: 0.2rem">Nama Materi</small>
            <p class="h6"></p>
          </div>
          <div class="deskripsi mb-1">
            <small class="d-block text-secondary" style="margin-bottom: 0.2rem">Deskripsi</small>
            <p class="h6"></p>
          </div>
          <div class="dok_materi mb-1">
            <small class="d-block text-secondary" style="margin-bottom: 0.2rem">File Materi</small>
            <p class="h6"></p>
          </div>
          <hr>
          <div class="d-flex" style="gap:1rem">
            <a href="javascript:" id="btn-ubah" class="btn btn-sm bg-light-warning"><i data-feather="edit"></i> Ubah</a>
            <a href="javascript:" id="btn-diskusi" class="btn btn-sm bg-light-primary"><i data-feather="message-circle"></i> Diskusi</a>
            <a href="javascript:" id="btn-tugas" class="btn btn-sm bg-light-success"><i data-feather="list"></i> Tugas</a>
            <a href="javascript:" id="btn-hapus" class="btn btn-sm bg-light-danger ml-auto"><i data-feather="trash"></i> Hapus</a>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
<!-- /Modal view -->

<!-- Modal ubah -->
<div class="modal fade text-left" id="modal-ubah-materi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Ubah Materi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" enctype='multipart/form-data' method="POST">
        
        {{ csrf_field() }}
        <div class="modal-body">
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
            <input type="text" placeholder="Pythagoras" class="form-control" name="materi" required />
          </div>
          <label>Deskripsi</label>
          <div class="form-group">
            <textarea class="form-control" name="deskripsi" cols="30" rows="10" placeholder="Berikan keterangan.." required></textarea>
          </div>
          <div class="form-group">
            <label for="customFile">Dokumen Materi</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="dok_materi" required>
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
<!-- /Modal ubah -->
@endsection

@section('page-vendor-js')
<script src="{{ asset('/admin/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page-js')
<script src="{{asset('/admin/assets/js/main.js')}}"></script>
@endsection