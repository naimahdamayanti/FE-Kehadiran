<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class MatkulController extends Controller
{
    public function index(){
        $matkul = Matkul::all();
        return view('matkul.index', compact('matkul'));
    }

    public function create(){
        return view('matkul.create');
    }

    public function store(Request $request){

        request()->validate([
            'id_matkul' => 'required',
            'nama_matkul' => 'required',            
            'sks' => 'required',            
            'semester' => 'required',
        ]);

        $matkul = Matkul::create($request->all());
        return redirect()->route('matkul.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id_matkul){
        $matkul = Matkul::findOrFail($id_matkul);
        return view('matkul.edit', ['matkul' => $matkul]);
    }

    public function update(Request $request, string $id)
    {
        

        $request->validate([
            'nama_matkul' => 'required|string',
            'sks' => 'required|string',
            'semester' => 'required|string'
        ]);
    
        // Kirim data ke API untuk update
        $response = Http::put("http://localhost:8080/Matkul/{$id}", [
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
            'semester' => $request->semester
        ]);
        if ($response->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
        } else {
            // Tampilkan pesan error dari API
            $errorMessage = $response->json()['message'] ?? 'Gagal memperbarui data mahasiswa. Silakan coba lagi.';
            return back()->with('error', $errorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:8080/Matkul/{$id}");

        // Cek respons dari API
        if ($response->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Dosen berhasil dihapus.');
        } else {
            return redirect()->route('matkul.index')->with('error', 'Gagal menghapus data dosen.');
        }
    }
}
