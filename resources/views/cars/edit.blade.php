@extends('kerangka.master')
@section('title', 'Dashboard')
@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-15">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h4>Edit Mobil</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('cars') }}">Mobil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Mobil</li>
                            </ol>
                        </nav>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('update_car', ['nopol' => $cars->nopol]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="merkmobil" class="form-label">Merk Mobil</label>
                                <input type="text" class="form-control" id="merkmobil" name="merkmobil"
                                    value="{{ $cars->merkmobil }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Tipe</label>
                                <input type="text" class="form-control @error('type') is-invalid @enderror"
                                    id="type" name="type" value="{{ $cars->type }}" required>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nopol" class="form-label">Nopol</label>
                                <input type="text" class="form-control @error('nopol') is-invalid @enderror"
                                    id="nopol" name="nopol" value="{{ $cars->nopol }}" required>
                                @error('nopol')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Sewa</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                    id="harga" name="harga" value="{{ $cars->harga }}" required>
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                    id="gambar" name="gambar">
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status" required>
                                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>
                                        Available</option>
                                    <option value="rented" {{ old('status') == 'rented' ? 'selected' : '' }}>Rented
                                    </option>
                                    <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>
                                        Maintenance</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
