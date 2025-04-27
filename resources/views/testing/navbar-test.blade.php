<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Testing</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- @vite('resources/css/app.css') --}}
</head>
<body class="bg-gray-100">
    {{-- @include('components.navbar-user') --}}
    
    <!-- Testing Content -->
    <div class="pt-20 px-4">
        <div class="max-w 7xl mx-auto">
            <div class="bg-white p-6 rounded-lg shadow">
                <h1 class="text-2xl font-bold text-gray-800">Halaman Testing Navbar</h1>
                <p class="mt-4 text-gray-600">
                    Ini adalah halaman untuk testing tampilan navbar. 
                    Kita bisa melihat bagaimana navbar berperilaku dengan konten di bawahnya.
                </p>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>