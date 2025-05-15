
@extends('layout')
@section('title','Dashboard')
@section('judul','Dashboard')
@section('isi')

<div class="d-flex align-items-center justify-content-center" style="min-height: 65vh; overflow-x: hidden;">
  <div class="container">
    <div class="row justify-content-center">
      @php
      $user = session('user');

      $card = [];

      // Cek apakah user tidak null dan punya role
     
      if ($user && $user->role === 'admin') {
         $cards = [
      ['title' => 'Total Dosen', 'model' => \App\Models\Dosen::class, 'route' => 'dosen.index', 'color' => 'bg-gradient-primary', 'icon' => 'ni ni-single-02'],
      ['title' => 'Total Mahasiswa', 'model' => \App\Models\Mahasiswa::class, 'route' => 'mahasiswa.index', 'color' => 'bg-gradient-danger', 'icon' => 'ni ni-hat-3'],
      ['title' => 'Mata Kuliah', 'model' => \App\Models\Matkul::class, 'route' => 'matkul.index', 'color' => 'bg-gradient-success', 'icon' => 'ni ni-books'],
      ['title' => 'Daftar Hadir', 'model' => \App\Models\Absensi::class, 'route' => 'absensi.index', 'color' => 'bg-gradient-warning', 'icon' => 'ni ni-check-bold']
      ];
      }elseif ($user && $user->role === 'dosen'){
      $cards = [
      ['title' => 'Mata Kuliah', 'model' => \App\Models\Matkul::class, 'route' => 'matkul.index', 'color' => 'bg-gradient-success', 'icon' => 'ni ni-books'],
      ['title' => 'Daftar Hadir', 'model' => \App\Models\Absensi::class, 'route' => 'absensi.index', 'color' => 'bg-gradient-warning', 'icon' => 'ni ni-check-bold']
      ];
      }
     
      @endphp

      @foreach($cards as $card)
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ $card['title'] }}</p>
                  <h1>{{ $card['model']::count() }}</h1>
                  <a class="stretched-link" href="{{ route($card['route']) }}">Detail..</a>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape {{ $card['color'] }} shadow-primary text-center rounded-circle">
                  <i class="{{ $card['icon'] }} text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection

<!-- <div class="text-center" style="">
            <h1></h1>
            <h5></h5>
        </div> -->
</main>
</div>
<style>
  body,
  html {
    overflow-x: hidden;
    width: 100%;
  }

  .container,
  .container-fluid {
    max-width: 100%;
  }

  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }
</style>


<!-- Custom styles for this template -->
<link href="{{ url('bootstrap-5.2.2-examples/pricing/pricing.css') }}" rel="stylesheet">
</head>

<body>

  <script src="{{ asset('js/dashboard.js') }}"></script>