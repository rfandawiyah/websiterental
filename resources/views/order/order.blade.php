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
                        </div>
                        <div class="card-body">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <th>ID Sewa</th>
                                    <th>Tanggal Sewa</th>
                                    <th>Pembayaran</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Customer</th>
                                    <th>Detail Sewa</th>
                                    
                                </thead>
                                <tbody>
                                    @foreach ($rents as $rent)
                                        <tr>
                                            <td>{{ $rent->id_sewa }}</td>
                                            <td>{{ $rent->tgl_sewa }}</td>
                                            <td>{{ $rent->bayar }}</td>
                                            <td>{{ $rent->status }}</td>
                                            <td>{{ $rent->total }}</td>
                                            <td>{{ $rent->customer->nama }} ({{ $rent->customer->NIK }})</td>
                                            <td>
                                                <ul>
                                                    @foreach ($rent->rentDetails as $detail)
                                                        <li>
                                                            <a href="{{ route('rent.details', $detail->id_sewa) }}">
                                                                {{ $detail->car->merkmobil }} - {{ $detail->car->nopol }} - Lama Sewa: {{ $detail->lama_sewa }} hari
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
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
