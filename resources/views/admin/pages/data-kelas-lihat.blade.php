@extends('admin.layouts.main')
@section('title', "Data Kelas")
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
                  <h2 class="content-header-title float-left mb-0"><a href="{{ route('data-kelas') }}">Data Kelas</a></h2>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                      {{ $kelas->kelas }}
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          {{-- content start --}}
           <div class="card">
              <form action="/administrator/data-kelas/ubah/{{ $kelas->id }}" method="POST">

                @csrf
                <div class="modal-body">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error === 'The kelas has already been taken.' ? 'Kelas sudah digunakan!' : ''}}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  <label>Jenjang Pendidikan</label>
                  <div class="form-group">
                    <select class="form-control" name="jenjang" required>
                      <option value="smp" {{ $kelas->jenjang === 'smp' ? 'selected' : '' }}>SMP</option>
                      <option value="smk" {{ $kelas->jenjang === 'smk' ? 'selected' : '' }}>SMK</option>
                    </select>
                  </div>
                  <label>Nama Kelas</label>
                  <div class="form-group">
                    <input type="text" placeholder="X TKJ A" class="form-control" name="kelas" value="{{ old('kelas') ? old('kelas') : $kelas->kelas }}" required />
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" id="btn-simpan" class="btn btn-primary">Simpan</button>
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
@endsection