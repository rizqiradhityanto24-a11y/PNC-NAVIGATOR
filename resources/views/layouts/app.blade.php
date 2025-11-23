<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PNC Navigator</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        /* Search bar responsive di HP */
        @media (max-width: 576px) {
            form[role="search"] input {
                width: 140px;
                font-size: 14px;
            }
            form[role="search"] button {
                padding: 5px 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">PNC Navigator</a>

            <button class="navbar-toggler" type="button" 
                data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <!-- Menu kiri -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('rooms.map') }}">Eksplor</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('rooms.index') }}">Ruangan</a></li>
                </ul>

                <!-- Search Bar -->
                <form class="d-flex ms-auto mt-2 mt-lg-0" role="search" action="{{ route('rooms.search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="q" placeholder="Cari ruangan..." value="{{ request('q') }}">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </form>

            </div>
        </div>
    </nav>

    <div class="container mt-4 mb-5">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
