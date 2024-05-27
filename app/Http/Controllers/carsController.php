<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class carsController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $cars = Cars::paginate(15); // Ambil 15 data per halaman

        return view('cars.cars', compact('cars'));
    }

    public function edit($id)
    {
        $cars = Cars::findOrFail($id);
        return view('cars.edit', compact('cars'));
    }

    public function update(Request $request, $nopol)
    {
        $request->validate([
            'merkmobil' => 'required',
            'type' => 'required',
            'harga' => 'required',
            'nopol' => 'required',
            'status' => 'required',
        ]);

        $car = Cars::findOrFail($nopol);

        // Tambahkan penanganan gambar jika perlu
        if ($request->hasFile('gambar')) {
            // Lakukan proses upload gambar baru dan simpan path-nya
            // Kemudian atur path gambar baru ke dalam $request->gambar
        }

        $car->update($request->all());

        return redirect()->route('cars')->with('success', 'Mobil berhasil diperbarui.');
    }

    public function destroy($nopol)
    {
        $car = Cars::findOrFail($nopol);
        $car->delete();

        return redirect()->route('cars')->with('success', 'Mobil berhasil dihapus.');
    }

    public function create()
    {
        $cars = Cars::all(); // Ambil semua data mobil dari database
        return view('form', compact('cars')); // Kirim data mobil ke tampilan
    }
}