@extends('/layouts.main')
@section('title', 'Login')

@section('container')
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    
    <div class="carousel-inner">
      <div class="carousel-item active">
        {{-- <img class="img-background" src="/img/hero (2).jpg" alt="" > --}}
        <div class="container d-flex">
          <div class="carousel-caption text-start">
            <p><a class="btn btn-lg fw-bold btn-light shadow-sm" href="#cara-login">Lihat Cara Login <i class="bi bi-chevron-double-down"></i></a></p>
          </div>
        </div>
      </div>
     
    </div>
   
  </div>

  <div class="container">
  <h4 class="fw-bold text-center my-5" id="cara-login">Please Login</h4>
   <div class="row justify-content-center">

    <form class="col-4 text-center">
      <div class="mb-3 form-floating">
        <input type="text" id="username" class="form-control form-control-sm" placeholder="Username" aria-describedby="emailHelp" autofocus>
        <label for="username">Username</label>
      </div>
      <div class="mb-3 form-floating">
        <input type="password" id="password" class="form-control form-control-sm" placeholder="Password">
        <label for="password">Password</label>
      </div>
      <button type="submit" class="btn btn-primary my-3">Submit</button>
    </form>
    <small class="text-center"><a href="#">Lupa Password?</a></small>
    
  </div>

</div>
@endsection