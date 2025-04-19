<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SmarTani</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') {{-- Pastikan pakai Vite --}}
    @vite('resources/js/app.js') {{-- Tambahkan JS dari Vite --}}
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <!-- Header -->
    <header class="bg-green-600 rounded-b-full">
        <div class="flex justify-between items-center px-6 py-4">
            <div class="text-white text-2xl">
                <i class="fas fa-bars"></i> {{-- Pastikan menggunakan ikon SVG atau Font Awesome --}}
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow">
                    <img src="https://www.svgrepo.com/show/382106/account-avatar-profile-user-11.svg" alt="User" class="w-6 h-6">
                </div>
                <span class="text-white text-sm hidden sm:inline">Rayhan Mulia Pratama</span>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto py-6 px-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-green-600 text-white mt-12">
        <div class="max-w-6xl mx-auto py-10 px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="font-bold text-lg mb-2">Our Office</h3>
                <p>Telkom University</p>
                <p>08122121</p>
                <p>smartani@gmail.com</p>
                <div class="flex space-x-3 mt-3">
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-linkedin"></i>
                </div>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-2">Fitur</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:underline">Program</a></li>
                    <li><a href="#" class="hover:underline">Hasil Tani</a></li>
                    <li><a href="#" class="hover:underline">Bantuan</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-2">Quick Links</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:underline">About Us</a></li>
                    <li><a href="#" class="hover:underline">Contact Us</a></li>
                    <li><a href="#" class="hover:underline">Support</a></li>
                </ul>
            </div>
            <div class="flex items-center justify-center">
                <img src="{{ asset('images/logo-smartani.png') }}" alt="SmarTani" class="h-16">
            </div>
        </div>
        <div class="bg-green-700 text-center text-sm py-3">
            © <a href="#" class="underline">SmarTani</a> — All Right Reserved.
        </div>
    </footer>

</body>
</html>
