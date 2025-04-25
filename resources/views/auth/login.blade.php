<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SmarTani</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background: url('{{ asset('images/back.png') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
        }
        .form-container {
            max-width: 400px;
            margin: 5% auto;
            background: white;
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .form-container img {
            width: 80px;
            margin-bottom: 15px;
        }
        .form-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            background: #f5f5f5;
            border-radius: 8px;
        }
        .form-container button {
            width: 100%;
            background: #1877f2;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: bold;
            margin-top: 10px;
            cursor: pointer;
        }
        .form-container a {
            color: #1877f2;
            text-decoration: none;
        }
        .form-container .link-bottom {
            margin-top: 15px;
            font-size: 14px;
        }
        .alert {
            background-color: #ffe0e0;
            color: #d8000c;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <img src="{{ asset('images/smartani_logo2.png') }}" alt="SmarTani Logo">
        <p>Silahkan masukkan email dan password</p>

        {{-- Alert jika login gagal --}}
        @if (session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

        {{-- Tampilkan error validasi khusus email/password --}}
        @if ($errors->any())
            <div class="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Masuk</button>
        </form>

        <div class="link-bottom">
            <p>Belum punya akun? <a href="{{ route('register.form') }}">Daftar disini</a></p>
        </div>
    </div>
</body>
</html>