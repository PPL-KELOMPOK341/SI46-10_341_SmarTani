<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <!-- General Login Error -->
    @if (session('login_error'))
        <div class="mb-4 text-sm text-red-600">
            {{ session('login_error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
            <input 
                id="email" 
                dusk="email"
                class="block mt-1 w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autofocus 
                autocomplete="username">
            @error('email')
                <div class="mt-2 text-sm text-red-600" dusk="email-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
            <input 
                id="password" 
                dusk="password"
                class="block mt-1 w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password">
            @error('password')
                <div class="mt-2 text-sm text-red-600" dusk="password-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input 
                    id="remember_me" 
                    dusk="remember-me"
                    type="checkbox" 
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" 
                    name="remember">
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a 
                    dusk="forgot-password-link"
                    class="underline text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                    href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
            @endif

            <button 
                type="submit" 
                dusk="submit-login"
                class="ml-3 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white text-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Log in
            </button>
        </div>
    </form>
</x-guest-layout>
