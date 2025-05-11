@extends('layout')
@section('title','Input Mahasiswa')
@section('judul','Form Input Mahasiswa')
@section('isi')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('mahasiswa.store')}}" method="post">
        @csrf
        <div class="form-group mb-2">
            <label>NPM</label>
            <input type="text" name="npm" type="text"  class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" type="text"  class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Mata Kuliah</label>
            <input type="text" name="nama_matkul" type="text"  class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Jurusan</label>
            <input type="text" name="jurusan" type="text"  class="form-control">
        </div>
        <div class="form-group mb-2">
                    <label for="validationCustom01" class="form-label">Prodi</label>
                    <select class="form-control " name="prodi" required>
                    <option value="">--Pilih Prodi--</option>
                    <option value="D3 TI">D3 TI</option>
                    <option value="D3 ELEKTRO">D3 ELEKTRO</option>
                    <option value="D3 LISTRIK">D3 LISTRIK</option>
                    <option value="D4 TRET">D4 TRET</option>
                    <option value="D4 ALKS">D4 ALKS</option>
                    <option value="D4 RKS">D4 RKS</option>
                    <option value="D4 PPA">D4 PPA</option>
                    <option value="D4 TPPL">D4 TPPL</option>
                    </select>
            </div>
        <div class="form-group mb-2">
            <label>Tahun Akademik</label>
            <input type="text" name="tahun_akademik" type="text"  class="form-control">
        </div>
            
            <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
@endsection
