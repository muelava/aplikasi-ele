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
                        <div class="card-header justify-content-start">
                            <a href="javascript:" class="btn btn-primary mr-2" >Semua</a>
                            <a href="javascript:" class="btn btn-outline-primary mr-2" >SMP</a>
                            <a href="javascript:" class="btn btn-outline-primary mr-2" >SMK</a>
                        </div>
                        <!-- Stats Vertical Card -->
                        <div class="row mx-0 mb-3">
                          @for ($i = 0; $i < 5; $i++)
                          <a href="javascript:" class="col-xl-2 col-md-4 col-sm-6 shadow" title="cobain deh">
                            <div class="card text-center">
                              <div class="card-body">
                                <div class="avatar bg-light-primary p-50 mb-1">
                                  <div class="avatar-content">
                                    <i data-feather="book" class="font-medium-5"></i>
                                  </div>
                                </div>
                                <h2 class="font-weight-bolder">SMK</h2>
                                <p class="card-text text-dark">Pythagoras</p>
                              </div>
                            </div>
                          </a>
                          @endfor
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
      <form action="/administrator/materi/tambah" method="POST">
        
        @csrf
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
          <label>Nama Materi</label>
          <div class="form-group">
            <input type="text" placeholder="Pythagoras" class="form-control" name="mapel" required value="{{ old('materi') }}" />
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