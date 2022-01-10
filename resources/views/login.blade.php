@extends('layouts.main')

@section('content')

<div class="row justify-content-center">

  <div class="col-md-4">

    @if(session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
      {{session('success')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif

    @if(session()->has('userError'))

    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
      {{session('userError')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif

    <main class="form-signin">

      <h1 class="h3 mb-3 fw-normal text-center mt-3">Login</h1>
    <form action="/login" method="post">
    @csrf


      <div class="form-floating">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" autofocus required value="{{old('email')}}">
        <label for="email">Email address</label>
      @error('email')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
      </div>
      <div class="form-floating">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
        <label for="password">Password</label>
      @error('password')
        <div class="invalid-feedback">{{$message}}</div>
      @enderror
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    </form>

    <small class="d-block text-center mt-3">Dont have an account? <a href="/register">Register Now!</a></small>
    </main>

  </div>
</div>

@endsection
