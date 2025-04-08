<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SmartTani</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('/images/bg-tani.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .card {
            width: 400px;
            background-color: white;
            border-radius: 20px;
            margin: 100px auto;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .card img {
            height: 50px;
            margin-bottom: 20px;
        }
        .input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }
        .button {
            width: 100%;
            padding: 12px;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
        }
        .link {
            margin-top: 10px;
            display: block;
            color: #1a73e8;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="card">
        <img src="/images/logo.png" alt="SmartTani">
        <h3>Silahkan masukkan email & password!</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" class="input" placeholder="Email" required>
            <input type="password" name="password" class="input" placeholder="Password" required>
            <a href="#" class="link">Lupa password?</a>
            <button type="submit" class="button">Masuk</button>
        </form>
        <p>Belum punya akun? <a href="/register" class="link">Daftar disini</a></p>
    </div>
</body>
</html>
