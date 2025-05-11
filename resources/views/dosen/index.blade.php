@extends('layout')
@section('title','Dosen')
@section('judul','Dosen')
@section('isi')
@if (Session::has('create'))
@csrf
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
<div class="container-fluid">
  <a href="{{ route('dosen.create') }}">
    <button class="btn btn-icon btn-3 btn-danger mb-3" type="button">
      <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
      <span class="btn-inner--text">Tambah Dosen</span>
    </button>
  </a>

  <div class="table-responsive">
    <table class="table table-striped table-bordered w-100">
      <thead class="text-center">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">ID Dosen</th>
          <th scope="col">Nama Dosen</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach ($dosen as $data)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $data['id_dosen'] }}</td>
          <td>{{ $data['nama_dosen'] }}</td>
          <td>
            <a href="{{ route('dosen.edit', $data['id_dosen']) }}">
              <button class="btn btn-primary btn-sm">EDIT</button>
            </a>
            <form action="{{ route('dosen.destroy', $data['id_dosen']) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">HAPUS</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection