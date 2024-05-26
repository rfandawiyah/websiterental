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
}
