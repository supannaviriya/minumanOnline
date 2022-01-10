@extends('layouts.main')

@section('content')

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-bold">Daftar Minuman</h1>
        <p class="text-wrap lead text-center">Pada Boba Palace anda bisa memilih berbagai macam Boba. Dimulai dari Boba Mliktea, Boba Brown Sugar, Boba Taro dan masih banyak lagi! </p>

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

                    <a href="/pembayaran.beli_minum/{{$data['id']}}" class="btn btn-primary mt-0">Beli</a>

                    </div>
                </div>

            </div>
        @endforeach
</div>



  </div>

</main>


@endsection
