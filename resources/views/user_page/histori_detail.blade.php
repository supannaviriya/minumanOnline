@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="/user_page.histori_trans" class="btn btn-primary mt-3"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user_page.home_user">Home</a></li>
                    <li class="breadcrumb-item"><a href="/user_page.histori_trans">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ol>
            </nav>
        </div>dddddddddddddddd
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <h5>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank BCA di rekening 5271763612</strong> dengan total : <strong>Rp. {{ number_format($transaction->jumlah_harga) }}</strong></h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                    @if(!empty($transaction))
                    <p align="right">Tanggal Pesan : {{ $transaction->tanggal_transaction }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($transaction_details as $transaction_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$transaction_detail->menu->image) }}" width="100" alt="...">
                                </td>
                                <td>{{ $transaction_detail->menu->namaMinum }}</td>
                                <td>{{ $transaction_detail->jumlah_barang }} kain</td>
                                <td align="right">Rp. {{ number_format($transaction_detail->menu->harga) }}</td>
                                <td align="right">Rp. {{ number_format($transaction_detail->jumlah_harga) }}</td>

                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($transaction->jumlah_harga) }}</strong></td>

                            </tr>

                             <tr>
                                <td colspan="5" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($transaction->jumlah_harga) }}</strong></td>

                            </tr>

                        </tbody>
                    </table>
                    @endif

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
