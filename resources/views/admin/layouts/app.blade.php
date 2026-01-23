<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - BOHO Furniture</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('boho-logo.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('boho-logo.png') }}" type="image/png">
</head>

<body class="font-sans antialiased" style="background-color: #f5f5f5;">

    <!-- Sidebar -->
    <aside
        class="fixed inset-y-0 left-0 w-64 bg-gradient-to-b from-[#7b8f5a] to-[#7b8f5a] shadow-2xl z-50 transform transition-transform duration-300 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

        <!-- Logo -->
        <div class="flex items-center justify-center h-20 border-b border-white border-opacity-20">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg">
                    <span class="text-[#7b8f5a] font-bold text-xl">B</span>
                </div>
                <div>
                    <h1 class="text-white font-bold text-xl">BOHO</h1>
                    <p class="text-white text-xs opacity-80">Admin Panel</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="mt-8 px-4">
            <div class="space-y-2">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center space-x-3 px-4 py-3 text-white rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-white bg-opacity-20' : '' }}">
                    <i class="fas fa-chart-line w-5"></i>
                    <span class="font-semibold">Dashboard</span>
                </a>

                <!-- Products -->
                <a href="{{ route('admin.products.index') }}"
                    class="flex items-center space-x-3 px-4 py-3 text-white rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 {{ request()->routeIs('admin.products.*') ? 'bg-white bg-opacity-20' : '' }}">
                    <i class="fas fa-box w-5"></i>
                    <span class="font-semibold">Products</span>
                </a>

                <!-- Categories -->
                <a href="{{ route('admin.categories.index') }}"
                    class="flex items-center space-x-3 px-4 py-3 text-white rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 {{ request()->routeIs('admin.categories.*') ? 'bg-white bg-opacity-20' : '' }}">
                    <i class="fas fa-tags w-5"></i>
                    <span class="font-semibold">Categories</span>
                </a>

                <!-- Orders -->
                <!-- <a href="#" 
                   class="flex items-center space-x-3 px-4 py-3 text-white rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 {{ request()->routeIs('admin.orders.*') ? 'bg-white bg-opacity-20' : '' }}">
                    <i class="fas fa-shopping-cart w-5"></i>
                    <span class="font-semibold">Orders</span>
                </a> -->

                <!-- Users -->
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center space-x-3 px-4 py-3 text-white rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 {{ request()->routeIs('admin.users.*') ? 'bg-white bg-opacity-20' : '' }}">
                    <i class="fas fa-users w-5"></i>
                    <span class="font-semibold">Users</span>
                </a>

                <!-- Landing Image -->
                <a href="{{ route('admin.landing-image.index') }}"
                    class="flex items-center space-x-3 px-4 py-3 text-white rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 {{ request()->routeIs('admin.landing-image.*') ? 'bg-white bg-opacity-20' : '' }}">
                    <i class="fas fa-image w-5"></i>
                    <span class="font-semibold">Landing Image</span>
                </a>

                <!-- Project Video -->
                <a href="{{ route('admin.project-video.index') }}"
                    class="flex items-center space-x-3 px-4 py-3 text-white rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 {{ request()->routeIs('admin.project-video.*') ? 'bg-white bg-opacity-20' : '' }}">
                    <i class="fas fa-video w-5"></i>
                    <span class="font-semibold">Project Video</span>
                </a>

                <!-- Reviews -->
                <a href="{{ route('admin.reviews.index') }}"
                    class="flex items-center space-x-3 px-4 py-3 text-white rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 {{ request()->routeIs('admin.reviews.*') ? 'bg-white bg-opacity-20' : '' }}">
                    <i class="fas fa-star w-5"></i>
                    <span class="font-semibold">Reviews</span>
                </a>

                <!-- Product Reviews -->
                <a href="{{ route('admin.product-reviews.index') }}"
                    class="flex items-center space-x-3 px-4 py-3 text-white rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200 {{ request()->routeIs('admin.product-reviews.*') ? 'bg-white bg-opacity-20' : '' }}">
                    <i class="fas fa-comment-dots w-5"></i>
                    <span class="font-semibold">Product Reviews</span>
                </a>
            </div>

            <!-- Divider -->
            <div class="my-6 border-t border-white border-opacity-20"></div>

            <!-- Back to Site -->
            <a href="{{ route('home') }}"
                class="flex items-center space-x-3 px-4 py-3 text-white rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-200">
                <i class="fas fa-globe w-5"></i>
                <span class="font-semibold">Back to Site</span>
            </a>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center space-x-3 px-4 py-3 text-white rounded-lg hover:bg-red-500 hover:bg-opacity-30 transition duration-200">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span class="font-semibold">Logout</span>
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="lg:pl-64">

        <!-- Top Navigation Bar -->
        <header class="bg-white shadow-sm sticky top-0 z-40">
            <div class="flex items-center justify-between px-6 py-4">

                <!-- Mobile Menu Button -->
                <button @click="sidebarOpen = !sidebarOpen"
                    class="lg:hidden text-gray-600 hover:text-gray-900 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>

                <!-- Page Title -->
                <div class="flex-1 lg:ml-0 ml-4">
                    <h2 class="text-2xl font-bold" style="color: #8B4513;">
                        @yield('page-title', 'Dashboard')
                    </h2>
                </div>

                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <!-- <button class="relative text-gray-600 hover:text-gray-900">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-white text-xs flex items-center justify-center">3</span>
                    </button> -->

                    <!-- User Profile -->
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-[#7b8f5a] rounded-full flex items-center justify-center">
                            <span class="text-white font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div class="hidden md:block">
                            <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="min-h-screen bg-[#fefae0]">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 py-6">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-600 text-sm">
                        &copy; {{ date('Y') }} BOHO Furniture. All rights reserved.
                    </p>
                    <div class="flex items-center space-x-4 mt-4 md:mt-0">
                        <a href="#" class="text-gray-600 hover:text-[#22C55E] text-sm">Documentation</a>
                        <a href="#" class="text-gray-600 hover:text-[#22C55E] text-sm">Support</a>
                        <a href="#" class="text-gray-600 hover:text-[#22C55E] text-sm">Privacy</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false"
        x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden" style="display: none;">
    </div>

    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 50,
            easing: 'ease-in-out'
        });
    </script>
</body>

</html>