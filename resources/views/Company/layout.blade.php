<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PT Contoh Perusahaan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="bg-overlay">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-opacity-75">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                     width="40" height="40" class="me-2">
                PT Contoh
            </a>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <main class="container py-5 text-white">
        @yield('content')
    </main>

</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    © 2026 PT Contoh Perusahaan
</footer>

</body>
</html>
