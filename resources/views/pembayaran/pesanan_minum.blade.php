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
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
                    @if(!empty($transaction))
                    <p align="right">Tanggal Pesan : {{ $transaction->tanggal_transaction }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Minum</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Delete</th>
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
                                <td>{{ $transaction_detail->jumlah_barang }} Minum</td>
                                <td >Rp. {{ number_format($transaction_detail->menu->harga) }}</td>
                                <td >Rp. {{ number_format($transaction_detail->jumlah_harga) }}</td>
                                <td>
                                    <form action="pembayaran.pesanan_minum/{{$transaction_detail['id']}}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td><strong>Rp. {{ number_format($transaction->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="konfirmasi" class="btn btn-success" onclick="return confirm('Anda yakin akan Check Out ?');">
                                        <i class="fa fa-shopping-cart"></i> Check Out
                                    </a>
                                </td>
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
