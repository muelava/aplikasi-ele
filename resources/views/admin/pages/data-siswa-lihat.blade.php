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
                  <h2 class="content-header-title float-left mb-0"><a href="{{ route('data-siswa') }}">Data Siswa</a></h2>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                      {{ $siswa->nama }}
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          {{-- content start --}}
           <div class="card">
              <form action="/administrator/data-siswa/ubah/{{ $siswa->id }}" method="POST">

                @csrf
                <div class="modal-body">
                  @if (session()->has('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  @if ($errors->any())
                      <div id="error-ubah-siswa" class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error === 'The email has already been taken.' ? 'Email sudah digunakan!' : 'NIS sudah digunakan!'}}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  <label>NIP (Nomor Induk Siswa)</label>
                  <div class="form-group">
                    <input type="text" placeholder="112233" class="form-control" name="nis" required value="{{ old('nis') ? old('nis') : $siswa->nis }}" disabled />
                  </div>
                  <label>Nama Siswa</label>
                  <div class="form-group">
                    <input type="text" placeholder="Nurjanah, S.Pd." class="form-control" name="nama" required value="{{ old('nama') ? old('nama') : $siswa->nama }}" disabled />
                  </div>
                  <label>Kelas</label>
                  <div class="form-group">
                    <select class="form-control" name="kelas_id" required disabled>
                      @foreach ($kelass as $kelas)
                      <option value="{{ $kelas->id }}" {{ $siswa->kelas_id === $kelas->id ? 'selected' : '' }}>{{ $kelas->kelas }}</option>
                      @endforeach
                    </select>
                  </div>
                  <label>Email Siswa</label>
                  <div class="form-group">
                    <input type="email" placeholder="email@domain.com" class="form-control" name="email" required value="{{ old('email') ? old('email') : $siswa->email }}" disabled />
                  </div>
                  <label>No Telepon: </label>
                  <div class="form-group">
                    <input type="tel" placeholder="cth: 6281xx" class="form-control" name="no_handphone" value="{{ old('no_handphone') ? old('no_handphone') : $siswa->no_handphone }}" disabled />
                  </div>
                  <label>Tempat Lahir</label>
                  <div class="form-group">
                    <input type="text" placeholder="Jakarta" class="form-control" name="tempat_lahir" required value="{{ old('tempat_lahir') ? old('tempat_lahir') : $siswa->tempat_lahir }}" disabled />
                  </div>
                  <label>Tanggal Lahir</label>
                  <div class="form-group">
                    <input type="text" class="form-control flatpickr-basic" placeholder="TTTT-bb-hh" name="tanggal_lahir" required value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $siswa->tanggal_lahir }}" disabled />
                  </div>
                  <label>Jenis Kelamin</label>
                  <div class="form-group">
                    <select class="form-control" name="jenis_kelamin" required disabled>
                      <option value="laki-laki" {{ $siswa->jenis_kelamin === 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                      <option value="perempuan" {{ $siswa->jenis_kelamin === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                  </div>
                  <label>Agama</label>
                  <div class="form-group">
                    <select class="form-control" name="agama" required disabled>
                      <option value="islam" {{ $siswa->agama === 'islam' ? 'selected' : '' }}>Islam</option>
                      <option value="kristen" {{ $siswa->agama === 'kristen' ? 'selected' : '' }}>Kristen</option>
                      <option value="katolik" {{ $siswa->agama === 'katolik' ? 'selected' : '' }}>Katolik</option>
                      <option value="hindu" {{ $siswa->agama === 'hindu' ? 'selected' : '' }}>Hindu</option>
                      <option value="buddha" {{ $siswa->agama === 'buddha' ? 'selected' : '' }}>Buddha</option>
                      <option value="khonghucu" {{ $siswa->agama === 'khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                    </select>
                  </div>
                  <label>Tahun Masuk</label>
                  <div class="form-group">
                    <select class="form-control" name="tahun_masuk" required disabled>
                      <option value="2017" {{ $siswa->tahun_masuk === '2017' ? 'selected' : '' }}>2017</option>
                      <option value="2018" {{ $siswa->tahun_masuk === '2018' ? 'selected' : '' }}>2018</option>
                      <option value="2019" {{ $siswa->tahun_masuk === '2019' ? 'selected' : '' }}>2019</option>
                      <option value="2020" {{ $siswa->tahun_masuk === '2020' ? 'selected' : '' }}>2020</option>
                      <option value="2021" {{ $siswa->tahun_masuk === '2021' ? 'selected' : '' }}>2021</option>
                      <option value="2022" {{ $siswa->tahun_masuk === '2022' ? 'selected' : '' }}>2022</option>
                      <option value="2023" {{ $siswa->tahun_masuk === '2023' ? 'selected' : '' }}>2023</option>
                      <option value="2024" {{ $siswa->tahun_masuk === '2024' ? 'selected' : '' }}>2024</option>
                      <option value="2025" {{ $siswa->tahun_masuk === '2025' ? 'selected' : '' }}>2025</option>
                    </select>
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

  if ($('#error-ubah-siswa').length) {
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