<?php
namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Customer;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $rents = Rent::with(['customer', 'rentDetails.car'])->paginate(15);
        return view('order.order', compact('rents'));
    }

    public function show($id)
    {
        $rent = Rent::with('rentDetails.car', 'customer')->findOrFail($id);
        return view('rent.details', compact('rent'));
    }

    public function create()
    {
        $cars = Cars::all();
        $customers = Customer::all();
        return view('rent.create', compact('cars', 'customers'));
    }

    public function store(Request $request)
    {
        $car = Cars::findOrFail($request->nopol);

        if ($car->status !== 'available') {
            return redirect()->back()->withErrors(['Mobil tidak tersedia untuk disewa']);
        }

        // Buat transaksi sewa
        $rent = new Rent();
        $rent->tgl_sewa = $request->tgl_sewa;
        $rent->tgl_pembayaran = $request->tgl_pembayaran;
        $rent->status = 'unpaid';
        $rent->total = $request->total;
        $rent->NIK = $request->NIK;
        $rent->save();

        // Update status mobil menjadi 'rented'
        $car->status = 'rented';
        $car->save();

        return redirect()->route('rents.index')->with('success', 'Transaksi sewa berhasil dibuat');
    }

}

