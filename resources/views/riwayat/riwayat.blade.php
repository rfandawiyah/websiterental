@extends('kerangka.master')
@section('title', 'Riwayat')
@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-15">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">Tabel Riwayat Pesanan</h4>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @elseif(session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Transaksi</th>
                                            <th>Customer</th>
                                            <th>Tgl Order</th>
                                            <th>Total Pembayaran</th>
                                            <th>Tgl Pembayaran</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rents as $rent)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rent->id_sewa }}</td>
                                                <td>{{ $rent->customer->nama }} ({{ $rent->customer->NIK }})</td>
                                                <td>{{ $rent->tgl_sewa }}</td>
                                                <td>Rp. {{ number_format($rent->total, 0, ',', '.') }}</td>
                                                <td>{{ $rent->tgl_pembayaran }}</td>
                                                <td>
                                                    @if ($rent->status === 'Selesai')
                                                        Dikembalikan
                                                    @else
                                                        {{ $rent->status }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('riwayat.detail', $rent->id_sewa) }}"
                                                        class="btn btn-primary">Detail</a>
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
        </section>
    </div>
@endsection
