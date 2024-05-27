<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class riwayatController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        // Mengambil semua data pesanan dengan status 'paid'
        $rents = Rent::where('status', 'paid')->get();

        // Meneruskan data ke view riwayat
        return view('riwayat.riwayat', compact('rents'));
    }

    // public function confirm($id_sewa)
    // {
    //     $rent = Rent::findOrFail($id_sewa);

    //     // Periksa apakah status pesanan masih "unpaid"
    //     if ($rent->status === 'unpaid') {
    //         // Ubah status pesanan menjadi "paid"
    //         $rent->status = 'paid';
    //         $rent->save();

    //         // Redirect ke halaman riwayat dengan pesan sukses
    //         return redirect()->route('riwayat.history')->with('success', 'Pesanan berhasil dikonfirmasi.');
    //     } else {
    //         // Redirect dengan pesan bahwa pesanan sudah terkonfirmasi sebelumnya
    //         return redirect()->back()->with('error', 'Pesanan sudah terkonfirmasi sebelumnya.');
    //     }
    // }
}
