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
                                <h4 class="mb-0">Tabel Sewa Mobil</h4>
                                <a href="{{ route('order.create') }}" class="btn btn-primary">Tambah Pesanan</a>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Customer</th>
                                        <th>Tgl Order</th>
                                        <th>Total Pembayaran</th>
                                        <th>Tgl Pembayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($rents as $rent)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rent->id_sewa }}</td>
                                                <td>{{ $rent->customer->nama }} ({{ $rent->customer->NIK }})</td>
                                                <td>{{ $rent->tgl_sewa }}</td>
                                                <td>{{ $rent->total }}</td>
                                                <td>{{ $rent->tgl_pembayaran }}</td>
                                                <td>{{ $rent->status }}</td>
                                                <td>
                                                    <a href="{{ route('rent.details', $rent->id_sewa) }}"
                                                        class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Pagination -->
                                <div class="d-flex justify-content-center">
                                    {{ $rents->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
