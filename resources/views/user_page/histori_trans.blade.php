@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="/user_page.home_user" class="btn btn-primary mt-3"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user_page.home_user">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Jumlah Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $transaction->tanggal_transaction }}</td>
                                <td>
                                    @if($transaction->status == 1)
                                    Sudah Pesan & Belum dibayar
                                    @else
                                    Sudah dibayar
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($transaction->jumlah_harga) }}</td>
                                <td>
                                    <a href="/user_page.histori_trans/{{$transaction['id']}}" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
