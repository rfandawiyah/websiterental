<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pelangganController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        return view('pelanggan.pelanggan');
    }
}
