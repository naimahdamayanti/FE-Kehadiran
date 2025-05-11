@extends('layout')
@section('title','Input Dosen')
@section('judul','Form Input Dosen')
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
    <form action="{{ route('dosen.store')}}" method="post">
        @csrf
        <div class="form-group mb-2">
            <label>ID Dosen</label>
            <input type="text" name="id_dosen" type="text"  class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Nama Dosen</label>
            <input type="text" name="nama_dosen" type="text"  class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
        
        </div>
    </form>
@endsection                             