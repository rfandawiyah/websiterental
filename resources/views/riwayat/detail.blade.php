@extends('kerangka.master')
@section('title', 'Detail Riwayat')
@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-15">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h4>Detail riwayat</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('riwayat') }}">Riwayat</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail riwayat</li>
                            </ol>
                        </nav>
                        <table class="table table-striped">
                            @foreach ($rent->rentDetails as $detail)
                                <tr>
                                    <th>Customer</th>
                                    <td>{{ $rent->customer->nama }} ({{ $rent->customer->NIK }})</td>
                                </tr>
                                <tr>
                                    <th>Merk Mobil</th>
                                    <td>{{ $detail->car->merkmobil }}</td>
                                </tr>
                                <tr>
                                    <th>Nopol</th>
                                    <td>{{ $detail->car->nopol }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Sewa</th>
                                    <td>{{ $rent->tgl_sewa }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Akhir Sewa</th>
                                    <td>{{ $detail->tgl_pengembalian }}</td>
                                </tr>
                                <tr>
                                    <th>Harga Perhari</th>
                                    <td>Rp. {{ number_format($detail->car->harga, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Total Pembayaran</th>
                                    <td>Rp. {{ number_format($detail->lama_sewa * $detail->car->harga, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pembayaran</th>
                                    <td>{{ $rent->tgl_pembayaran }}</td>
                                </tr>
                                <tr>
                                    <th>Lama Sewa</th>
                                    <td>{{ $detail->lama_sewa }} hari</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $rent->status }}</td>
                                </tr>
                        </table>
                        @endforeach
                        <form action="{{ route('riwayat.konfirmasi', $rent->id_sewa) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Pesanan Selesai</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection