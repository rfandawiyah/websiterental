<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\logincustomer;
use App\Models\Cars; // Pastikan nama model benar
use Illuminate\Http\Request;

class apiController extends Controller
{
    public function login(Request $request)
    {
        $login = logincustomer::where('name', $request->name)->first();
        if ($login) {
            return response()->json($login);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:dns|unique:logincustomers',
            'password' => 'required|string|min:5',
        ]);

        $newUser = logincustomer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'status' => 201,
            "result" => $newUser
        ]);
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email:dns',
        ]);

        $exists = logincustomer::where('email', $request->email)->exists();

        return response()->json(['success' => !$exists]);
    }

    public function cars()
    {
        // $login = logincustomer::all();
        $cars = cars::all();
        return response()->json($cars);
    }

    public function customers()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }
}
