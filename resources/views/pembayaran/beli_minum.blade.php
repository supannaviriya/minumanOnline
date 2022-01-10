@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">


    <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/'.$menu->image) }}" class="card-img-top">
                    </div>
                        <div class="col-md-6 mt-5">
                            <h2>{{ $menu->namaMinum}}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($menu->harga) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{ number_format($menu->stok) }}</td>
                                    </tr>

                                    <tr>
                                        <td>Jumlah Pesan</td>
                                        <td>:</td>
                                        <td>
                                             <form method="post" action="/pembayaran.beli_minum/{{$menu['id']}}" >
                                            @csrf
                                                <input type="text" name="jumlah_pesan" class="form-control" required="">
                                                <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> Masukkan Pesanan</button>
                                            </form>
                                        </td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>

</div>


@endsection
