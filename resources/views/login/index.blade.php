@extends('/layouts.main')
@section('title', 'Login | Selamat Datang Kembali')

@section('container')
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="img-background" src="/img/hero (2).jpg" alt="" >
        <div class="container d-flex">
          <div class="carousel-caption lihat-cara-login text-start">
            {{-- <p><a class="btn text-white" href="#cara-login">Lihat Cara Login <i class="bi bi-chevron-right"></i></a></p> --}}
          </div>
        </div>
      </div>
     
    </div>
   
  </div>

  <div class="container">
  <h4 class="fw-bold text-center my-5" id="form-login">Silakan Login</h4>
   <div class="row justify-content-center">

     
     <form action="/login" method="POST" class="col-lg-4 text-center">
      @if (session()->has('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @csrf


      @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif    

      <div class="mb-3 form-floating">
        <input type="text" id="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="NIS/Email" name="email" value="{{ old('email') }}" autofocus>
        <label for="email">NIS/Email</label>
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 form-floating">
        <input type="password" id="password" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Password" name="password">
        <label for="password">Password</label>
        @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <button type="submit" class="btn my-3 btn-premiere text-white fw-bold px-5">Login</button>
    </form>

    <small class="text-center"><a href="#">Lupa Password?</a></small>
  </div>
  
  <section class="row justify-content-center" id="cara-login">
    <h4 class="fw-bold text-center mb-4">Cara Login</h4>
    <div class="col-md-5">
      <img class="w-100" src="/img/cara-login-guru.png" alt="">
    </div>
    <div class="col-md-5">
      <img class="w-100" src="/img/cara-login-siswa.png" alt="">
    </div>
  </section>
</div>

<script>
  $(document).ready(function(){
  $('html,body').animate({
    scrollTop: $('#form-login').offset().top - 80
  }, 800, 'easeInOutExpo');
  })
</script>

@endsection