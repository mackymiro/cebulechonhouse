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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="bg-gray-100">
        <header class="bg-blue-500 p-4 flex justify-between items-center">
            <div class="text-white">
                <a href="{{ url('/') }}" wire:navigate><h1 class="text-3xl font-bold">Cebu Lechon House</h1></a>
            </div>
            @if (Route::has('login'))
            <div class="flex items-center space-x-4 text-white">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-white; :outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-white;">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-white;">Register</a>
                @endif
            @endauth
            </div>
            @endif
        </header>

        @yield('content')

        @stack('modals')

@livewireScripts
</body>
</html>
