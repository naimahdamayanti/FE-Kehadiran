@extends('layout')
@section('title','Input Mata Kuliah')
@section('judul','Form Input Mata Kuliah')
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
<form action="{{ route('matkul.store')}}" method="post">
        @csrf
        <div class="form-group mb-2">
            <label>ID Mata Kuliah</label>
            <input type="text" name="id_matkul" type="text"  class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Nama Mata Kuliah</label>
            <input type="text" name="nama_matkul" type="text"  class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>SKS</label>
            <input type="text" name="sks" type="text"  class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Semester</label>
            <input type="text" name="semester" type="text"  class="form-control">
        </div>
        
            <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{ route('matkul.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
@endsection
