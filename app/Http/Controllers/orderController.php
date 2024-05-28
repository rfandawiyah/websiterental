<?php
namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Customer;
use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        // Mengambil hanya pesanan dengan status "unpaid"
        $rents = Rent::with(['customer', 'rentDetails.car'])->where('status', 'unpaid')->paginate(15);
        return view('order.index', compact('rents'));
    }

    public function showDetails($id)
    {
        $rent = Rent::with('rentDetails.car', 'customer')->findOrFail($id);
        return view('order.detailOrder', compact('rent'));
    }

    public function create()
    {
        $cars = Cars::all();
        $customers = Customer::all();
        return view('order.create', compact('cars', 'customers'));
    }

    public function store(Request $request)
    {
        try {

            dd($request->all());
            // Validasi input
            $validatedData = $request->validate([
                'NIK' => 'required|string',
                'car' => 'required|string',
                'tgl_sewa' => 'required|date',
                'tgl_pengembalian' => 'required|date|after:tgl_sewa',
                // Anda dapat menambahkan validasi tambahan sesuai kebutuhan
            ]);
            // Ambil data mobil dari tabel 'cars' berdasarkan pilihan mobil yang dibuat
            $car = Cars::where('nopol', $validatedData['car'])->first();

            // Hitung tanggal pengembalian secara otomatis berdasarkan tanggal sewa dan lama sewa
            $tgl_sewa = Carbon::parse($validatedData['tgl_sewa']);
            $lama_sewa = $validatedData['lama_sewa'];
            $tgl_pengembalian = $tgl_sewa->copy()->addDays($lama_sewa);

            // Hitung total pembayaran berdasarkan harga perhari mobil
            $total_pembayaran = $car->harga * $lama_sewa;

            // Simpan data ke dalam database
            $order = new Rent();
            $order->NIK = $validatedData['NIK']; // Menggunakan NIK customer
            $order->car = $car->nopol; // Menggunakan nomor polisi mobil
            $order->tgl_sewa = $validatedData['tgl_sewa'];
            $order->tgl_pengembalian = $tgl_pengembalian;
            $order->harga_perhari = $car->harga; // Simpan harga perhari dari mobil
            $order->tgl_pembayaran = Carbon::now(); // Tanggal pembayaran saat ini
            $order->lama_sewa = $lama_sewa;
            $order->total_pembayaran = $total_pembayaran;
            $order->status = 'unpaid'; // Misalnya, default status 'unpaid'
            $order->save();




            // Redirect kembali dengan pesan sukses
            return redirect()->route('order.index')->with('success', 'Pesanan berhasil ditambahkan.');

        } catch (\Exception $e) {
            // Tangkap dan tampilkan pesan error jika terjadi kesalahan
            return redirect()->route('order.create')->with('error', 'Gagal menambahkan pesanan. Silakan coba lagi. Kesalahan: ' . $e->getMessage());
        }
    }

    public function history()
    {
        $rents = Rent::where('status', 'Confirmed')->get();
        return view('riwayat.riwayat', compact('rents'));
    }

    public function confirm($id)
    {
        $rent = Rent::find($id);

        // Periksa apakah status pesanan masih "unpaid"
        if ($rent->status === 'unpaid') {
            // Ubah status pesanan menjadi "paid"
            $rent->status = 'paid';
            $rent->save();

            // Redirect ke halaman riwayat dengan pesan sukses
            return redirect()->route('riwayat.history')->with('success', 'Pesanan berhasil dikonfirmasi.');
        } else {
            // Redirect dengan pesan bahwa pesanan sudah terkonfirmasi sebelumnya
            return redirect()->back()->with('error', 'Pesanan sudah terkonfirmasi sebelumnya.');
        }
    }


}

