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
                <a href="{{ url('admin/dashboard') }}" wire:navigate class="text-white text-2xl font-semibold uppercase">Admin Dashboard</a>
            </div>

            <!-- Navigation Links -->
           <!-- Navigation Links -->
            <ul class="text-white">
                <li class="mb-4">
                    <a href="{{ url('admin/dashboard') }}" wire:navigate class="flex items-center py-2 px-4">
                        <span class="mr-2"><i class="fas fa-tachometer-alt"></i></span> Dashboard
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ url('admin/menu') }}" wire:navigate class="flex items-center py-2 px-4">
                        <span class="mr-2"><i class="fas fa-menu"></i></span> Menu
                    </a>
                    <!-- Submenu -->
                    <ul class="pl-4">
                        <li class="mb-2">
                            <a href="{{ url('admin/menu/meals') }}" wire:navigate class="flex items-center py-2 px-2">
                                <span class="mr-2"><i class="fas fa-hamburger"></i></span> Meals
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ url('admin/menu/ala-carte') }}" wire:navigate class="flex items-center py-2 px-2">
                                <span class="mr-2"><i class="fas fa-hamburger"></i></span> Ala Carte
                            </a>
                        </li>
                        <!-- Add more submenu items as needed -->
                        <li class="mb-2">
                            <a href="{{ url('admin/menu/group-meals') }}" wire:navigate class="flex items-center py-2 px-2">
                                <span class="mr-2"><i class="fas fa-hamburger"></i></span> Group Meals
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ url('admin/menu/desserts') }}" wire:navigate class="flex items-center py-2 px-2">
                                <span class="mr-2"><i class="fas fa-hamburger"></i></span> Desserts
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ url('admin/menu/beverages') }}" wire:navigate class="flex items-center py-2 px-2">
                                <span class="mr-2"><i class="fas fa-hamburger"></i></span> Beverages
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <a href="{{ url('admin/user-settings') }}" wire:navigate class="flex items-center py-2 px-4">
                        <span class="mr-2"><i class="fas fa-cogs"></i></span> User Settings
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ url('admin/customers') }}" wire:navigate class="flex items-center py-2 px-4">
                        <span class="mr-2"><i class="fas fa-users"></i></span> Customers
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
                    <?php
                        $currenturl = url()->current();
                        $curExp = explode("/", $currenturl);
                    ?>
                    @if($curExp[4] == "Dashboard")
                    <h1 class="ml-3 text-2xl font-semibold">Dashboard</h1>
                    @elseif($curExp[4] == "add-categories")
                    <h1 class="ml-3 text-2xl font-semibold">Add Categories</h1>
                    @elseif($curExp[4] == "add-meals")
                    <h1 class="ml-3 text-2xl font-semibold">Add Meals</h1>
                    @elseif($curExp[4] == "menu")
                    <h1 class="ml-3 text-2xl font-semibold">Menu</h1>
                    @elseif($curExp[4] == "user-settings")
                    <h1 class="ml-3 text-2xl font-semibold">User Settings</h1>
                    @elseif($curExp[4] == "customers")
                    <h1 class="ml-3 text-2xl font-semibold">Customers</h1>
                    @else
                    <h1 class="ml-3 text-2xl font-semibold">Dashboard</h1>

                    @endif
                </div>
                <div class="flex items-center">
                    <span class="mr-2">Welcome, Admin</span>
                    <button class="text-blue-500 focus:outline-none">
                        <a href="{{ url('/admin/logout') }}"><i class="fas fa-sign-out-alt"></i></a>
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
