<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Pendapatan - SmarTani</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom CSS jika ada --}}
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">SmarTani</a>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer class="bg-light py-4 mt-5 text-center">
        <div class="container">
            <small>&copy; {{ date('Y') }} SmarTani. All rights reserved.</small>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
