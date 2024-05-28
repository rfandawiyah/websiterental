@extends('kerangka.master')
@section('title', 'Mobil')
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
                                                    <div class="d-flex">
                                                        <a href="{{ route('edit_car', ['nopol' => $car->nopol]) }}"
                                                            class="btn btn-primary mx-1">Edit</a>
                                                        <button type="button" class="btn btn-danger mx-1"
                                                            onclick="deleteUser('{{ $car->nopol }}')">Delete</button>
                                                        <form id="delete-form-{{ $car->nopol }}"
                                                            action="{{ route('delete_car', ['nopol' => $car->nopol]) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                id="delete-btn-{{ $car->nopol }}"></button>
                                                        </form>
                                                    </div>
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
