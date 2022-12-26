@extends('admin.layouts.main')
@section('title', "Data Mata Pelajaran")
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
                  <h2 class="content-header-title float-left mb-0"><a href="{{ route('data-mapel') }}">Data  Mata Pelajaran</a></h2>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                      {{ $mapel->mapel }}
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          {{-- content start --}}
           <div class="card">
              <form action="/administrator/data-mata-pelajaran/ubah/{{ $mapel->id }}" method="POST">

                @csrf
                <div class="modal-body">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  <label>Nama Mata Pelajaran</label>
                  <div class="form-group">
                    <input type="text" placeholder="Bahasa Indonesia" class="form-control" name="mapel" value="{{ old('mapel') ? old('mapel') : $mapel->mapel }}" required />
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