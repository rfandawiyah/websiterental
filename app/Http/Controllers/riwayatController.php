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
        $rents = Rent::whereIn('status', ['paid', 'Selesai'])->get();

        // Meneruskan data ke view riwayat
        return view('riwayat.riwayat', compact('rents'));
    }

    public function showDetails($id)
    {
        $rent = Rent::with('rentDetails.car', 'customer')->findOrFail($id);
        return view('riwayat.detail', compact('rent'));
    }

    public function konfirmasiPesanan($id_sewa)
    {
        $rent = Rent::find($id_sewa);
        if ($rent) {
            $rent->status = 'Selesai';  // Ubah status menjadi 'Selesai'
            $rent->save();

            return redirect()->route('riwayat')->with('success', 'Pesanan berhasil diselesaikan.');
        } else {
            return redirect()->route('riwayat')->with('error', 'Pesanan tidak ditemukan.');
        }
    }
}
