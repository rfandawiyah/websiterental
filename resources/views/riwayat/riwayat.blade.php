@extends('kerangka.master')
@section('title', 'Dashboard')
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
                                        @foreach ($rents as $index => $rent)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $rent->id_sewa }}</td>
                                                <td>{{ $rent->customer->nama }}</td>
                                                <td>{{ $rent->tgl_sewa }}</td>
                                                <td>Rp. {{ number_format($rent->total, 0, ',', '.') }}</td>
                                                <td>{{ $rent->tgl_pembayaran }}</td>
                                                <td>{{ $rent->status }}</td>
                                                <td>
                                                    @if ($rent->status === 'unpaid')
                                                        <form action="{{ route('order.confirm', $rent->id_sewa) }}"
                                                            method="POST">
                                                            @csrf
                                                        </form>
                                                    @endif
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
