@extends('admin.layouts.app')

@section('page-title', 'Dashboard')

@section('content')
    <div class="min-h-screen py-8" style="background-color: #fefae0;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Welcome Section -->
            <div class="mb-8" data-aos="fade-down">
                <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ Auth::user()->name }}! 👋</h1>
                <p class="text-gray-600 mt-2">Here's what's happening with your store today.</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Total Products -->
                <div data-aos="fade-up" data-aos-delay="100"
                    class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Total Products</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Product::count() }}</p>
                            <p class="text-sm text-green-600 mt-2">
                                <i class="fas fa-arrow-up mr-1"></i>12% from last month
                            </p>
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-box text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Active Products -->
                <div data-aos="fade-up" data-aos-delay="200"
                    class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Active Products</p>
                            <p class="text-3xl font-bold text-green-600 mt-2">
                                {{ \App\Models\Product::where('status', 'active')->count() }}
                            </p>
                            <p class="text-sm text-gray-500 mt-2">
                                In stock & available
                            </p>
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-[#7b8f5a] to-[#6c7d4e] rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-check-circle text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Users -->
                <div data-aos="fade-up" data-aos-delay="300"
                    class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold">Total Users</p>
                            <p class="text-3xl font-bold text-purple-600 mt-2">{{ \App\Models\User::count() }}</p>
                            <p class="text-sm text-purple-600 mt-2">
                                <i class="fas fa-arrow-up mr-1"></i>8% from last month
                            </p>
                        </div>
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 mb-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div data-aos="fade-up" data-aos-delay="400"
                    class="bg-white p-8 rounded-3xl border border-gray-100 shadow-lg shadow-gray-200/50 flex items-center space-x-6">
                    <div
                        class="w-16 h-16 rounded-2xl bg-[#7b8f5a]/10 text-[#7b8f5a] flex items-center justify-center text-3xl">
                        <i class="fas fa-th-large"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 font-bold uppercase tracking-wider text-xs">Total Categories</p>
                        <h3 class="text-3xl font-black text-gray-800">{{ \App\Models\Category::count() }}</h3>
                    </div>
                </div>

                @php
                    $activeCount = \App\Models\Category::where('is_active', true)->count();
                @endphp
                <div data-aos="fade-up" data-aos-delay="500"
                    class="bg-white p-8 rounded-3xl border border-gray-100 shadow-lg shadow-gray-200/50 flex items-center space-x-6">
                    <div class="w-16 h-16 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-3xl">
                        <i class="fas fa-check-double"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 font-bold uppercase tracking-wider text-xs">Active Layouts</p>
                        <h3 class="text-3xl font-black text-gray-800">{{ $activeCount }}</h3>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="600"
                    class="bg-white p-8 rounded-3xl border border-gray-100 shadow-lg shadow-gray-200/50 flex items-center space-x-6">
                    <div
                        class="w-16 h-16 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center text-3xl">
                        <i class="fas fa-box"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 font-bold uppercase tracking-wider text-xs">Categorized Items</p>
                        <h3 class="text-3xl font-black text-gray-800">{{ \App\Models\Product::count() }}</h3>
                    </div>
                </div>

            </div>

            <!-- Charts Row -->
            <div data-aos="fade-up" data-aos-delay="700" class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Product Status Distribution -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Product Status</h3>
                    <div class="space-y-4">
                        @php
                            $totalProducts = \App\Models\Product::count();
                            $activeCount = \App\Models\Product::where('status', 'active')->count();
                            $newCount = \App\Models\Product::where('status', 'new')->count();
                            $saleCount = \App\Models\Product::where('status', 'sale')->count();
                        @endphp

                        <!-- Active -->
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-semibold text-gray-700">Active</span>
                                <span class="text-sm font-bold text-[#7b8f5a]">{{ $activeCount }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-[#7b8f5a] h-3 rounded-full"
                                    style="width: {{ $totalProducts > 0 ? ($activeCount / $totalProducts) * 100 : 0 }}%">
                                </div>
                            </div>
                        </div>

                        <!-- New -->
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-semibold text-gray-700">New Arrivals</span>
                                <span class="text-sm font-bold text-yellow-600">{{ $newCount }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-yellow-500 h-3 rounded-full"
                                    style="width: {{ $totalProducts > 0 ? ($newCount / $totalProducts) * 100 : 0 }}%"></div>
                            </div>
                        </div>

                        <!-- Sale -->
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-semibold text-gray-700">On Sale</span>
                                <span class="text-sm font-bold text-red-600">{{ $saleCount }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-red-500 h-3 rounded-full"
                                    style="width: {{ $totalProducts > 0 ? ($saleCount / $totalProducts) * 100 : 0 }}%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Categories -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Top Categories</h3>
                    <div class="space-y-4">
                        @foreach(\App\Models\Category::withCount('products')->orderBy('products_count', 'desc')->take(5)->get() as $category)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 bg-[#7b8f5a] bg-opacity-20 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-tag text-[#7b8f5a]"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $category->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $category->products_count }} products</p>
                                    </div>
                                </div>
                                <span
                                    class="px-3 py-1 bg-[#7b8f5a] bg-opacity-10 text-[#7b8f5a] rounded-full text-sm font-semibold">
                                    {{ $category->products_count }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Recent Products & Quick Actions -->
            <div data-aos="fade-up" data-aos-delay="800" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Products -->
                <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-900">Recent Products</h3>
                        <a href="{{ route('admin.products.index') }}"
                            class="text-[#7b8f5a] hover:text-[#6c7d4e] font-semibold text-sm">
                            View All <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div class="space-y-4">
                        @foreach(\App\Models\Product::latest()->take(5)->get() as $product)
                            <div class="flex items-center space-x-4 p-3 hover:bg-gray-50 rounded-lg transition duration-200">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                    class="w-16 h-16 object-cover rounded-lg">
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900">{{ $product->name }}</h4>
                                    <p class="text-sm text-gray-500">{{ $product->category->name ?? 'N/A' }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-[#7b8f5a]">EGP {{ number_format($product->price, 2) }}</p>
                                    <span
                                        class="text-xs px-2 py-1 rounded-full {{ $product->status === 'active' ? 'bg-green-100 text-green-800' : ($product->status === 'new' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($product->status) }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Quick Actions</h3>
                    <div class="space-y-3">
                        <!-- Add New Admin -->
                        <a href="{{ route('admin.users.create') }}"
                            class="flex items-center space-x-3 p-4 bg-[#7b8f5a] bg-opacity-10 hover:bg-opacity-20 rounded-lg transition duration-200">
                            <div class="w-10 h-10 bg-[#7b8f5a] rounded-lg flex items-center justify-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                            <span class="font-semibold text-gray-900">Add New Admin</span>
                        </a>

                        <!-- Add New Product -->
                        <a href="{{ route('admin.products.create') }}"
                            class="flex items-center space-x-3 p-4 bg-[#7b8f5a] bg-opacity-10 hover:bg-opacity-20 rounded-lg transition duration-200">
                            <div class="w-10 h-10 bg-[#7b8f5a] rounded-lg flex items-center justify-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                            <span class="font-semibold text-gray-900">Add New Product</span>
                        </a>
                        <!-- View All Products -->
                        <a href="{{ route('admin.products.index') }}"
                            class="flex items-center space-x-3 p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition duration-200">
                            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-list text-white"></i>
                            </div>
                            <span class="font-semibold text-gray-900">View All Products</span>
                        </a>

                        <!-- Add New Category -->
                        <a href="{{ route('admin.categories.create') }}"
                            class="flex items-center space-x-3 p-4 bg-[#7b8f5a] bg-opacity-10 hover:bg-opacity-20 rounded-lg transition duration-200">
                            <div class="w-10 h-10 bg-[#7b8f5a] rounded-lg flex items-center justify-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                            <span class="font-semibold text-gray-900">Add New Category</span>
                        </a>

                        <!-- View Website -->
                        <a href="{{ route('home') }}"
                            class="flex items-center space-x-3 p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition duration-200">
                            <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-globe text-white"></i>
                            </div>
                            <span class="font-semibold text-gray-900">View Website</span>
                        </a>
                        <!-- My Profile -->
                        <a href="{{ route('profile') }}"
                            class="flex items-center space-x-3 p-4 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition duration-200">
                            <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <span class="font-semibold text-gray-900">My Profile</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection