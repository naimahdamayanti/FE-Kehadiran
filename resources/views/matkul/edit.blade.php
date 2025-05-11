@extends('layout')
@section('title','Edit Mata Kuliah')
@section('judul','Form Edit Mata Kuliah')
@section('isi')
<form action="{{ route('matkul.update', $matkul->id_matkul) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
          <label>Nama Mata Kuliah</label>
            <input value="{{ $matkul->nama_matkul }}" type="text" name="nama_matkul" 
          class="form-control">
        </div>
        <div class="form-group mb-2">
          <label>SKS</label>
            <input value="{{ $matkul->sks}}" type="text" name="sks" 
          class="form-control">
        </div>
        <div class="form-group mb-2">
          <label>Semester</label>
            <input value="{{ $matkul->semester}}" type="text" name="semester" 
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
