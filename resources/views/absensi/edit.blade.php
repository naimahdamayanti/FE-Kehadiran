@extends('layout')
@section('title','Edit Daftar Hadir')
@section('judul','Form Edit Daftar Hadir')
@section('isi')
<form action="{{ route('absensi.update', $absensi->id_kehadiran) }}" method="post">
        @csrf
        <div class="form-group mb-2">
          <label>NPM</label>
            <input value="{{ $absensi->npm }}" type="text" name="npm" 
          class="form-control">
        </div>
        <div class="form-group mb-2">
          <label>ID Dosen</label>
            <input value="{{ $absensi->id_dosen }}" type="text" name="id_dosen" 
          class="form-control">
        </div>
        <div class="form-group mb-2">
          <label>Pertemuan</label>
            <input value="{{ $absensi->pertemuan }}" type="text" name="pertemuan" 
          class="form-control">
        </div>
        <div class="form-group mb-2">
          <label>Keterangan</label>
            <input value="{{ $absensi->keterangan }}" type="text" name="keterangan" 
          class="form-control">
        </div>
      
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button>
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
