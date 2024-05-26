<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'nopol' => 'required|string|max:10|unique:cars,nopol',
            'merkmobil' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'type' => 'required|string|max:255',
            'status' => 'required|in:available,rented,maintenance', // Validasi status
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Pastikan gambar memiliki format yang sesuai
            'deskripsi' => 'required|string',
        ]);

        // dd($validatedData);

        try {
            // Simpan gambar ke dalam direktori penyimpanan
            $gambarPath = $request->file('gambar')->store('public/gambar');

            $car = new Cars();
            $car->nopol = $validatedData['nopol'];
            $car->merkmobil = $validatedData['merkmobil'];
            $car->type = $validatedData['type'];
            $car->harga = $validatedData['harga'];
            $car->status = 'available'; // Default status
            $car->gambar = $gambarPath; // Simpan path gambar
            $car->deskripsi = $validatedData['deskripsi'];
            
            $car->save();
             
            // Redirect kembali dengan pesan sukses
            return redirect()->route('cars')->with('success', 'Mobil berhasil ditambahkan.');

        } catch (\Exception $e) {
            // Redirect kembali dengan pesan error dan debug pesan kesalahan
            return redirect()->route('add_cars')->with('error', 'Gagal menambahkan mobil. Silakan coba lagi. Kesalahan: ' . $e->getMessage());
        }

      
    }
}
