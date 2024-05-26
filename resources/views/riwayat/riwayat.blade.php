{{-- dashboard --}}

@extends('kerangka.master')
@section('title', 'Dashboard')
@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Riwayat Transaksi</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <th>ID Pesanan</th>
                                    <th>Pelanggan</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->customer->name }}</td> {{-- Asumsi bahwa relasi antara transaksi dan pelanggan bernama customer --}}
                                        <td>{{ $transaction->date }}</td>
                                        <td>{{ $transaction->total }}</td>
                                        <td>{{ $transaction->status }}</td>
                                        <td>
                                            {{-- Tambahkan tombol atau tautan untuk tindakan yang sesuai, seperti melihat detail transaksi --}}
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