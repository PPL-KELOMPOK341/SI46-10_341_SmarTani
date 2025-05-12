<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Petani</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('https://source.unsplash.com/1600x900/?farm,green') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .login-container h2 {
            font-size: 26px;
            margin-bottom: 20px;
            color: #4A90E2;
            font-weight: bold;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 14px;
            color: #4A90E2;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus {
            border-color: #4A90E2;
            outline: none;
        }

        .error {
            color: red;
            font-size: 13px;
            margin-bottom: 10px;
            text-align: left;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        button {
            background-color: #4A90E2;
            color: white;
            border: none;
            padding: 10px 25px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #357ABD;
        }

        .footer {
            margin-top: 20px;
            font-size: 13px;
            color: #555;
        }

        .footer a {
            color: #4A90E2;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Custom styles for password visibility toggle */
        .password-container {
            position: relative;
        }

        .password-container span {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
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
                <span id="togglePassword">👁️</span>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="btn-container">
                <button type="submit">Login</button>
            </div>
        </form>

        <div class="footer">
            <p>&copy; 2025 Admin Petani.
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Lupa password?</a>
                @endif
            </p>
        </div>
    </div>

    <script>
        // Script untuk toggle password visibility
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle the eye icon
            this.textContent = type === 'password' ? '👁️' : '🙈';
        });
    </script>
</body>
</html>
