<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>


{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SmarTani</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {

            background: url('{{ asset('images/back.png') }}') no-repeat center center fixed;
>>>>>>> 9534544 (Membuat Register)
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
    </style>
</head>
<body>
    <div class="form-container">
        <img src="{{ asset('images/smartani_logo2.png') }}" alt="SmarTani Logo">
        <p>Silahkan masukkan email dan password</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Masuk</button>
        </form>

        <div class="link-bottom">
            <p>Belum punya akun? <a href="{{ route('register.form') }}">Daftar disini</a></p>
        </div>
    </div>
</body>
</html> --}}

