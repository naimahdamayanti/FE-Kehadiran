<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Mahasiswa::orderBy('nim', 'desc')->get();
        return view('mahasiswa.index', [
            'mahasiswa' => Mahasiswa::all()
        ]);

        $response = Http::get('http://localhost:8080/Mahasiswa');
        $mahasiswa = $response->json();
        return view ('mahasiswa', ['mahasiswa'=>$mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = Http::get('http://localhost:8080/Mahasiswa');

        // Cek jika respons berhasil
        if ($response->successful()) {
            $prodis = $response->json(); // Ambil data JSON dari respons
        } else {
            $prodis = []; // Jika gagal, set data prodi kosong
        }

        // Kirim data prodi ke view
        return view('mahasiswa.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    // Kirim data ke API
    $response = Http::post('http://localhost:8080/Mahasiswa', [
         'npm' => $request->npm,
        'nama_mahasiswa' => $request->nama_mahasiswa,
        'nama_matkul' => $request->nama_matkul,
        'jurusan' => $request->jurusan,
        'prodi' => $request->prodi,
        'tahun_akademik' => $request->tahun_akademik,
    ]);

    // dd($response->json());

    // Cek respons dari API
    if ($response->successful()) {
        return redirect('/mahasiswa')->with('success', 'Data berhasil ditambahkan!');
    } else {
        // Tampilkan pesan error dari API
        $errorMessage = $response->json()['message'] ?? 'Gagal menambahkan data. Silakan coba lagi.';
        return back()->with('error', $errorMessage);
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $npm)
    {
        

        $request->validate([
            'npm' => 'required|integer',
            'nama_mahasiswa' => 'required|string',
            'nama_matkul' => 'required|string',
            'jurusan' => 'required|string',
            'prodi' => 'required|string',
            'tahun_akademik' => 'required|string',
        ]);
    
        // Kirim data ke API untuk update
        $response = Http::put("http://localhost:8080/Mahasiswa/{$npm}", [
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nama_matkul' => $request->nama_matkul,
            'jurusan' => $request->jurusan,
            'prodi' => $request->prodi,
            'tahun_akademik' => $request->tahun_akademik,
        ]);
        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
        } else {
            // Tampilkan pesan error dari API
            $errorMessage = $response->json()['message'] ?? 'Gagal memperbarui data mahasiswa. Silakan coba lagi.';
            return back()->with('error', $errorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $npm)
    {
        $response = Http::delete("http://localhost:8080/Mahasiswa/{$npm}");

        // Cek respons dari API
        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Dosen berhasil dihapus.');
        } else {
            return redirect()->route('mahasiswa.index')->with('error', 'Gagal menghapus data dosen.');
        }
    }
}
