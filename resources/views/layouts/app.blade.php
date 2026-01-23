<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BOHO Furniture | Premium Bohemian Home Decor')</title>

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="@yield('meta_description', 'Discover unique, handcrafted boho furniture and home decor. Sustainable materials, modern bohemian style, and premium quality for your soulful sanctuary.')">
    <meta name="keywords"
        content="boho furniture, bohemian decor, handcrafted furniture, sustainable home decor, modern boho, Egyptian furniture, handmade home accessories">
    <meta name="author" content="BOHO Furniture">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'BOHO Furniture | Premium Bohemian Home Decor')">
    <meta property="og:description"
        content="@yield('meta_description', 'Discover unique, handcrafted boho furniture and home decor. Sustainable materials, modern bohemian style, and premium quality.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'BOHO Furniture | Premium Bohemian Home Decor')">
    <meta property="twitter:description"
        content="@yield('meta_description', 'Discover unique, handcrafted boho furniture and home decor.')">
    <meta property="twitter:image" content="@yield('og_image', asset('images/og-image.jpg'))">

    @yield('meta')

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('boho-logo.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('boho-logo.png') }}" type="image/png">

    <!-- Google Fonts - Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @if(app()->getLocale() === 'ar')
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">
        <style>
            body {
                font-family: 'Cairo', sans-serif !important;
            }
        </style>
    @endif

    <!-- Link Fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>


<body class="font-sans antialiased" x-data="{ mobileMenuOpen: false, cartOpen: false }"
    style="background-color: #fefae0;">
    <!-- Navigation -->
    <nav class="sticky top-0 w-full z-40 shadow-lg py-2 rounded-b-[30px]" style="background-color: #7b8f5a;">
        <div class="mx-auto px-6 sm:px-6 lg:px-12 font-bold" style="font-size: 18px;">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <!-- Home Icon -->
                    <!-- <div style="background-color: rgba(255,255,255,0.15); padding: 5px; border-radius: 10px;">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fff" strokeWidth="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9,22 9,12 15,12 15,22" />
                        </svg>
                    </div> -->
                    <a href="{{ route('home') }}"
                        class="text-white font-bold text-2xl hover:text-yellow-200 transition duration-300"
                        style="font-family: 'Poppins', sans-serif; font-weight: bolder;">
                        {{ __('messages.boho_furniture') }}
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center gap-2">
                    <a href="{{ route('home') }}"
                        class="text-white px-3 py-2 rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-300 flex items-center gap-2">
                        <i class="fas fa-home" style="font-size: 16px;"></i>
                        <span>{{ __('messages.home') }}</span>
                    </a>

                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button @click="open = !open"
                            class="text-white px-3 py-2 rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-300 flex items-center gap-2">
                            <i class="fas fa-box" style="font-size: 16px;"></i>
                            <span>{{ __('messages.products') }}</span>
                            <i class="fas fa-chevron-down text-xs ms-1"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 z-50">
                            <a href="{{ route('products') }}"
                                class="block px-2 py-2 text-gray-800 hover:bg-gray-100 transition duration-200">
                                <i class="fas fa-th-large me-2 text-gray-600"></i>{{ __('messages.all_products') }}
                            </a>
                            <a href="{{ route('home') }}#new-arrivals"
                                class="block px-2 py-2 text-gray-800 hover:bg-gray-100 transition duration-200">
                                <i class="fas fa-star me-2 text-yellow-500"></i>{{ __('messages.new_arrivals') }}
                            </a>
                            <a href="{{ route('home') }}#best-sellings"
                                class="block px-2 py-2 text-gray-800 hover:bg-gray-100 transition duration-200">
                                <i class="fas fa-fire me-2 text-orange-500"></i>{{ __('messages.best_sellers') }}
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('home') }}#about"
                        class="text-white px-3 py-2 rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-300 flex items-center gap-2">
                        <i class="fas fa-info-circle" style="font-size: 16px;"></i>
                        <span>{{ __('messages.about') }}</span>
                    </a>

                    <a href="{{ route('wishlist') }}"
                        class="text-white px-3 py-2 rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-300 flex items-center gap-2 relative">
                        <i class="fas fa-heart" style="font-size: 16px;"></i>
                        <span>{{ __('messages.wishlist') }}</span>
                        @auth
                            @php
                                $wishlistCount = \App\Models\Wishlist::where('user_id', Auth::id())->count();
                            @endphp
                            @if($wishlistCount > 0)
                                <span
                                    class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full min-w-[20px] h-5 flex items-center justify-center font-bold px-1.5 shadow-lg">
                                    {{ $wishlistCount }}
                                </span>
                            @endif
                        @endauth
                    </a>
                    <!-- Cart Icon -->

                    <!-- <a href="#"
                        class="text-white px-3 py-2 rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-300 flex items-center space-x-2">
                        <i class="fas fa-shopping-cart" style="font-size: 16px;"></i>
                        <span>Cart</span>
                    </a> -->

                    @guest
                        <a href="{{ route('login') }}"
                            class="text-black bg-white px-3 py-2 rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-300 flex items-center gap-2">
                            <i class="fas fa-user" style="font-size: 16px;"></i>
                            <span>{{ __('messages.login') }}</span>
                        </a>
                    @endguest

                    @auth
                        <a href="{{ route('profile') }}"
                            class="text-black bg-white px-3 py-2 rounded-lg hover:bg-white hover:bg-opacity-20 transition duration-300 flex items-center gap-2">
                            <i class="fas fa-user" style="font-size: 16px;"></i>
                            <span>{{ __('messages.profile') }}</span>
                        </a>
                    @endauth

                    <!-- Language Switcher -->
                    <div class="flex items-center gap-2">
                        @if(app()->getLocale() === 'ar')
                            <a href="{{ route('lang.switch', 'en') }}"
                                class="flex items-center gap-2 px-3 py-2 text-white hover:bg-white hover:bg-opacity-20 rounded-lg transition duration-200 font-bold">
                                <i class="fas fa-language"></i>
                                <span>{{ __('messages.english') }}</span>
                            </a>
                        @else
                            <a href="{{ route('lang.switch', 'ar') }}"
                                class="flex items-center gap-2 px-3 py-2 text-white hover:bg-white hover:bg-opacity-20 rounded-lg transition duration-200 font-bold">
                                <i class="fas fa-language"></i>
                                <span>{{ __('messages.arabic') }}</span>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="text-white hover:text-gray-200 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" x-transition class="md:hidden bg-[#7a8665]">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-3 py-2 text-white hover:bg-[#6b7558] rounded-md transition duration-200">
                    <i class="fas fa-home me-2"></i>{{ __('messages.home') }}
                </a>
                <a href="{{ route('products') }}"
                    class="block px-3 py-2 text-white hover:bg-[#6b7558] rounded-md transition duration-200">
                    <i class="fas fa-box me-2"></i>{{ __('messages.products') }}
                </a>
                <!-- <a href="{{ route('home') }}#categories"
                    class="block px-3 py-2 text-white hover:bg-[#6b7558] rounded-md transition duration-200">
                    <i class="fas fa-th me-2"></i>{{ __('messages.categories') }}
                </a> -->
                <a href="{{ route('home') }}#about"
                    class="block px-3 py-2 text-white hover:bg-[#6b7558] rounded-md transition duration-200">
                    <i class="fas fa-info-circle me-2"></i>{{ __('messages.about') }}
                </a>
                <!-- <a href="{{ route('home') }}#contact"
                    class="block px-3 py-2 text-white hover:bg-[#6b7558] rounded-md transition duration-200">
                    <i class="fas fa-envelope mr-2"></i>Contact
                </a> -->
                <a href="{{ route('wishlist') }}"
                    class="block px-3 py-2 text-white hover:bg-[#6b7558] rounded-md transition duration-200 relative flex items-center">
                    <i class="fas fa-heart me-2"></i>
                    <span>{{ __('messages.wishlist') }}</span>
                    @auth
                        @php
                            $wishlistCount = \App\Models\Wishlist::where('user_id', Auth::id())->count();
                        @endphp
                        @if ($wishlistCount > 0)
                            <span
                                class="absolute -top-1 right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold">
                                {{ $wishlistCount }}
                            </span>
                        @endif
                    @endauth
                </a>
                @auth
                    <a href="{{ route('profile') }}"
                        class="block px-3 py-2 text-white hover:bg-[#6b7558] rounded-md transition duration-200">
                        <i class="fas fa-user me-2"></i>{{ __('messages.profile') }}
                    </a>
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                        class="block px-3 py-2 bg-white text-black hover:bg-[#6b7558] rounded-md transition duration-200">
                        <i class="fas fa-user mr-2"></i>{{ __('messages.login') }}
                    </a>
                @endguest
                <!-- Language Switcher -->
                <div class="flex items-center gap-4 px-3 py-2">
                    @if (app()->getLocale() === 'ar')
                        <a href="{{ route('lang.switch', 'en') }}"
                            class="flex items-center text-white gap-2 font-bold {{ app()->getLocale() === 'en' ? 'underline' : '' }}">
                            <i class="fas fa-language"></i>
                            <span>{{ __('messages.english') }}</span>
                        </a>
                    @else
                        <a href="{{ route('lang.switch', 'ar') }}"
                            class="flex items-center text-white gap-2 font-bold {{ app()->getLocale() === 'ar' ? 'underline' : '' }}">
                            <i class="fas fa-language"></i>
                            <span>{{ __('messages.arabic') }}</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Content Wrapper to prevent horizontal overflow -->
    <div class="overflow-x-hidden w-full">
        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Scroll to Top Button -->
    <button x-data="{ showScroll: false }" @scroll.window="showScroll = (window.pageYOffset > 300)" x-show="showScroll"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-8 end-8 bg-[#7b8f5a] text-white w-14 h-14 rounded-full shadow-2xl hover:bg-[#7a8665] transition duration-300 flex items-center justify-center z-50 group"
        style="display: none;">
        <i class="fas fa-arrow-up text-xl group-hover:animate-bounce"></i>
    </button>

    <!-- Whatapp Button -->
    <div class="fixed bottom-24 end-8 z-50 group flex flex-col items-end">
        <!-- Permanent Message Badge -->
        <div
            class="mb-3 bg-white px-3 py-1.5 rounded-2xl shadow-xl flex items-center gap-2 border border-gray-50 transform group-hover:-translate-y-1 transition duration-300 relative">
            <span class="relative flex h-2 w-2 {{ app()->getLocale() === 'ar' ? 'ms-1' : '' }}">
                <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
            </span>
            <span
                class="text-[11px] font-bold text-gray-700 tracking-wide whitespace-nowrap">{{ __('messages.contact') }}</span>
            <!-- Triangle indicator -->
            <div class="absolute -bottom-1.5 end-7 w-3 h-3 bg-white rotate-45 border-r border-b border-gray-50">
            </div>
        </div>

        <a href="https://wa.me/201080434434" target="_blank"
            class="bg-[#25D366] text-white w-14 h-14 rounded-full shadow-2xl hover:bg-[#128C7E] transition duration-300 flex items-center justify-center transform hover:scale-110">
            <i class="fab fa-whatsapp text-2xl"></i>
        </a>
    </div>


    <!-- Footer -->
    <footer class="bg-[#7b8f5a] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- BOHO Brand Section -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <!-- Circular Logo -->
                        <h3 class="text-2xl font-bold">{{ __('messages.boho') }}</h3>
                    </div>
                    <p class="text-sm mb-4">{{ __('messages.follow_us') }}</p>
                    <div class="flex gap-4">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/share/1C6q8ENRi6/?mibextid=wwXIfr" target="_blank"
                            class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:scale-110 transition duration-300">
                            <i class="fab fa-facebook-f text-black"></i>
                        </a>
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/boho_home_furniture?igsh=Y3preDk0a282NnB1" target="_blank"
                            class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:scale-110 transition duration-300">
                            <i class="fab fa-instagram text-black"></i>
                        </a>
                        <!-- Tiktok -->
                        <a href="https://www.tiktok.com/@boho.furniture7?_r=1&_t=ZS-9392qivJwVp" target="_blank"
                            class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:scale-110 transition duration-300">
                            <i class="fab fa-tiktok text-black"></i>
                        </a>
                        <!-- Whatsapp -->
                        <a href="https://wa.me/201080434434" target="_blank"
                            class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:scale-110 transition duration-300">
                            <i class="fab fa-whatsapp text-black"></i>
                        </a>
                    </div>
                </div>

                <!-- Terms & Policies -->
                <div>
                    <h4 class="text-lg font-bold mb-4">{{ __('messages.terms_policies') }}</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('terms-of-service') }}"
                                class="hover:text-gray-200 transition duration-200">{{ __('messages.terms_of_service') }}</a>
                        </li>
                        <li><a href="{{ route('privacy-policy') }}"
                                class="hover:text-gray-200 transition duration-200">{{ __('messages.privacy_policy') }}</a>
                        </li>
                        <li><a href="{{ route('refund-policy') }}"
                                class="hover:text-gray-200 transition duration-200">{{ __('messages.refund_policy') }}</a>
                        </li>
                        <li><a href="{{ route('shipping-policy') }}"
                                class="hover:text-gray-200 transition duration-200">{{ __('messages.shipping_policy') }}</a>
                        </li>
                    </ul>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold mb-4">{{ __('messages.quick_links') }}</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}"
                                class="hover:text-gray-200 transition duration-200">{{ __('messages.home') }}</a>
                        </li>
                        <li><a href="{{ route('products') }}"
                                class="hover:text-gray-200 transition duration-200">{{ __('messages.shop') }}</a></li>
                        <li><a href="{{ route('home') }}#categories"
                                class="hover:text-gray-200 transition duration-200">{{ __('messages.categories') }}</a>
                        </li>
                        <!-- <li><a href="{{ route('lang.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}"
                                class="hover:text-gray-200 transition duration-200">{{ __('messages.contact') }}</a>
                        </li> -->
                    </ul>
                </div>

                <!-- Contact Information -->
                <div>
                    <h4 class="text-lg font-bold mb-4">{{ __('messages.contact_info') }}</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-center gap-2">
                            <i class="fas fa-phone"></i>
                            <span>+20 10 80343434</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-map-marker-alt mt-1"></i>
                            <span>{{ __('messages.address') }}</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Copyright Bar -->
        <div class="border-t border-white border-opacity-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <p class="text-center text-sm">© {{ date('Y') }} <strong>BOHO</strong>
                    {{ __('messages.all_rights_reserved') }}</p>
            </div>
        </div>
    </footer>



    <!-- Link Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
            easing: 'ease-in-out'
        });
    </script>
</body>


</html>