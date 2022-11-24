@extends('layouts.main')

@section('title', 'Register')

@section('container')
<div class="container">
    <h3 class="text-center" style="margin-top:15%">Registrasi Siswa</h3>
    <div class="col-5 mx-auto mt-5">
        <form action="/register" method="POST">
            @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>                
            @enderror
        </div>
        <div class="mb-3">
         <label for="nis" class="form-label">nis</label>
          <input type="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis') }}">
          @error('nis')
          <div class="invalid-feedback">{{ $message }}</div>                
          @enderror
        </div>
        <div class="mb-3">
         <label for="email" class="form-label">email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>                
          @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
          @error('password')
          <div class="invalid-feedback">{{ $message }}</div>                
          @enderror
        </div>
        <div class="mb-3">
            <label for="confirm-password" class="form-label">Konfirmasi Password</label>
          <input type="password" class="form-control @error('confirm-password') is-invalid @enderror" id="confirm-password" name="confirm-password">
          @error('confirm-password')
          <div class="invalid-feedback">{{ $message }}</div>                
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
</div>
@endsection