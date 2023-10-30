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
        <style>
        .menu-links {
            display: flex;
            margin-left:-800px;
            align-items: left;
        }

        .menu-links a {
            margin-left: 20px;
            text-decoration: none;
            color: #fff;
        }
    </style>

        @livewireStyles
    </head>
    <body class="bg-gray-100">
        <header class="bg-blue-500 p-4 flex justify-between items-center">
            <div class="text-white">
                <a href="{{ url('/') }}" wire:navigate><h1 class="text-3xl font-bold">Cebu Lechon House</h1></a>
            </div>
            @auth
            <div class="menu-links">
            <a href="{{ url('/dashboard') }}" wire:navigate class="text-white">Homepage</a>
            <a href="{{ url('/my-orders') }}" wire:navigate class="text-white">My Orders</a>
            @endauth
        </div>
        
        @if (Route::has('login'))
            <div class="flex items-center space-x-4 text-white">
                @auth
                    <h1>Welcome Macky!</h1>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
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
