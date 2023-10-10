<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Sidebar -->
    <div class="flex h-screen bg-gray-200">
        <!-- Sidebar -->
        <nav id="sidebar" class="w-64 bg-blue-900 py-6">
            <!-- Logo -->
            <div class="text-center mb-6">
                <a href="{{ url('admin/dashboard') }}" class="text-white text-2xl font-semibold uppercase">Admin Dashboard</a>
            </div>

            <!-- Navigation Links -->
            <ul class="text-white">
                <li class="mb-4">
                    <a href="#" class="flex items-center py-2 px-4">
                        <span class="mr-2"><i class="fas fa-tachometer-alt"></i></span> Dashboard
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" class="flex items-center py-2 px-4">
                        <span class="mr-2"><i class="fas fa-menu"></i></span>Menu
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" class="flex items-center py-2 px-4">
                        <span class="mr-2"><i class="fas fa-cogs"></i></span> Settings
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="flex justify-between items-center bg-white p-4 shadow-md">
                <div class="flex items-center">
                    <button id="sidebarCollapse" class="text-gray-500 focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="ml-3 text-2xl font-semibold">Dashboard</h1>
                </div>
                <div class="flex items-center">
                    <span class="mr-2">Welcome, Admin</span>
                    <button class="text-blue-500 focus:outline-none">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    </script>
</body>
</html>
