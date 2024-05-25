@extends('kerangka.master')
@section('title', 'Dashboard')
@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Tabel Mobil</h4>
                            <!-- Mengubah button menjadi link -->
                            <a href="{{ route('add_cars') }}" class="btn btn-primary">Tambah Mobil</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <th>Nama Mobil</th>
                                    <th>Merk Mobil</th>
                                    <th>Harga</th>
                                    <th>Nopol</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    <tr>

                                    </tr>
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
