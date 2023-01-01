@extends('guru.layouts.main')
@section('title', "Profile")
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
                  <h2 class="content-header-title float-left mb-0"><a href="{{ route('guru-beranda') }}">Pengaturan</a></h2>
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
            <div class="row" id="table-hover-row">
                <div class="col-12">

                  <!-- pengaturan page -->
                  <section id="page-account-settings">
                    <div class="row">
                      <!-- left menu section -->
                      <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column nav-left">
                          <!-- general -->
                          <li class="nav-item">
                            <a
                              class="nav-link active"
                              id="account-pill-profil"
                              data-toggle="pill"
                              href="#account-vertical-profil"
                              aria-expanded="true"
                            >
                              <i data-feather="user" class="font-medium-3 mr-1"></i>
                              <span class="font-weight-bold">Profil</span>
                            </a>
                          </li>
                          <!-- change password -->
                          <li class="nav-item">
                            <a
                              class="nav-link"
                              id="account-pill-password"
                              data-toggle="pill"
                              href="#account-vertical-password"
                              aria-expanded="false"
                            >
                              <i data-feather="lock" class="font-medium-3 mr-1"></i>
                              <span class="font-weight-bold">Ubah Password</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <!--/ left menu section -->

                      <!-- right content section -->
                      <div class="col-md-9">
                        <div class="card">
                          <div class="card-body">
                            <div class="tab-content">
                              <!-- general tab -->
                              <div
                                role="tabpanel"
                                class="tab-pane active"
                                id="account-vertical-profil"
                                aria-labelledby="account-pill-profil"
                                aria-expanded="true"
                              >
                                <!-- header media -->
                                <div class="media">
                                  <a href="javascript:void(0);" class="mr-25">
                                    <img
                                      src="{{ asset('admin/images/portrait/small/avatar-s-11.jpg') }}"
                                      id="account-upload-img"
                                      class="rounded mr-50"
                                      alt="profile image"
                                      height="80"
                                      width="80"
                                    />
                                  </a>
                                  <!-- upload and reset button -->
                                  <div class="media-body mt-75 ml-1">
                                    <label for="account-upload" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                    <input type="file" id="account-upload" hidden accept="image/*" />
                                    <button class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                    <p>Allowed JPG, GIF or PNG. Max size of 800kB</p>
                                  </div>
                                  <!--/ upload and reset button -->
                                </div>
                                <!--/ header media -->

                                <!-- form -->
                                <form class="validate-form mt-2" action="javascript:" method="POST">
                                  <div class="row">
                                    <div class="col-12 col-sm-6">
                                      <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="nip"
                                          name="nip"
                                          placeholder="NIP"
                                          value="{{ $guru->nip }}"
                                        />
                                      </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                      <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="nama"
                                          name="nama"
                                          placeholder="nama"
                                          value="{{ $guru->nama }}"
                                        />
                                      </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                      <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input
                                          type="email"
                                          class="form-control"
                                          id="email"
                                          name="email"
                                          placeholder="Email"
                                          value="{{ $guru->email }}"
                                        />
                                      </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                      <div class="form-group">
                                        <label for="no_handphone">Nomor Handphone</label>
                                        <input
                                          type="tel"
                                          class="form-control"
                                          id="no_handphone"
                                          name="no_handphone"
                                          placeholder="Nomor Handphone"
                                          value="{{ $guru->no_handphone }}"
                                        />
                                      </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                      <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input
                                          type="text"
                                          class="form-control flatpickr-basic"
                                          id="tanggal_lahir"
                                          name="tanggal_lahir"
                                          placeholder="Tanggal Lahir"
                                          value="{{ $guru->tanggal_lahir }}"
                                        />
                                      </div>
                                    </div>
                                    {{-- <div class="col-12 mt-75">
                                      <div class="alert alert-warning mb-50" role="alert">
                                        <h4 class="alert-heading">Your email is not confirmed. Please check your inbox.</h4>
                                        <div class="alert-body">
                                          <a href="javascript: void(0);" class="alert-link">Resend confirmation</a>
                                        </div>
                                      </div>
                                    </div> --}}
                                    <div class="col-12">
                                      <button type="submit" class="btn btn-primary mt-2 d-block ml-auto">Simpan Perubahan</button>
                                    </div>
                                  </div>
                                </form>
                                <!--/ form -->
                              </div>
                              <!--/ general tab -->

                              <!-- change password -->
                              <div
                                class="tab-pane fade"
                                id="account-vertical-password"
                                role="tabpanel"
                                aria-labelledby="account-pill-password"
                                aria-expanded="false"
                              >
                                <!-- form -->
                                <form class="validate-form" action="javascript:" method="POST">
                                  <div class="row">
                                    <div class="col-12 col-sm-6">
                                      <div class="form-group">
                                        <label for="account-old-password">Password Saat Ini</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                          <input
                                            type="password"
                                            class="form-control"
                                            id="account-old-password"
                                            name="password"
                                            placeholder="Masukkan Password saat ini"
                                          />
                                          <div class="input-group-append">
                                            <div class="input-group-text cursor-pointer">
                                              <i data-feather="eye"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12 col-sm-6">
                                      <div class="form-group">
                                        <label for="account-new-password">Password Baru</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                          <input
                                            type="password"
                                            id="account-new-password"
                                            name="new-password"
                                            class="form-control"
                                            placeholder="Masukkan Password Baru"
                                          />
                                          <div class="input-group-append">
                                            <div class="input-group-text cursor-pointer">
                                              <i data-feather="eye"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                      <div class="form-group">
                                        <label for="account-retype-new-password">Konfirmasi Password Baru</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                          <input
                                            type="password"
                                            class="form-control"
                                            id="account-retype-new-password"
                                            name="confirm-new-password"
                                            placeholder="Masukkan Konfirmasi Password Baru"
                                          />
                                          <div class="input-group-append">
                                            <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="mt-1 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mr-1" disabled>Simpan Perubahan</button>
                                        <button type="reset" class="btn btn-outline-secondary" disabled>Batal</button>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                                <!--/ form -->
                              </div>
                              <!--/ change password -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/ right content section -->
                    </div>
                  </section>
                  <!-- / pengaturan page -->

                </div>
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