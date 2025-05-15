@extends('layout')
@section('title','Daftar Hadir')
@section('judul','Daftar Hadir')
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
<a href="{{ route('absensi.create')}}">
  <button class="btn btn-icon btn-3 btn-danger" type="button">
      <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
    <span class="btn-inner--text">Isi Daftar Hadir</span>
  </button>
</a>
<a href="{{ route('export-pdf') }}" target="_blank">
    <button class="btn btn-icon btn-3 btn-success" type="button">
        <span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
        <span class="btn-inner--text">Export ke PDF</span>
    </button>
</a>
<div class="table-responsive">
   <table class="table table-striped table-bordered table-layout-fixed">
        <thead>
            <tr>
                <th scope="col"class="text-center w-auto">No</th>
                <th scope="col"class="text-center w-auto">ID Kehadiran</th>
                <th scope="col"class="text-center w-auto">Nama Mahasiswa</th>
                <th scope="col"class="text-center w-auto">ID Dosen</th>
                <th scope="col"class="text-center w-auto">ID Matkul</th>
                <th scope="col"class="text-center w-auto">Pertemuan 1</th>
                <th scope="col"class="text-center w-auto">Pertemuan 2</th>
                <th scope="col"class="text-center w-auto">Pertemuan 3</th>
                <th scope="col"class="text-center w-auto">Pertemuan 4</th>
                <th scope="col"class="text-center w-auto">Pertemuan 5</th>
                <th scope="col"class="text-center w-auto">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $data)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $data['id_kehadiran'] }}</td>
                <td class="text-center">{{ $data['npm'] }}</td>
                <td class="text-center">{{ $data['id_dosen'] }}</td>
                <td class="text-center">{{ $data['id_matkul'] }}</td>
                <td class="text-center">{{ $data['keterangan'] }}</td>
                <td class="text-center">{{ $data['keterangan'] }}</td>
                <td class="text-center">{{ $data['keterangan'] }}</td>
                <td class="text-center">{{ $data['keterangan'] }}</td>
                <td class="text-center">{{ $data['keterangan'] }}</td>
                <!-- <td class="text-center">{{ $data['keterangan'] }}</td> -->
                <td class="text-center">
                      <a href="{{ route('absensi.edit', $data['id_kehadiran']) }}">
                          <button class="btn btn-primary text">EDIT</button>
                      </a>

                      <form action="{{ route('absensi.destroy', $data['id_kehadiran']) }}" method="POST" style="display: inline;">
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
</div>
@endsection