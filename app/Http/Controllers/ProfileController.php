<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('profile.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'string|required',
            'email' => 'string|required|email'
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        }

        $user->update($validatedData);

        if ($user) {
            return redirect()->route('profile.index')->with('success', 'Berhasil Merubah Data');
        } else {
            return redirect()->route('profile.index')->with('failed', 'Gagal Merubah Data');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('profile.index')->with('success', 'Berhasil Menghapus Data');
    }
}
