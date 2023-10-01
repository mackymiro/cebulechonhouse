<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage Template</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-blue-500 p-4 flex justify-between items-center">
        <div class="text-white">
            <h1 class="text-3xl font-bold">Cebu Lechon House</h1>
        </div>
        @if (Route::has('login'))
        <div class="flex items-center space-x-4">
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

    <section class="container mx-auto mt-8 text-center">
        <h2 class="text-4xl font-bold mb-4">Welcome to Your Website</h2>
        <p class="text-lg mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <img src="banner-image.jpg" alt="Banner Image" class="mx-auto rounded-lg">
    </section>

    <section class="container mx-auto mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-2xl font-bold mb-4">Feature 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-2xl font-bold mb-4">Feature 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-2xl font-bold mb-4">Feature 3</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
    </section>

   
</body>
</html>
