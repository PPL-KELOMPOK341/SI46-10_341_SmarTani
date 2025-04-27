<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        {{-- Font Awesome for Icons --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        {{-- Bootstrap CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')


            <!-- Page Content -->
            <main class="container my-5 main-content" id="main-content">
                @yield('content')
            </main>
            
            @include('layouts.footer')
        </div>
    </body>
</html>

{{-- 
<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SmarTani</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #3CB043;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom-left-radius: 40px;
        }

        .header .menu-icon {
            font-size: 24px;
            cursor: pointer;
        }

        .header .profile {
            display: flex;
            align-items: center;
            color: white;
        }

        .header .profile img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin-right: 8px;
        }

        .footer {
            background-color: #3CB043;
            color: white;
            padding: 40px 20px;
        }

        .footer-bottom {
            background-color: #025902;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer .social-icons i {
            margin: 0 5px;
            font-size: 20px;
        }

        .footer-logo img {
            max-width: 100%;
            height: auto;
        }
    </style>

    {{-- Font Awesome for Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="d-flex flex-column min-vh-100">  {{-- Menambahkan d-flex dan min-vh-100 di body --}}
    
    <header class="header">
        <div class="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <div class="profile">
            <img src="https://via.placeholder.com/32" alt="User Icon">
            <span>Rayhan Mulia Pratama</span>
        </div>
    </header>

    <main class="flex-fill" style="min-height: calc(100vh - 200px);">  {{-- Sesuaikan 200px dengan tinggi header+footer --}}
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row text-white">
                <div class="col-md-3 mb-3">
                    <h5>Our Office</h5>
                    <p><i class="fas fa-map-marker-alt"></i> Telkom University</p>
                    <p><i class="fas fa-phone"></i> 081212121</p>
                    <p><i class="fas fa-envelope"></i> smartani@gmail.com</p>
                    <div class="social-icons">
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-youtube"></i>
                        <i class="fab fa-linkedin"></i>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <h5>Fitur</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Program</a></li>
                        <li><a href="#">Hasil Tani</a></li>
                        <li><a href="#">Bantuan</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-logo mb-3 text-center">
                    <img src="https://via.placeholder.com/150x100?text=SmarTani+Logo" alt="SmarTani Logo">
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <small>&copy; SmarTani, All Right Reserved.</small>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

--}}
