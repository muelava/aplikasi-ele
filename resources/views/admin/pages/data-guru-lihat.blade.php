@extends('admin.layouts.main')
@section('title', "Data Guru")
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
                  <h2 class="content-header-title float-left mb-0"><a href="{{ route('data-guru') }}">Data Guru</a></h2>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                      {{ $guru->nama }}
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          {{-- content start --}}
           <div class="card">
              <form action="/administrator/data-guru/ubah/{{ $guru->id }}" method="POST">

                @csrf
                <div class="modal-body">
                  @if (session()->has('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  @if ($errors->any())
                      <div id="error-ubah-guru" class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error === 'The email has already been taken.' ? 'Email sudah digunakan!' : 'NIP sudah digunakan!'}}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  <label>NIP/NIK</label>
                  <div class="form-group">
                    <input type="text" placeholder="112233" class="form-control" name="nip" required value="{{ old('nip') ? old('nip') : $guru->nip }}" disabled />
                  </div>
                  <label>Nama Guru</label>
                  <div class="form-group">
                    <input type="text" placeholder="Nurjanah, S.Pd." class="form-control" name="nama" required value="{{ old('nama') ? old('nama') : $guru->nama }}" disabled />
                  </div>
                  <label>Email Guru</label>
                  <div class="form-group">
                    <input type="email" placeholder="email@domain.com" class="form-control" name="email" required value="{{ old('email') ? old('email') : $guru->email }}" disabled />
                  </div>
                  <label>No Telepon: </label>
                  <div class="form-group">
                    <input type="tel" placeholder="cth: 6281xx" class="form-control" name="no_handphone" value="{{ old('no_handphone') ? old('no_handphone') : $guru->no_handphone }}" disabled />
                  </div>
                  <label>Tanggal Lahir</label>
                  <div class="form-group">
                    <input type="text" class="form-control flatpickr-basic" placeholder="TTTT-bb-hh" name="tanggal_lahir" required value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $guru->tanggal_lahir }}" disabled />
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" id="btn-ubah" class="btn btn-outline-primary">Ubah Data</button>
                  <button type="submit" id="btn-simpan" class="btn btn-primary d-none">Simpan</button>
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
<script src="{{asset('/admin/assets/js/main.js')}}"></script>
<script>
  let btnUbah = $('#btn-ubah'),
      btnSimpan = $('#btn-simpan');
  
  function toggle_attr(){
    btnSimpan.toggleClass('d-none');
    btnUbah.toggleClass('d-none');
    $('.form-control').attr('disabled', false)
  }

  if ($('#error-ubah-guru').length) {
    toggle_attr()
  }
  btnUbah.on('click', function(){
    toggle_attr()
  });
  btnSimpan.on('click', function(){
    btnUbah.toggleClass('d-none');
    btnSimpan.toggleClass('d-none');
  });
</script>
@endsection