<!DOCTYPE html>
<html>
<head>
    <title>SmartTani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            width: 250px;
            background-color: #28a745;
            min-height: 100vh;
            color: white;
        }

        .content-area {
            flex-grow: 1;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
        }

        .footer {
            background-color: #28a745;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="d-flex" style="min-height: 100vh;">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h5>SmartTani</h5>
            <ul class="nav flex-column mt-4">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('pendapatan.create') }}">Form Pencatatan</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Riwayat Penanaman</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Riwayat Hasil Panen</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Riwayat Pendapatan</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('riwayat.index') }}">Riwayat Pengeluaran</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Grafik</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Form Pengaduan</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>

        <!-- Konten -->
        <div class="content-area d-flex flex-column">
            <main class="flex-grow-1 p-4">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="footer">
                <div>
                    <strong>Our Office</strong><br>
                    Telkom University<br>
                    082123021<br>
                    smarttani@gmail.com<br>
                    <a href="#" class="text-white text-decoration-underline">About Us</a> |
                    <a href="#" class="text-white text-decoration-underline">Support</a> |
                    <a href="#" class="text-white text-decoration-underline">Contact Us</a><br>
                    <small>&copy; 2023 SmartTani. All Rights Reserved.</small>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
