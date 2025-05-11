<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Validation\Rule;

class DosenController extends Controller
{
    public function index()
    {

        $response = Http::get('http://localhost:8080/Dosen');
        $dosen = $response->json();
        return view ('dosen.index', compact('dosen'));
    }

    public function create()
    {
        $dosen = Dosen::all();
        return view('dosen.create', ['dosen' => $dosen]);

    }

    public function store(Request $request)
    {
        $request->validate([
           'id_dosen' => 'required|int',
            'nama_dosen' => 'required|string|max:255',
        ]);

        $response = Http::post('http://localhost:8080/Dosen', [
            'id_dosen' => $request->id_dosen,
            'nama_dosen' => $request->nama_dosen,
        ]);

        if ($response->successful()) {
            return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan.');
            } else {
                return redirect()->route('dosen.index')->with('error', 'Gagal menambahkan data dosen.');
                }
    }

    public function show($id)
    {
        // $dosen = Dosen::findOrFail($id);
        // return view('dosen.show', compact('dosen'));
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', ['dosen' => $dosen]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dosen' => 'required|string|max:255',
        ]);
    

        $response = Http::put("http://localhost:8080/Dosen/{$id}", [
            'nama_dosen' => $request->nama_dosen,
        ]);
    
        // Cek respons dari API
        if ($response->successful()) {
            return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
        } else {
            return redirect()->route('dosen.index')->with('error', 'Gagal memperbarui data dosen.');
        }
    }

    public function destroy($id)
    {
        $response = Http::delete("http://localhost:8080/Dosen/{$id}");

        // Cek respons dari API
        if ($response->successful()) {
            return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus.');
        } else {
            return redirect()->route('dosen.index')->with('error', 'Gagal menghapus data dosen.');
        }
    }
}
