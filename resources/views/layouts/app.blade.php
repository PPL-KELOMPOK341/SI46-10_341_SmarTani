<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Smartani</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            background-color: #28a745;
            position: fixed;
            top: 0;
            bottom: 0;
            color: #fff;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #fff;
            padding: 10px 20px;
        }
        .sidebar .nav-link:hover {
            background-color: #218838;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .topbar {
            background-color: #28a745;
            color: #fff;
            padding: 15px 20px;
            border-bottom-left-radius: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .topbar .username {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .topbar .circle {
            width: 40px;
            height: 40px;
            background-color: #ffffff;
            border-radius: 50%;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Smartani</h4>
        <nav class="nav flex-column mt-4">
            <a class="nav-link" href="#">Dashboard</a>
            <a class="nav-link" href="#">Form Pendapatan</a>
            <a class="nav-link" href="#">Laporan</a>
            <a class="nav-link" href="#">Pengaturan</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="topbar">
            <div><strong>FORM PENDAPATAN</strong></div>
            <div class="username">
                <div class="circle"></div>
                <span>Rayhan Mulia Pratama</span>
            </div>
        </div>

        <div class="content mt-4">
            @yield('content')
        </div>
    </div>

</body>
</html>
