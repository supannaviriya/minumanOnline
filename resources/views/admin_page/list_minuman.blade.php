@extends('layouts.main_admin')

@section('content')



@if(session()->has('success'))

<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
  {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

@if(session()->has('berhasil'))

<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
  {{session('berhasil')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

@if(session()->has('sukses'))

<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
  {{session('sukses')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-bold">Minuman Boba</h1>
        <p class="text-wrap lead text-center">Sebagai admin anda bisa menambah produk boba seperti nama minuman, harga, stok dan juga bisa mengupload gambar yang dibutuhkan untuk produk!.</p>
          <a href="admin_page.tambah_minum" class="btn btn-primary my-2">Tambah minum?</a>
      </div>
    </div>
  </section>

  <div class="container">

  <div class="row">
        @foreach ($minuman as $data)
            <div class="col-xs-6 col-md-4  d-flex align-items-stretch">

                <div class="card mb-3">
                    <div style="max-height: 200px; overflow:hidden;">
                        <img src="{{ asset('storage/'.$data->image) }}" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->namaMinum }}</h5>
                        <p class="card-text">Rp. {{ number_format($data->harga, 0,'','.') }}</p>

                        <a href="/admin_page.edit_minum/{{$data['id']}}" class="btn btn-primary mt-0">Edit</a>
                        <a href="delete_minum/{{$data['id']}}" class="btn btn-danger mt-0">Delete</a>

                    </div>

                </div>

            </div>
        @endforeach
</div>

  </div>

</main>



    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


  </body>
</html>




@endsection
