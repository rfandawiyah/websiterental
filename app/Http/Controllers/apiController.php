<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\logincustomer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Cars; // Pastikan nama model benar

class apiController extends Controller
{
    // public function login(Request $request)
    // {
    //     $login = logincustomer::where('name', $request->name)->first();
    //     if ($login) {
    //         return response()->json($login);
    //     } else {
    //         return response()->json(['error' => 'User not found'], 404);
    //     }
    // }

    public function login(Request $request)
    {

        $user = logincustomer::where('name', $request->name)->first();
        $token = $user->createToken('auth_token')->plainTextToken;

        if ($user) {
            return response()->json([
                'access_token' => $token,
                'user' => $user,
            ], 200);
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

        $token = $newUser->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 201,
            "result" => $newUser,
            'access_token' => $token,
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
        $cars = cars::where('status', 'available')->get();
        return response()->json($cars);
    }

    public function customers()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function getProfile()
    {
        $user = Auth::user();
        return response()->json([
            'message' => 'Profile retrieved successfully',
            'result' => $user
        ], 200);
    }

    public function updateProfile(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:logincustomers,email,' . $request->user()->id,
        ]);

        if ($validator->fails()) {
            Log::error('Validation Error: ', $validator->errors()->toArray());

            return response()->json([
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = Auth::user();
        $user->name = $name;
        $user->email = $email;

        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout Success',
        ], 200);
    }


}
