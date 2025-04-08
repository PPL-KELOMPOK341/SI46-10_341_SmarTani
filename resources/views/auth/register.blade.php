<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar SmartTani</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('/images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .form-container {
            background: white;
            width: 350px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <img src="/images/logo.png" alt="SmartTani" style="width: 120px;">
        <h3>Silahkan masukkan Data dengan benar</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="Nama lengkap" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="No Telepon" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="{{ route('login') }}">masuk disini</a></p>
    </div>
</body>
</html>

