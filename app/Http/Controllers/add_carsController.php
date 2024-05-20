<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class add_carsController extends Controller
{
    public function index()
    {
        return view('add_car.add_car');
    }
}
