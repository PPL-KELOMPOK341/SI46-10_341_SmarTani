<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ \App\Models\Setting::first()->site_title ?? 'SmarTani' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; min-height: 100vh; margin: 0; }
        .sidebar { width: 220px; background-color: #f2f2f2; padding-top: 70px; }
        .content { flex: 1; padding: 20px; margin-left: 220px; }
        .header { height: 60px; background-color: #2ecc71; color: white; position: fixed; top: 0; left: 0; right: 0; padding: 15px 20px; z-index: 1000; }
        .sidebar a { display: block; padding: 12px 20px; color: #333; text-decoration: none; }
        .sidebar a:hover { background-color: #ddd; }
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
