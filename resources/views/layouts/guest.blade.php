<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased w-full min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/back.png') }}');">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-center mb-4">
                <div class="w-1/2 text-center">
                    <a href="{{ url('/') }}">
                        @if(get_setting('site_logo'))
                            <img src="{{ asset(get_setting('site_logo')) }}" alt="{{ get_setting('site_title', 'SmartTani') }}" class="h-20 mx-auto">
                        @endif
                    </a>
                    <h1 class="text-xl font-bold text-green-700 mt-2">
                        {{ get_setting('site_title', 'SmartTani') }}
                    </h1>
                    <p class="text-sm text-gray-600">
                        {{ get_setting('site_description', 'Solusi Digital Pertanian Indonesia') }}
                    </p>
                </div>
            </div>

            {{ $slot }}
        </div>
    </div>
</body>
</html>
