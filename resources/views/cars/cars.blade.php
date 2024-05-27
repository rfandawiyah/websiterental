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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cars as $car)
                                            <tr>
                                                <td>{{ $car->merkmobil }}</td>
                                                <td>{{ $car->type }}</td>
                                                <td>Rp{{ number_format($car->harga, 0, ',', '.') }}</td>
                                                <td>{{ $car->nopol }}</td>
                                                <td>{{ $car->status }}</td>
                                                <td>
                                                    <a href="{{ route('edit_car', ['nopol' => $car->nopol]) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('delete_car', ['nopol' => $car->nopol]) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus mobil ini?')">Delete</button>
                                                    </form>
                                                </td>
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
