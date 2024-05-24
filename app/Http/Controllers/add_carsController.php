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

        return view('add_car.add_car');
    }
}
