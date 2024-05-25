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
                            <h4 class="mb-0">Tambah Mobil</h4>
                            <a href="{{ route('cars') }}" class="btn-close btn-close-white" aria-label="Close"></a>
                        </div>
                        <div class="card-body">
                        <form method="POST" action="{{ route('store.add') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_mobil" class="form-label">Nama Mobil</label>
                                    <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tipe" class="form-label">Tipe</label>
                                    <input type="text" class="form-control" id="tipe" name="tipe" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nopol" class="form-label">Nopol</label>
                                    <input type="text" class="form-control" id="nopol" name="nopol" required>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga Sewa</label>
                                    <input type="number" class="form-control" id="harga" name="harga" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="text" class="form-control" id="gambar" name="gambar" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection