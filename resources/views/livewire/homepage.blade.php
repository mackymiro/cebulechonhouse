<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cebu Lechon House</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-blue-500 p-4 flex justify-between items-center">
        <div class="text-white">
            <h1 class="text-3xl font-bold">Cebu Lechon House</h1>
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

    <section class="container mx-auto mt-8 text-center">
        <h2 class="text-4xl font-bold mb-4">Welcome to Cebu Lechon House</h2>
        <p class="text-lg mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <img src="banner-image.jpg" alt="Banner Image" class="mx-auto rounded-lg">
    </section>

    <section class="container mx-auto mt-8 flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded shadow text-center">
                <h2 class="text-2xl font-bold mb-4">Cebu Lechon House</h2>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mt-4 rounded">
                <i class="fas fa-shopping-cart mr-2"></i>Order Now</button>
            </div>

            <div class="bg-white p-6 rounded shadow text-center">
                <h2 class="text-2xl font-bold mb-4">New Chinese Kitchen</h2>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mt-4 rounded">
                <i class="fas fa-shopping-cart mr-2"></i>Order Now</button>
            </div>
        </div>
    </section>



   
</body>
</html>
