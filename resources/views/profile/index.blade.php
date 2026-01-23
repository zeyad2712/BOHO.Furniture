@extends('layouts.app')

@section('content')
    <!-- Profile Page -->
    <div class="min-h-screen py-12" style="background-color: #fefae0;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Page Header -->
            <div class="mb-8" data-aos="fade-down">
                <h1 class="text-4xl font-bold" style="color: #8B4513;">My Profile</h1>
                <p class="text-gray-600 mt-2">Manage your account settings and preferences</p>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-8 bg-green-50 border-l-4 border-[#22C55E] p-4 rounded-r-lg shadow-sm flex items-center">
                    <i class="fas fa-check-circle text-[#22C55E] mr-3 text-xl"></i>
                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                </div>
            @endif
            

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Sidebar -->
                <div class="lg:col-span-1" data-aos="fade-right">
                    <div class="bg-white rounded-2xl shadow-lg p-6" style="position: sticky; top: 10%;">
                        <!-- Profile Picture -->
                        <div class="text-center mb-6">
                            <div
                                class="w-32 h-32 bg-gradient-to-br from-[#22C55E] to-[#16A34A] rounded-full mx-auto flex items-center justify-center text-white text-5xl font-bold shadow-lg">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mt-4">{{ Auth::user()->name }}</h2>
                            <p class="text-gray-600 text-sm">{{ Auth::user()->email }}</p>
                            <!-- <button class="mt-4 text-sm text-[#22C55E] hover:text-[#16A34A] font-semibold">
                                <i class="fas fa-camera mr-2"></i>Change Photo
                            </button> -->
                        </div>

                        <!-- Navigation Menu -->
                        <nav class="space-y-2">
                            <a href="#account"
                                class="flex items-center px-4 py-3 bg-[#22C55E] bg-opacity-10 text-[#22C55E] rounded-lg font-semibold">
                                <i class="fas fa-user mr-3"></i>Account Info
                            </a>
                            <a href="#orders"
                                class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition duration-200">
                                <i class="fas fa-shopping-bag mr-3"></i>My Orders
                            </a>
                            <a href="#wishlist"
                                class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition duration-200">
                                <i class="fas fa-heart mr-3"></i>Wishlist
                            </a>
                            <a href="#addresses"
                                class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition duration-200">
                                <i class="fas fa-map-marker-alt mr-3"></i>Addresses
                            </a>
                            <a href="#security"
                                class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition duration-200">
                                <i class="fas fa-lock mr-3"></i>Security
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg transition duration-200">
                                    <i class="fas fa-sign-out-alt mr-3"></i>Logout
                                </button>
                            </form>
                        </nav>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6" data-aos="fade-left">

                    <!-- Account Information -->
                    <div id="account" class="bg-white rounded-2xl shadow-lg p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold" style="color: #8B4513;">Account Information</h3>
                            <a href="{{ route('profile.edit') }}" class="text-[#22C55E] hover:text-[#16A34A] font-semibold">
                                <i class="fas fa-edit mr-2"></i>Edit
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                                <div class="bg-gray-50 px-4 py-3 rounded-lg text-gray-900">
                                    {{ Auth::user()->name }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                                <div class="bg-gray-50 px-4 py-3 rounded-lg text-gray-900">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                                <div class="bg-gray-50 px-4 py-3 rounded-lg text-gray-900">
                                    {{ Auth::user()->phone }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Member Since</label>
                                <div class="bg-gray-50 px-4 py-3 rounded-lg text-gray-900">
                                    {{ Auth::user()->created_at->format('F Y') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <div id="wishlist" class="bg-white rounded-2xl shadow-lg p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold" style="color: #8B4513;">My Wishlist</h3>
                            <span class="text-gray-600">{{ $wishlists->count() }} {{ $wishlists->count() === 1 ? 'item' : 'items' }}</span>
                        </div>

                        @if($wishlists->count() > 0)
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach($wishlists as $wishlist)
                                    <!-- Wishlist Item -->
                                    <div class="border rounded-lg p-4 hover:shadow-md transition duration-200">
                                        <div class="relative">
                                            <img src="{{ asset($wishlist->product->image) }}" alt="{{ $wishlist->product->name }}"
                                                class="w-full h-40 object-cover rounded-lg mb-3">
                                            <button
                                                onclick="removeFromWishlist({{ $wishlist->product->id }})"
                                                class="absolute top-2 right-2 w-8 h-8 bg-white rounded-full flex items-center justify-center text-red-500 hover:bg-red-50">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <h4 class="font-semibold text-gray-900 mb-1">{{ $wishlist->product->name }}</h4>
                                        <p class="text-[#22C55E] font-bold mb-3">{{ number_format($wishlist->product->price, 2) }} EGP</p>
                                        <a href="{{ route('products.show', $wishlist->product->id) }}"
                                            class="w-full bg-[#22C55E] text-white py-2 rounded-lg font-semibold hover:bg-[#16A34A] transition duration-300 block text-center">
                                            <i class="fas fa-eye"></i>
                                            View Details
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <!-- View All Link -->
                            <div class="mt-4 text-center">
                                <a href="{{ route('wishlist') }}" class="text-[#22C55E] hover:text-[#16A34A] font-semibold">
                                    View All Wishlist Items <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        @else
                            <!-- Empty State -->
                            <div class="text-center py-8">
                                <i class="fas fa-heart text-gray-300 text-5xl mb-3"></i>
                                <p class="text-gray-600 mb-4">Your wishlist is empty</p>
                                <a href="{{ route('products') }}" class="inline-block bg-[#22C55E] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#16A34A] transition duration-300">
                                    Start Shopping
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Security Settings -->
                    <div id="security" class="bg-white rounded-2xl shadow-lg p-6">
                        <h3 class="text-2xl font-bold mb-6" style="color: #8B4513;">Security Settings</h3>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-semibold text-gray-900">Password</p>
                                    <p class="text-sm text-gray-600">Last changed 3 months ago</p>
                                </div>
                                <button class="text-[#22C55E] hover:text-[#16A34A] font-semibold">
                                    Change
                                </button>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-semibold text-gray-900">Two-Factor Authentication</p>
                                    <p class="text-sm text-gray-600">Add an extra layer of security</p>
                                </div>
                                <button class="text-[#22C55E] hover:text-[#16A34A] font-semibold">
                                    Enable
                                </button>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-semibold text-gray-900">Email Notifications</p>
                                    <p class="text-sm text-gray-600">Receive updates about your orders</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#22C55E] peer-focus:ring-opacity-30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#22C55E]">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection