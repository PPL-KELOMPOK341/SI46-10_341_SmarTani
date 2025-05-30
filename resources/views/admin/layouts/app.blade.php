<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ \App\Models\Setting::first()->site_title ?? 'SmarTani' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
            background-color: #2ecc71;
            color: white;
            padding: 15px 20px;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar {
            position: fixed;
            top: 60px;
            left: 0;
            bottom: 0;
            width: 220px;
            background-color: #f2f2f2;
            padding-top: 20px;
            overflow-y: auto;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #333;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #ddd;
        }

        .content {
            margin-left: 220px;
            padding: 80px 20px 20px; /* top 80px = 60 header + 20 spacing */
        }
    </style>
</head>
<body>

    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
