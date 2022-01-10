<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Project-Webprog-Viriya</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">



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


    <!-- Custom styles for this template -->
    <link href="{{asset('front/headers.css')}}" rel="stylesheet">
  </head>
  <body>


<main>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">


      @auth
      <ul class="navbar-nav me-auto mb-2 mb-sm-0">

      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/admin_page.home_admin">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/admin_page.list_minuman">List Minuman</a>
      </li>


      </ul>
      <div class="text-center text-white fw-bold">
        <small>Welcome back, {{auth()->user()->username}} </small>
      </div>

      <form action="/logout" method="post">
        @csrf

        <button type="submit" class="btn btn-danger ms-3">
          Logout
        </button>
      </form>
      @else
      <ul class="navbar-nav me-auto mb-2 mb-sm-0">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/home">Home</a>
        </li>

      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-sm-0">

        <li class="nav-item">
          <a href="/login">
            <button type="button" class="btn btn-primary me-2">Login</button></a>
        </li>

        <li class="nav-item">
          <a href="/register">
          <button type="button" class="btn btn-primary me-2 ">Register</button></a>
        </li>

      </ul>

      @endauth



      </div>
    </div>
  </nav>



  <div class="container">
    @yield('content')
</div>


</main>


    <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>

    <link href="{{asset('front/login.css')}}" rel="stylesheet">

  </body>
</html>
