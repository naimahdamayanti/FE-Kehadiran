<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('argon-dashboard-master/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{url('argon-dashboard-master/assets/img/favicon.png')}}">
    <title>
        Kehadiran | @yield('title')
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{url('argon-dashboard-master/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{url('argon-dashboard-master/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ url ('argon-dashboard-master/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ url ('argon-dashboard-master/assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
    <style>
        /* Tambahan CSS untuk responsif */
        @media (max-width: 991.98px) {
            .fixed-start {
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1030;
                width: 250px;
                height: 100vh;
                transform: translateX(1%);
                transition: transform 0.3s ease-in-out;
            }
            .g-sidenav-show .fixed-start {
                transform: translateX(0);
            }
            .navbar-main {
                padding-left: 1rem;
            }
            .main-content {
                margin-left: 0 !important;
            }
        }
        
        /* Efek hover untuk nav item */
        .nav-item .nav-link:not(.active):hover {
            background-color: rgba(0, 0, 0, 0.05);
            border-radius: 0.375rem;
        }
        
        /* Nav link active - Warna lebih kontras */
        .nav-item .nav-link.active {
            background-color: #5e72e4 !important;
            color: white !important;
            border-radius: 0.375rem;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 
                        0 7px 10px -5px rgba(78, 115, 223, 0.4);
        }
        .nav-item .nav-link.active i {
            color: white !important;
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-100 bg-primary position-absolute w-100"></div>
    
    <!-- Sidebar -->
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-xl-none hidden" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
                <img src="{{url('argon-dashboard-master/assets/img/logo-sidebar.png')}}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Monitoring Kehadiran</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dosen.*') ? 'active' : '' }}" href="{{ route('dosen.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-circle-08 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dosen</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}" href="{{ route('mahasiswa.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-hat-3 text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Mahasiswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('matkul.*') ? 'active' : '' }}" href="{{ route('matkul.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-books text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Mata Kuliah</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('absensi.*') ? 'active' : '' }}" href="{{ route('absensi.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Daftar Hadir</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main class="main-content position-relative border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <div class="d-flex align-items-center">
                    <button class="btn btn-link d-xl-none" id="toggleSidenav">
                        <i class="fas fa-bars text-white"></i>
                    </button>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white">Pages</a></li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page">@yield('judul')</li>
                        </ol>
                        <h6 class="font-weight-bolder text-white mb-0">@yield('judul')</h6>
                    </nav>
                </div>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="logout-button">
                                    <i class="fa fa-sign-out-alt me-sm-2"></i>
                                    <span class="d-sm-inline d-none">Log Out</span>
                                </button>

                                <style>
                                    .logout-button {
                                        background: linear-gradient(135deg, #f5365c, #f56036);
                                        border: none;
                                        color: white;
                                        padding: 10px 20px;
                                        font-weight: bold;
                                        border-radius: 30px;
                                        cursor: pointer;
                                        display: flex;
                                        align-items: center;
                                        gap: 8px;
                                        transition: all 0.3s ease;
                                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                                    }

                                    .logout-button:hover {
                                        background: linear-gradient(135deg, #f56036, #f5365c);
                                        transform: scale(1.05);
                                        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
                                    }

                                    .logout-button i {
                                        transition: transform 0.3s ease;
                                    }

                                    .logout-button:hover i {
                                        transform: rotate(-20deg);
                                    }
                                </style>

                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4 mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-success">@yield('judul')</h6>
                        </div>
                        <div class="card-body">
                            @yield('isi')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="{{url('argon-dashboard-master/assets/js/core/popper.min.js')}}"></script>
    <script src="{{url('argon-dashboard-master/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{url('argon-dashboard-master/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{url('argon-dashboard-master/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{url('argon-dashboard-master/assets/js/plugins/chartjs.min.js')}}"></script>
    
        
    <script>
        document.getElementById('toggleSidenav').addEventListener('click', function() {
            document.body.classList.toggle('g-sidenav-show');
        });
        // Script untuk toggle sidebar di mobile
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidenav-main');
            const closeIcon = document.getElementById('iconSidenav'); // Tombol X
            const toggleBtn = document.getElementById('toggleSidenav'); // Tombol burger
            let isClicked = false;

            isClicked ? sidebar.style.display = 'none' : sidebar.style.display = 'block';

            // Klik tombol burger untuk membuka sidebar
            toggleBtn.addEventListener('click', function () {
                sidebar.style.display = 'block';
            });
            
            // Klik tombol X untuk menutup sidebar (khusus mobile)
            closeIcon.addEventListener('click', function () {
                sidebar.style.display = 'none';
            });
            
        });
        
        // Menambahkan kelas active berdasarkan route yang sedang diakses
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });
    </script>
    
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{url('argon-dashboard-master/assets/js/argon-dashboard.min.js?v=2.0.4')}}"></script>

</body>
</html>