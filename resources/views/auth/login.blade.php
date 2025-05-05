<x-guest-layout>
    <!-- Status Sukses -->
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <!-- Error Login Umum -->
    @if (session('login_error'))
        <div class="mb-4 text-sm text-red-600">
            {{ session('login_error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Alamat Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
            <input 
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                dusk="email"
                placeholder="contoh@email.com"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-600 focus:ring-green-600"
            >
            @error('email')
                <p class="mt-2 text-sm text-red-600" dusk="email-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kata Sandi -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
            <div class="relative">
                <input 
                    id="password"
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    dusk="password"
                    placeholder="••••••••"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-600 focus:ring-green-600 pr-10"
                >
                <span onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                    <svg id="icon-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 3C5 3 1.73 7.11 1 10c.73 2.89 4 7 9 7s8.27-4.11 9-7c-.73-2.89-4-7-9-7zm0 12a5 5 0 110-10 5 5 0 010 10z" />
                        <path d="M10 7a3 3 0 100 6 3 3 0 000-6z" />
                    </svg>
                </span>
            </div>
            @error('password')
                <p class="mt-2 text-sm text-red-600" dusk="password-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Ingat Saya -->
        <div class="flex items-center">
            <input 
                id="remember_me"
                name="remember"
                type="checkbox"
                dusk="remember-me"
                class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500"
            >
            <label for="remember_me" class="ml-2 block text-sm text-gray-600">
                Ingat saya
            </label>
        </div>

        <!-- Aksi -->
        <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
                <a 
                    dusk="forgot-password-link"
                    class="text-sm text-gray-600 underline hover:text-gray-900"
                    href="{{ route('password.request') }}"
                >
                    Lupa kata sandi?
                </a>
            @endif

            <button
                type="submit"
                dusk="submit-login"
                class="ml-3 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white text-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
            >
                Masuk
            </button>
        </div>

        <!-- Belum punya akun -->
        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-green-700 font-semibold hover:underline">
                    Daftar sekarang
                </a>
            </p>
        </div>
    </form>

    <!-- Script Toggle Password -->
    <script>
        function togglePassword(fieldId) {
            const input = document.getElementById(fieldId);
            const icon = document.getElementById('icon-' + fieldId);

            if (input.type === "password") {
                input.type = "text";
                icon.innerHTML = `<path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"/>`;
            } else {
                input.type = "password";
                icon.innerHTML = `
                    <path d="M10 3C5 3 1.73 7.11 1 10c.73 2.89 4 7 9 7s8.27-4.11 9-7c-.73-2.89-4-7-9-7zm0 12a5 5 0 110-10 5 5 0 010 10z" />
                    <path d="M10 7a3 3 0 100 6 3 3 0 000-6z" />
                `;
            }
        }
    </script>
</x-guest-layout>
