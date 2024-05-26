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
                                <a href="{{ route('add_cars') }}" class="btn btn-primary">Tambah Mobil</a>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama Mobil</th>
                                            <th>type</th>
                                            <th>Harga Sewa</th>
                                            <th>Nopol</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cars as $car)
                                            <tr>
                                                <td>{{ $car->merkmobil }}</td>
                                                <td>{{ $car->type }}</td>
                                                <td>{{ $car->harga }}</td>
                                                <td>{{ $car->nopol }}</td>
                                                <td>{{ $car->status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Tambahkan pagination links -->
                                <div class="d-flex justify-content-end">
                                    {{ $cars->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
