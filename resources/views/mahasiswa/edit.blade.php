@extends('layout')
@section('title','Edit Mahasiswa')
@section('judul','Form Edit Mahasiswa')
@section('isi')
<form action="{{ route('mahasiswa.update', $mahasiswa->npm) }}" method="POST">
    @csrf
    @method('PUT') <!-- Gunakan method PUT untuk update -->

    <div class="form-group mb-2">
        <label>NPM</label>
        <input value="{{ $mahasiswa->npm }}" type="text" name="npm" class="form-control" readonly>
    </div>
    <div class="form-group mb-2">
        <label>Nama Mahasiswa</label>
        <input value="{{ $mahasiswa->nama_mahasiswa }}" type="text" name="nama_mahasiswa" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label>Mata Kuliah</label>
        <input value="{{ $mahasiswa->nama_matkul }}" type="text" name="nama_matkul" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label>Jurusan</label>
        <input value="{{ $mahasiswa->jurusan }}" type="text" name="jurusan" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label>Prodi</label>
        <input value="{{ $mahasiswa->prodi }}" type="text" name="prodi" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label>Tahun Akademik</label>
        <input value="{{ $mahasiswa->tahun_akademik }}" type="text" name="tahun_akademik" class="form-control">
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Save</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>



    {{--  javascript untuk validasi form bootstrap di atas  --}}
    
    {{-- <script>// Example starter JavaScript for disabling form submissions if there are invalid fields
            (() => {
              'use strict'
            
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              const forms = document.querySelectorAll('.needs-validation')
            
              // Loop over them and prevent submission
              Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                  if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                  }
            
                  form.classList.add('was-validated')
                }, false)
              })
            })()
    </script> --}}
@endsection        
