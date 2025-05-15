<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validasi data
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|in:admin,dosen',  // Validasi untuk role
        ]);

        // Kirim data ke API CodeIgniter
        $response = Http::post('http://localhost:8080/api/register', [
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,  // Mengirimkan role
        ]);

        if ($response->successful()) {
            return redirect()->route('register.form')->with('success', 'Registration successful!');
        }

        $data = $response->json();

// Periksa apakah response memiliki key 'message'
        $message = $data['message'] ?? 'Registration failed. Please try again.';
        return redirect()->route('register.form')->with('error', $message);

    }
}
