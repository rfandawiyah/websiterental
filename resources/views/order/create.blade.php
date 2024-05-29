@extends('kerangka.master')
@section('title', 'Dashboard')
@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-15">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Pesanan</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('order.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="customer">Nama Customer:</label>
                                <input type="text" class="form-control" id="customer" name="customer" required>
                            </div>
                            <div class="form-group">
                                <label for="car">Pilih Mobil:</label>
                                <select class="form-control" id="car" name="car" required>
                                    @foreach ($cars as $car)
                                        <option value="{{ $car->nopol }}">{{ $car->merkmobil }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_sewa">Tanggal Sewa:</label>
                                <input type="date" class="form-control" id="tgl_sewa" name="tgl_sewa" required>
                            </div>
                            <div class="form-group">
                                <label for="tgl_pengembalian">Tanggal Pengembalian:</label>
                                <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="harga_perhari">Harga Perhari (Rp):</label>
                                <input type="number" class="form-control" id="harga_perhari" name="harga_perhari" required>
                            </div>
                            <div class="form-group">
                                <label for="tgl_pembayaran">Tanggal Pembayaran:</label>
                                <input type="date" class="form-control" id="tgl_pembayaran" name="tgl_pembayaran"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="lama_sewa">Lama Sewa (hari):</label>
                                <input type="number" class="form-control" id="lama_sewa" name="lama_sewa" required>
                            </div>
                            <div class="form-group">
                                <label for="total_pembayaran">Total Pembayaran (Rp):</label>
                                <input type="number" class="form-control" id="total_pembayaran" name="total_pembayaran"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="unpaid">Belum Dibayar</option>
                                    <option value="paid">Sudah Dibayar</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Pesanan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tglSewaInput = document.getElementById('tgl_sewa');
            var tglPengembalianInput = document.getElementById('tgl_pengembalian');
            var lamaSewaInput = document.getElementById('lama_sewa');
            var hargaPerhariInput = document.getElementById('harga_perhari');
            var totalPembayaranInput = document.getElementById('total_pembayaran');

            function hitungLamaSewa() {
                var tglSewa = new Date(tglSewaInput.value);
                var tglPengembalian = new Date(tglPengembalianInput.value);

                var selisihHari = (tglPengembalian - tglSewa) / (1000 * 3600 * 24);
                lamaSewaInput.value = selisihHari > 0 ? selisihHari : 0;

                // Hitung total pembayaran
                var hargaPerhari = parseFloat(hargaPerhariInput.value);
                var lamaSewa = parseFloat(lamaSewaInput.value);
                var totalPembayaran = hargaPerhari * lamaSewa;
                totalPembayaranInput.value = isNaN(totalPembayaran) ? 0 : totalPembayaran;
            }

            tglSewaInput.addEventListener('change', hitungLamaSewa);
            tglPengembalianInput.addEventListener('change', hitungLamaSewa);
            hargaPerhariInput.addEventListener('input', hitungLamaSewa);
        });

        document.getElementById('car').addEventListener('change', function() {
            var carId = this.value;
            var car = {!! $cars !!}.find(car => car.nopol == carId);
            var hargaPerhariInput = document.getElementById('harga_perhari');
            hargaPerhariInput.value = car.harga;
        });
    </script>
@endsection
