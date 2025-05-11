@extends('layout')
@section('title','Mahasiswa')
@section('judul','Mahasiswa')
@section('isi')
@if (Session::has('create'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data Berhasil Di Tambah</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (Session::has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data Berhasil Di Hapus!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (Session::has('update'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Data Berhasil Di Edit!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container">
  <a href="{{ route('mahasiswa.create')}}">
    <button class="btn btn-icon btn-3 btn-danger" type="button">
      <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
      <span class="btn-inner--text">Tambah Mahasiswa</span>
    </button>
  </a>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-layout-fixed">
      <thead>
        <tr>
          <th scope="col" class="text-center w-auto">No</th>
          <th scope="col" class="text-center w-auto">NPM</th>
          <th scope="col" class="text-center w-auto">Nama Mahasiswa</th>
          <th scope="col" class="text-center w-auto">Mata Kuliah</th>
          <th scope="col" class="text-center w-auto">Jurusan</th>
          <th scope="col" class="text-center w-auto">Prodi</th>
          <th scope="col" class="text-center w-auto">Tahun Akademik</th>
          <th scope="col" class="text-center w-auto">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($mahasiswa as $data)
        <tr>
          <td class="text-center w-auto">{{ $loop->iteration }}</td>
          <td class="text-center w-auto">{{ $data->npm }}</td>
          <td class="text-center w-auto">{{ $data->nama_mahasiswa }}</td>
          <td class="text-center w-auto">{{ $data->nama_matkul }}</td>
          <td class="text-center w-auto">{{ $data->jurusan }}</td>
          <td class="text-center w-auto">{{ $data->prodi }}</td>
          <td class="text-center w-auto">{{ $data->tahun_akademik }}</td>
          <td class="text-center w-auto">
            <a href="{{ route ('mahasiswa.edit', $data->npm) }}">
              <button class="btn btn-primary">EDIT</button>
            </a>
            <form action="{{ route('mahasiswa.destroy', $data['npm']) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">HAPUS</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endsection