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
                          <div class="col-12">
                            <article>
                              {{ $tugas->tugas }}
                            </article>
                            <div class="mt-2">
                              <label for="">File Tugas</label>
                              <p>
                                @if (empty($tugas->dok_tugas))
                                <p>Tidak ada file tugas</p>
                                @else
                                <a href="{{ asset('files/tugas/'.$tugas->dok_tugas) }}" target="_blank">{{ $tugas->dok_tugas }}</a>
                                @endif
                              </p>
                            </div>
                          </div>
                          <hr>
                      </div>
                      @endif

                    </div>

                    <div class="card">
                      <div class="card-body">
                        @if (empty($sub_tugas))
                        <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modal-tambah-tugas"><i data-feather="plus"></i> Submit Tugas</button>
                        @else
                        <p id="reminder-text" class="px-2">kamu bisa melakukan perubahan tugas sebelum <span id="time-limit" class="text-warning"></span></p>
                        <form action="/courses/materi/tugas/ubah/{{ $sub_tugas->id }}" method="POST" enctype='multipart/form-data' class="card-header pt-0" style="gap:1rem">
    
                          {{ csrf_field() }}
                          <div id="input-ubah-tugas" class="form-group col-12 px-0">
                            <label>Tugas/Intruksi</label>
                            <textarea class="form-control mb-2" name="tugas" rows="10" required>{{ $sub_tugas->tugas ? $sub_tugas->tugas : old('tugas') }}</textarea>
                            <div class="form-group">
                              <label for="customFile">Dokumen Tugas</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" data-dok="tugas_update" value="{{ asset('files/tugas/'.$sub_tugas->dok_tugas ? $sub_tugas->dok_tugas : '') }}" name="dok_tugas">
                                <label class="custom-file-label" for="customFile" data-label="tugas_update">{{ $sub_tugas->dok_tugas ? $sub_tugas->dok_tugas : '' }}</label>
                                <div class="form-text">Diizinkan PDF, maksimal 4 MB</div>
                              </div>
                            </div>
                            <div class="d-flex justify-content-end" style="gap:1rem">
                              <button type="submit" id="btn-perbarui" class="btn btn-primary">Perbarui</button>
                            </div>
                          </div>
    
                        </form>
                        @endif
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
        <h4 class="modal-title" id="myModalLabel33">Submit tugas <b>{{ $materi->materi }}</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/courses/materi/tugas/tambah/{{ $tugas->id }}" method="POST" enctype='multipart/form-data'>
        
        {{ csrf_field() }}
        <div class="modal-body">
          <label>Tugas</label>
          <div class="form-group">
            <input type="text" class="form-control" required value="{{ $tugas->tugas }}" disabled />
          </div>
          <label>Jawaban Tugas</label>
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
          <button type="submit" class="btn btn-primary">Submit</button>
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
<script>
  let created_at = '{{ $sub_tugas->created_at }}';

  let dateCurrent = new Date(created_at),
      getTime = dateCurrent.getTime(),
      someTime = getTime + 3500000, //3500000
      decTime = someTime - new Date().getTime()
      resultTmer = decTime/1000

  if (resultTmer < 1) {
    document.querySelector('#reminder-text').textContent = 'Sisa waktu perubahan kamu sudah habis';
    document.querySelector('#btn-perbarui').setAttribute('disabled', true)
  }else{
    function startTimer(duration, display) {
    var start = Date.now(),
      diff,
      hours,
      minutes,
      seconds;
  
    function timer() {
      diff = duration - (((Date.now() - start) / 1000) | 0);
  
      hours = (diff / 3600) | 0;
      minutes = (diff / 60) % 60 | 0;
      seconds = (diff % 60) | 0;
  
      hours = hours < 10 ? "0" + hours : hours;
      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;
  
      display.textContent = hours + ":" + minutes + ":" + seconds +" Menit";
  
      if (diff <= 0) {
        // start = Date.now() + 1000;
        clearInterval(runTime)
      }
    };
    timer();
    let runTime = setInterval(timer, 1000);
  }
  var display = document.querySelector('#time-limit');
  startTimer(resultTmer, display);
}


</script>
<script src="{{asset('/admin/assets/js/main.js')}}"></script>
@endsection