<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        return view('admin.admin');
    }
}
