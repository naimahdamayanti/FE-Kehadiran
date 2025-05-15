<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Absensi;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    /**
     * Menampilkan daftar absensi
     */
    public function index()
    {
        // Ambil data dari API backend
        $response = Http::get('http://localhost:8080/Absensi');
        
        // Pastikan respons berhasil
        if ($response->failed()) {
            abort(500, 'Gagal mengambil data absensi dari API.');
        }

        // Ambil langsung array data dari respons
        $absensi = $response->json();
        $mahasiswaResponse = Http::get('http://localhost:8080/Mahasiswa');
        if ($mahasiswaResponse->failed()) {
            abort(500, 'Gagal mengambil data mahasiswa dari API.');
        }
        $mahasiswa = collect($mahasiswaResponse->json());

        // Gabungkan data absensi dengan nama mahasiswa
        $absensi = collect($absensi)->map(function ($item) use ($mahasiswa) {
            $mahasiswaData = $mahasiswa->firstWhere('npm', $item['npm']);

            // Ganti NPM dengan nama mahasiswa untuk ditampilkan
            $item['npm'] = $mahasiswaData['nama_mahasiswa'] ?? 'Tidak Diketahui';
            return $item;
        });

        // Tampilkan ke view
        return view('absensi.index', compact('absensi'));
    }

    /**
     * Menampilkan daftar mahasiswa untuk absensi berdasarkan mata kuliah
     */
    public function show($id)
    {
        
    }

    /**
     * Form untuk mengisi absensi
     */
    public function create()
    {
        $absensi = Absensi::all();
        return view('absensi.create', ['absensi' => $absensi]);
    }

    /**
     * Simpan data absensi yang diisi dosen
     */
    public function store(Request $request)
    {
        $request->merge([
            'keterangan' => json_encode($request->keterangan),
        ]);

        $request->validate([
            'pertemuan' => 'required|integer',
            'keterangan' => 'required|array',
            
        ]);

        foreach ($request->keterangan as $npm => $keterangan) {
            Absensi::create([
                'npm' => $npm,
                'id_dosen' => $request->id_dosen,
                'id_matkul' => $request->id_matkul,
                'pertemuan' => $request->pertemuan,
                'keterangan' => $keterangan,
            ]);
            
        
            return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan.');
    }
    
}


    public function edit(string $id_kehadiran){
        // Ambil data absensi berdasarkan id_absensi
        $absensi = Absensi::findOrFail($id_kehadiran);
        return view('absensi.edit', compact('absensi'));
    
        // Ambil data mahasiswa dan mata kuliah untuk dropdown (jika diperlukan)
        $mahasiswa = Mahasiswa::all();
        $matkul = Matkul::all();
    
        // Tampilkan view edit dengan data absensi, mahasiswa, dan matkul
        return view('absensi.edit', [
            'absensi' => $absensi,
            'mahasiswa' => $mahasiswa,
            'matkul' => $matkul
        ]);
    }

    public function update(Request $request, string $id_kehadiran)
{
    // Validasi input
    $request->validate([
        'npm' => 'required|string',
        'id_dosen' => 'required|integer',
        'id_matkul' => 'required|integer',
        'pertemuan' => 'required|integer',
        'keterangan' => 'required|string',
    ]);

    // Cari data absensi berdasarkan id_absensi
    $absensi = Absensi::findOrFail($id_kehadiran);

    // Update data absensi
    $absensi->update([
        'npm' => $request->npm,
        'id_dosen' => $request->id_dosen,
        'id_matkul' => $request->id_matkul,
        'pertemuan' => $request->pertemuan,
        'keterangan' => $request->keterangan,
    ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_kehadiran)
{
    // Cari data absensi berdasarkan id_absensi
    $absensi = Absensi::findOrFail($id_kehadiran);

    // Hapus data absensi
    $absensi->delete();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus.');
}
}
