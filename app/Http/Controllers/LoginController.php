<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Jika user sudah login, redirect ke dashboard
        if (session()->has('token')) {
            return redirect()->route('dashboard');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        try {
            $response = Http::post('http://localhost:8080/api/login', [
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                // Cek apakah respons memiliki data user dan role
                if (!isset($data['user']) || !isset($data['user']['role'])) {
                    return back()->withErrors([
                        'login_error' => 'Data user atau role tidak ditemukan dari API.'
                    ]);
                }

                // Simpan data ke session, termasuk user dan role
                session([
                    'token' => $data['token'],
                    'user_id' => $data['user_id'],
                    'email' => $request->email,
                    'user' => (object) $data['user'] // Simpan sebagai object supaya bisa akses ->role
                ]);


                return redirect()->route('dashboard')->with('success', 'Login berhasil!');
            }

            // Tampilkan pesan error dari API jika ada
            return back()->withErrors([
                'login_error' => $response->json()['message'] ?? 'Login gagal'
            ]);

        } catch (\Exception $e) {
            return back()->withErrors([
                'login_error' => 'Server error: ' . $e->getMessage()
            ]);
        }
    }

    public function logout()
    {
        // Hapus semua session
        session()->flush();
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}
