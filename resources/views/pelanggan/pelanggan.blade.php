@extends('kerangka.master')
@section('title', 'Pelanggan')
@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tabel Pelanggan</h4>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>No. Telepon</th>
                                            <th>Alamat</th>
                                            {{-- <th>Waktu Pembuatan</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $customer->NIK }}</td>
                                                <td>{{ $customer->nama }}</td>
                                                <td>{{ $customer->no_telephon }}</td>
                                                <td>{{ $customer->alamat }}</td>
                                                {{-- <td>{{ $customer->created_at }}</td> --}}
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
