<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin SmarTani</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('/images/vbadminlog.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px 30px;
            border-radius: 16px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .login-container h2 {
            font-size: 28px;
            margin-bottom: 25px;
            color: #2E7D32;
            font-weight: 600;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 6px;
            font-size: 14px;
            color: #1B5E20;
        }

        input {
            width: 100%;
            padding: 11px 12px;
            margin-bottom: 14px;
            border: 1px solid #C8E6C9;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        input:focus {
            border-color: #43A047;
            outline: none;
            background-color: #fff;
        }

        .error {
            color: #D32F2F;
            font-size: 13px;
            margin-bottom: 8px;
            text-align: left;
        }

        .btn-container {
            margin-top: 15px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 11px 28px;
            font-size: 15px;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #388E3C;
        }

        .footer {
            margin-top: 22px;
            font-size: 13px;
            color: #666;
        }

        .footer a {
            color: #2E7D32;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }

        .password-toggle svg {
            width: 22px;
            height: 22px;
            fill: #777;
        }

        .password-toggle:hover svg {
            fill: #2E7D32;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Admin SmarTani</h2>
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="password-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Masukkan password">
                <button type="button" class="password-toggle" id="togglePassword" aria-label="Tampilkan Password">
                    <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 5c-7 0-11 7-11 7s4 7 11 7 11-7 11-7-4-7-11-7zm0 12c-2.76 0-5-2.24-5-5 0-.67.13-1.3.35-1.87l6.52 6.52c-.57.22-1.2.35-1.87.35zm4.65-1.13l-6.52-6.52c.57-.22 1.2-.35 1.87-.35 2.76 0 5 2.24 5 5 0 .67-.13 1.3-.35 1.87z"/>
                    </svg>
                    <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="display: none;">
                        <path d="M12 6c-5.33 0-8.31 3.96-9.33 6 .99 2.02 3.86 6 9.33 6s8.34-3.98 9.33-6c-1.02-2.04-4-6-9.33-6zm0 10c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z"/>
                    </svg>
                </button>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="btn-container">
                <button type="submit">Login</button>
            </div>
        </form>

        <div class="footer">
            <p>&copy; 2025 SmarTani. 
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Lupa password?</a>
                @endif
            </p>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeClosed = document.getElementById('eyeClosed');
        const eyeOpen = document.getElementById('eyeOpen');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeOpen.style.display = type === 'password' ? 'none' : 'inline';
            eyeClosed.style.display = type === 'password' ? 'inline' : 'none';
        });
    </script>
</body>
</html>
