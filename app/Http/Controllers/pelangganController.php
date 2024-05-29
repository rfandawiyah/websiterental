<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; // Import model Customer
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $customers = Customer::all(); // Mendapatkan semua data pelanggan dari database

        return view('pelanggan.pelanggan', ['customers' => $customers]);
    }
}
