<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class add_carsController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        return view('cars.add_car');
    }

    public function store(Request $request)
{
    // Validasi data yang diterima dari form
    $validatedData = $request->validate([
        'nama_mobil' => 'required|string|max:255',
        'tipe' => 'required|string|max:255',
        'nopol' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'deskripsi' => 'required|string',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Pastikan gambar memiliki format yang sesuai
    ]);

    // Simpan gambar ke dalam direktori penyimpanan
    $gambarPath = $request->file('gambar')->store('public/gambar');

    // Buat entry baru dalam basis data untuk mobil
    $car = new Car();
    $car->nama_mobil = $request->nama_mobil;
    $car->tipe = $request->tipe;
    $car->nopol = $request->nopol;
    $car->harga = $request->harga;
    $car->deskripsi = $request->deskripsi;
    $car->gambar = $gambarPath; // Simpan path gambar ke dalam basis data
    $car->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('add')->with('success', 'Mobil berhasil ditambahkan.');
}

}
