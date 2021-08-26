@extends('layouts.main')

@section('title', 'register')

@section('container')
<div class="container">
    <h3 class="text-center" style="margin-top:15%">Registrasi Siswa</h3>
    <div class="col-5 mx-auto mt-5">
        <form action="/register" method="POST">
            @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>                
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
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
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
</div>
@endsection