@extends('layouts.main')

@section('content')


@if(session()->has('success'))

<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
  {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/jumbotron/">



    <!-- Bootstrap core CSS -->
<link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


  </head>
  <body>

<main>

<div class="row g-0 border rounded overflow-hidden flex-md-row mt-5 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static bg-dark">
          <h3 class="mb-0 text-light">Boba Palace</h3>
          <h5 class="card-text mt-4 text-light">Pada Boba Palace kami menjual banyak sekali macam Boba-boba. Dimulai dari original yaitu Boba Milktea, kemudian Boba yang sedang ngehits Boba Brown Sugar, ada juga Boba Taro, dan masih banyak lagi.</h5>
        </div>
        <div class="col-auto d-none d-lg-block">

            <div class ="bd-placeholder-img" width="200" height="250">
            <img src="{{ asset('storage\image\0A0MFU3FE2v6hXS5QYy4fxEjUUpSq7tzczX323J9.jpg') }}" style="max-height: 300px; overflow:hidden;" class="bd-placeholder-img" alt="...">
            </div>


        </div>
      </div>

</main>

  </body>
</html>

@endsection
