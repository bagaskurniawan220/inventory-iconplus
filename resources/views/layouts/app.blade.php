<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Inventory IconPlus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>

    {{-- SIDEBAR --}}
    <aside id="sidebar" class="sidebar">
        <div class="sidebar-brand">
            <i class="bi bi-box-seam-fill"></i> IconPlus
        </div>

        <ul class="sidebar-menu">
            <li class="menu-title">Menu Utama</li>
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>

            <li class="menu-title">Data Master</li>
            <li><a href="#"><i class="bi bi-box"></i> Barang</a></li>
            <li><a href="#"><i class="bi bi-geo-alt"></i> Lokasi</a></li>

            {{-- Menu ini hanya muncul untuk admin --}}
            @if (auth()->user()->isAdmin())
                <li>
    <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
        <i class="bi bi-tags"></i> Kategori
    </a>
</li>
                <li><a href="#"><i class="bi bi-rulers"></i> Satuan</a></li>
                <li><a href="#"><i class="bi bi-truck"></i> Supplier</a></li>
            @endif

            <li class="menu-title">Transaksi</li>
            <li><a href="#"><i class="bi bi-box-arrow-in-down"></i> Stok Masuk</a></li>
            <li><a href="#"><i class="bi bi-box-arrow-up"></i> Stok Keluar</a></li>
            <li><a href="#"><i class="bi bi-arrow-left-right"></i> Pindah Barang</a></li>
            <li><a href="#"><i class="bi bi-clipboard-check"></i> Stok Opname</a></li>

            <li class="menu-title">Laporan</li>
            <li><a href="#"><i class="bi bi-file-earmark-text"></i> Laporan</a></li>

            @if (auth()->user()->isAdmin())
                <li class="menu-title">Pengaturan</li>
                <li><a href="#"><i class="bi bi-people"></i> Pengguna</a></li>
                <li><a href="#"><i class="bi bi-activity"></i> Log Aktivitas</a></li>
            @endif
        </ul>
    </aside>

    <div class="overlay" id="overlay"></div>

    {{-- BAGIAN KANAN: NAVBAR + ISI --}}
    <div class="main">
        <nav class="topbar">
            <button class="btn btn-light d-lg-none" id="btnToggle">
                <i class="bi bi-list fs-5"></i>
            </button>

            <h5 class="mb-0 ms-2 ms-lg-0">@yield('title')</h5>

            <div class="ms-auto dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none text-dark" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle fs-4 me-2"></i>
                    <span class="d-none d-sm-inline">
                        {{ auth()->user()->name }}
                        <span class="badge bg-primary">{{ auth()->user()->role }}</span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Keluar</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        document.getElementById('btnToggle').addEventListener('click', function () {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', function () {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
    </script>
</body>
</html>
