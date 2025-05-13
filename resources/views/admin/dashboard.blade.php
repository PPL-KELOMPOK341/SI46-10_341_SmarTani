<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
        }

        .navbar {
            background-color: #4A90E2;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .container {
            padding: 30px;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px 0;
            text-align: center;
        }

        .card h3 {
            font-size: 22px;
            color: #333;
        }

        .footer {
            margin-top: 40px;
            background-color: #4A90E2;
            color: white;
            text-align: center;
            padding: 10px;
        }

        a {
            text-decoration: none;
            color: #4A90E2;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .card {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h2>Dashboard Admin</h2>
    </div>

    <div class="container">
        <div class="card">
            <h3>Selamat datang, {{ Auth::user()->name }}!</h3>
            <p>Ini adalah halaman dashboard untuk admin. Dari sini, Anda dapat mengelola berbagai aspek aplikasi.</p>
        </div>

        <div class="card">
            <h3>Berita</h3>
            <p>Kelola berita terbaru di situs ini.</p>
            <a href="{{ route('admin.berita.index') }}">Lihat Berita</a>
        </div>

        <div class="card">
            <h3>Pengelolaan Data</h3>
            <p>Kelola data penanaman, hasil panen, pendapatan, dan pengeluaran.</p>
            <a href="{{ route('penanaman.index') }}">Lihat Data Penanaman</a> <!-- Pastikan route ini didefinisikan -->
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Your Farm Admin | 
            <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: white;">Logout</button>
            </form>
        </p>
    </div>

</body>
</html>
