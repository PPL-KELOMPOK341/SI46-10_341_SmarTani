<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Nama Lengkap -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input 
                id="name" 
                name="name" 
                type="text" 
                dusk="name"
                value="{{ old('name') }}" 
                required 
                autofocus 
                autocomplete="name"
                placeholder="Nama lengkap Anda"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-600 focus:ring-green-600"
            >
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Alamat Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
            <input 
                id="email" 
                name="email" 
                type="email" 
                dusk="email"
                value="{{ old('email') }}" 
                required 
                autocomplete="username"
                placeholder="contoh@email.com"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-600 focus:ring-green-600"
            >
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Nomor Telepon -->
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
            <input 
                id="phone" 
                name="phone" 
                type="text" 
                dusk="phone"
                value="{{ old('phone') }}" 
                required 
                autocomplete="tel"
                placeholder="08xxxxxxxxxx"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-600 focus:ring-green-600"
            >
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Kata Sandi -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
            <div class="relative">
                <input 
                    id="password" 
                    name="password" 
                    type="password" 
                    dusk="password"
                    required 
                    autocomplete="new-password"
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
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Konfirmasi Kata Sandi -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
            <div class="relative">
                <input 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    type="password" 
                    dusk="password_confirmation"
                    required 
                    autocomplete="new-password"
                    placeholder="Ulangi kata sandi"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-600 focus:ring-green-600 pr-10"
                >
                <span onclick="togglePassword('password_confirmation')" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                    <svg id="icon-password_confirmation" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 3C5 3 1.73 7.11 1 10c.73 2.89 4 7 9 7s8.27-4.11 9-7c-.73-2.89-4-7-9-7zm0 12a5 5 0 110-10 5 5 0 010 10z" />
                        <path d="M10 7a3 3 0 100 6 3 3 0 000-6z" />
                    </svg>
                </span>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Aksi -->
        <div class="flex items-center justify-between">
            <a 
                class="text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" 
                href="{{ route('login') }}"
            >
                Sudah punya akun?
            </a>

            <button 
                type="submit" 
                dusk="submit-register"
                class="ml-3 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white text-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
            >
                Daftar
            </button>
        </div>
    </form>

    <!-- Script untuk Toggle Password -->
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
