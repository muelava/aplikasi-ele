@extends('layouts.main')
@section('title','E-Learning')

@section('container')


<div class="container" style="margin-top: 10em">
    <div class="mt-5 d-flex flex-wrap">
        @for ($i = 1; $i <= 25; $i++)
        <a href="#pert" class="btn p-5 text-center shadow-sm pertemuan">Pertemuan <p>{{ $i }}</p></a>
        @endfor
    </div>
</div>

@endsection