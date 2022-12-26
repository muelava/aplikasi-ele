@extends('admin.layouts.main')
@section('title', "Data Siswa")
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
                  <h2 class="content-header-title float-left mb-0">Data Siswa</h2>
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
                            <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modal-tambah-siswa"><i data-feather="plus"></i> Tambah Siswa</button>
                            <button id="btn-print-siswa" class="btn btn-outline-primary"><i data-feather="printer"></i> Cetak</button>
                        </div>
                        <div class="table-responsive">
                        <table id="tabel-siswa" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Lahir</th>
                                    <th>No Telepon</th>
                                    <th except>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php
                                  $i = 1;
                              @endphp
                              @foreach ($siswas as $siswa)
                              <tr>
                                  <td>{{ $i++; }}</td>
                                  <td>{{ $siswa->nama }}</td>
                                  <td>{{ $siswa->kelas->kelas }}</td>
                                  <td>{{ date('d M Y', strtotime($siswa->tanggal_lahir)) }}</td>
                                  <td>{{ $siswa->no_handphone }}</td>
                                  <td except>
                                      <div class="dropdown">
                                          <button type="button" class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown" aria-expanded="false">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                          </button>
                                        <div class="dropdown-menu" style="">
                                          <a class="dropdown-item" href="/administrator/data-siswa/lihat/{{ $siswa->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye mr-50"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            <span>Lihat</span>
                                          </a>
                                          <a class="dropdown-item" href="/administrator/data-siswa/hapus/{{ $siswa->id }}" onclick="return confirm('Apakah anda yakin ingin manghapus data siswa {{ $siswa->nama }}?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash mr-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                            <span>Hapus</span>
                                          </a>
                                        </div>
                                      </div>
                                  </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
          {{-- content start --}}
    </div>
</div>

<!-- Modal tambah -->
<div class="modal fade text-left" id="modal-tambah-siswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Tambah Data Siswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/administrator/data-siswa/tambah" method="POST">
        
        @csrf
        <div class="modal-body">
          @if ($errors->any())
              <div id="error-modal-tambah-siswa" class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <label>NIS (Nomor Induk Siswa)</label>
          <div class="form-group">
            <input type="text" placeholder="112233" class="form-control" name="nis" required value="{{ old('nis') }}" />
          </div>
          <label>Nama Siswa</label>
          <div class="form-group">
            <input type="text" placeholder="Nurjanah, S.Pd." class="form-control" name="nama" required value="{{ old('nama') }}" />
          </div>
          <label>Kelas</label>
          <div class="form-group">
            <select class="form-control" name="kelas_id" required>
              @foreach ($kelass as $kelas)
              <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
              @endforeach
            </select>
          </div>
          <label>Email Siswa</label>
          <div class="form-group">
            <input type="email" placeholder="email@domain.com" class="form-control" name="email" required value="{{ old('email') }}" />
          </div>
          <label>No Telepon: </label>
          <div class="form-group">
            <input type="tel" placeholder="cth: 6281xx" class="form-control" name="no_handphone" value="{{ old('no_handphone') }}" />
          </div>
          <label>Tempat Lahir</label>
          <div class="form-group">
            <input type="text" placeholder="Jakarta" class="form-control" name="tempat_lahir" required value="{{ old('tempat_lahir') }}" />
          </div>
          <label>Tanggal Lahir</label>
          <div class="form-group">
            <input type="text" class="form-control flatpickr-basic" placeholder="TTTT-bb-hh" name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}" />
          </div>
          <label>Jenis Kelamin</label>
          <div class="form-group">
            <select class="form-control" name="jenis_kelamin" required>
              <option value="laki-laki">Laki-laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
          </div>
          <label>Agama</label>
          <div class="form-group">
            <select class="form-control" name="agama" required>
              <option value="islam">Islam</option>
              <option value="kristen">Kristen</option>
              <option value="katolik">Katolik</option>
              <option value="hindu">Hindu</option>
              <option value="buddha">Buddha</option>
              <option value="khonghucu">Khonghucu</option>
            </select>
          </div>
          <label>Tahun Masuk</label>
          <div class="form-group">
            <select class="form-control" name="tahun_masuk" required>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023" selected>2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
            </select>
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

<script type="text/javascript" src="https://jasonday.github.io/printThis/printThis.js"></script>
@endsection