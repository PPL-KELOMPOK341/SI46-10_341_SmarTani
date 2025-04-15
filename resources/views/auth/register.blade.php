<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SmartTani</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('/images/back.png') no-repeat center center fixed;
            background-size: cover;
        }

        .card {
            background-color: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 400px;
            width: 100%;
            margin: auto;
            margin-top: 5%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            height: 60px;
        }

        .title {
            text-align: center;
            font-size: 16px;
            margin-bottom: 30px;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            margin-bottom: 20px;
            background-color: #f7f7f7;
            font-size: 14px;
        }

        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background-color: #1e90ff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .login-link a {
            color: #1e90ff;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="logo">
            <img src="/images/smartani_logo2.png" alt="SmartTani">
        </div>
        <div class="title">
            Silahkan masukkan Data dengan benar
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" class="form-control" placeholder="Nama lengkap" required>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="text" name="phone" class="form-control" placeholder="No Telepon" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn">Daftar</button>
        </form>
        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
        </div>
    </div>

</body>
</html>
