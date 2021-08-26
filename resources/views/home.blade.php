@extends('layouts.main')

@section('title', "SMP SMK Bina Ikhwani")

@section('container')
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="img-background" src="/img/hero (2).jpg" alt="" >
        <div class="container d-flex">
          <div class="carousel-caption text-start">
            <h3 class="w-50">Membangun generasi beriman, berilmu dan beradab</h3>
            <p>Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Check</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="" src="/img/hero (3).jpg" alt="" >
        {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg> --}}

        <div class="container">
          <div class="carousel-caption text-end">
            <h3>Another example headline.</h3>
            <p>Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
     
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container">

  <h4 class="fw-bold text-center my-5">Announcement</h4>
   <!-- Three columns of text below the carousel -->
   <div class="row justify-content-center">
    <div class="col-md-2 mb-3 text-center">
      <img src="/img/hero (5).jpg" class="rounded-circle modal-below" width="150" alt="">
    </div>
    <div class="col-md-2 text-center">
      <img src="/img/hero (6).jpg" class="rounded-circle modal-below" width="150" alt="">
    </div>
  </div>
</div>

<div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg d-flex align-items-center">
    <div class="modal-content">
      <img class="modal-carousel img-fluid w-100" alt="">
    </div>
  </div>
</div>

<script>
  $(".modal-below").on('click', function(){
    $('.modal').modal("show");
    let x = $(this).attr('src')
    $(".modal-carousel").attr("src", x);
  })
  </script>
@endsection


