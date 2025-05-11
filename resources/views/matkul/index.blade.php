@extends('layout')
@section('title','Mata Kuliah')
@section('judul','Mata Kuliah')
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
<a href="{{ route('matkul.create')}}">
  <button class="btn btn-icon btn-3 btn-danger" type="button">
      <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
    <span class="btn-inner--text">Tambah Mata Kuliah</span>
  </button>
</a>
    <table class="table table-striped table-bordered table-layout-fixed">
          <thead>
              <tr>
                  <th scope="col" class="text-center w-auto">No</th>
                  <th scope="col" class="text-center w-auto">ID Mata Kuliah</th>
                 <th scope="col" class="text-center w-auto">Nama Mata Kuliah</th>
                <th scope="col" class="text-center w-auto">SKS</th>
                <th scope="col" class="text-center w-auto">Semester</th>
                <th scope="col" class="text-center w-auto">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matkul as $data)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $data->id_matkul }}</td>
                <td class="text-center">{{ $data->nama_matkul }}</td>
                <td class="text-center">{{ $data->sks }}</td>
                <td class="text-center">{{ $data->semester }}</td>
                <td class="text-center">
                      <a href="{{ route ('matkul.edit', $data->id_matkul) }}">
                          <button class="btn btn-primary">EDIT</button>
                      </a>
                      <form action="{{ route('matkul.destroy', $data['id_matkul']) }}" method="POST" style="display: inline;">
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