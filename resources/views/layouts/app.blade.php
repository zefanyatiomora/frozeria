<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <style>
        body {
            background-color: #f5f6fa;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .card {
            border: none;
            border-radius: 14px;
        }

        .table th {
            font-weight: 600;
        }

        img.object-fit-cover {
            object-fit: cover;
        }

        .btn-outline-light {
            border-radius: 6px;
            padding: 6px 12px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">

            <div class="d-flex align-items-center gap-4">

                {{-- LOGO --}}
                <a class="navbar-brand mb-0" href="{{ route('barang.index') }}">
                    <span class="fw-bold">Frozeria</span>
                    <span class="fw-normal">Stok</span>
                </a>

                {{-- MENU --}}
                <ul class="navbar-nav d-flex flex-row gap-3">

                    <li class="nav-item">
                        <a class="nav-link px-3
                        {{ request()->routeIs('barang.*') ? 'bg-secondary border border-light text-white fw-semibold' : 'text-white' }}"
                            href="{{ route('barang.index') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-3
                        {{ request()->routeIs('kategori.*') ? 'bg-secondary border border-light text-white fw-semibold' : 'text-white' }}"
                            href="{{ route('kategori.index') }}">
                            Kategori
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-3
                    {{ request()->routeIs('bantuan') ? 'bg-secondary border border-light text-white fw-semibold' : 'text-white' }}"
                            href="{{ route('bantuan') }}">
                            Bantuan
                        </a>
                    </li>
                </ul>
            </div>

            <div class="ms-auto">
                @if (request()->routeIs('barang.*'))
                    <a href="{{ route('barang.create') }}" class="btn btn-outline-light btn-sm">
                        + Tambah Barang
                    </a>
                @elseif(request()->routeIs('kategori.*'))
                    <a href="{{ route('kategori.create') }}" class="btn btn-outline-light btn-sm">
                        + Tambah Kategori
                    </a>
                @endif
            </div>
        </div>
    </nav>

    {{-- CONTENT --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
