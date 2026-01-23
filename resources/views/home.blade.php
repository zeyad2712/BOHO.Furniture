@extends('layouts.app')

@section('title', __('messages.boho_furniture') . ' | ' . __('messages.live_easy') . ' ' . __('messages.live_boho'))
@section('meta_description', __('messages.about_description'))

@section('content')

    <!-- Hero Section with Decorative Background -->
    <section class="relative flex items-center overflow-hidden" style="min-height: 90vh;" id="hero-section">
        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <!-- Large Gradient Circles -->
            <div
                class="absolute -top-20 -left-20 w-96 h-96 bg-gradient-to-br from-[#22C55E] to-[#16A34A] rounded-full opacity-10 blur-3xl animate-pulse">
            </div>
            <div class="absolute top-1/4 -right-32 w-80 h-80 bg-gradient-to-bl from-[#8B4513] to-[#A0522D] rounded-full opacity-10 blur-3xl"
                style="animation: float 8s ease-in-out infinite;"></div>
            <div class="absolute bottom-10 left-1/4 w-64 h-64 bg-gradient-to-tr from-[#D4E4D0] to-[#E8F5E9] rounded-full opacity-20 blur-2xl"
                style="animation: float 6s ease-in-out infinite 1s;"></div>

            <!-- Floating Leaf Patterns -->
            <div class="absolute top-20 right-1/4 text-[#22C55E] opacity-5 transform rotate-45"
                style="animation: floatRotate 10s ease-in-out infinite;">
                <i class="fas fa-leaf text-9xl"></i>
            </div>
            <div class="absolute bottom-32 left-1/3 text-[#8B4513] opacity-5 transform -rotate-12"
                style="animation: floatRotate 12s ease-in-out infinite 2s;">
                <i class="fas fa-spa text-8xl"></i>
            </div>
            <div class="absolute top-1/3 left-10 text-[#22C55E] opacity-5 transform rotate-90"
                style="animation: floatRotate 9s ease-in-out infinite 1.5s;">
                <i class="fas fa-seedling text-7xl"></i>
            </div>

            <!-- Geometric Shapes -->
            <div class="absolute top-40 right-20 w-24 h-24 border-4 border-[#22C55E] opacity-10 rounded-lg transform rotate-45"
                style="animation: spin 20s linear infinite;"></div>
            <div class="absolute bottom-40 left-40 w-32 h-32 border-4 border-[#8B4513] opacity-10 rounded-full"
                style="animation: pulse 4s ease-in-out infinite;"></div>
            <div class="absolute top-1/2 right-1/3 w-16 h-16 bg-[#D4E4D0] opacity-20 rounded-lg transform rotate-12"
                style="animation: bounce 3s ease-in-out infinite;"></div>

            <!-- Dotted Pattern -->
            <div class="absolute top-10 left-1/2 grid grid-cols-3 gap-4 opacity-10"
                style="animation: fadeInOut 5s ease-in-out infinite;">
                <div class="w-2 h-2 bg-[#22C55E] rounded-full"></div>
                <div class="w-2 h-2 bg-[#22C55E] rounded-full"></div>
                <div class="w-2 h-2 bg-[#22C55E] rounded-full"></div>
                <div class="w-2 h-2 bg-[#22C55E] rounded-full"></div>
                <div class="w-2 h-2 bg-[#22C55E] rounded-full"></div>
                <div class="w-2 h-2 bg-[#22C55E] rounded-full"></div>
            </div>

            <!-- Wavy Lines -->
            <svg class="absolute bottom-0 left-0 w-full opacity-5" viewBox="0 0 1440 120" fill="none"
                style="animation: wave 15s ease-in-out infinite;">
                <path
                    d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"
                    fill="#22C55E" />
            </svg>
        </div>

        <!-- Custom Animation Styles -->
        <style>
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-20px);
                }
            }

            @keyframes floatRotate {

                0%,
                100% {
                    transform: translateY(0px) rotate(0deg);
                }

                50% {
                    transform: translateY(-30px) rotate(10deg);
                }
            }

            @keyframes spin {
                from {
                    transform: rotate(45deg);
                }

                to {
                    transform: rotate(405deg);
                }
            }

            @keyframes fadeInOut {

                0%,
                100% {
                    opacity: 0.1;
                }

                50% {
                    opacity: 0.3;
                }
            }

            @keyframes wave {

                0%,
                100% {
                    transform: translateX(0);
                }

                50% {
                    transform: translateX(-50px);
                }
            }
        </style>

        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-8 relative z-10">
                    <!-- Badge -->
                    <div data-aos="fade-down"
                        class="inline-flex items-center gap-2 bg-[#7b8f5a] text-white px-4 py-2 rounded-full shadow-lg animate-pulse">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="font-semibold text-sm">{{ __('messages.handcrafted_love') }}</span>
                    </div>

                    <!-- Main Heading -->
                    <div data-aos="fade-up" data-aos-delay="200">
                        <h1 class="text-3xl md:text-5xl lg:text-6xl leading-tight" style="font-weight: 800;">
                            <span class="text-[#7b8f5a]">{{ __('messages.live_easy') }}</span>
                            <br @if(app()->getLocale() === 'ar') class="hidden" @endif>
                            <span class="text-gray-800">{{ __('messages.live_boho') }}</span>
                        </h1>
                    </div>

                    <!-- Social Media Icons -->
                    <div data-aos="fade-up" data-aos-delay="300" class="flex gap-4">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/share/1C6q8ENRi6/?mibextid=wwXIfr" target="_blank"
                            class="w-10 h-10 bg-[#22C55E] rounded-full flex items-center justify-center text-white hover:bg-[#16A34A] transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/boho_home_furniture?igsh=Y3preDk0a282NnB1" target="_blank"
                            class="w-10 h-10 bg-[#22C55E] rounded-full flex items-center justify-center text-white hover:bg-[#16A34A] transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <!-- Tiktok -->
                        <a href="https://www.tiktok.com/@boho.furniture7?_r=1&_t=ZS-9392qivJwVp" target="_blank"
                            class="w-10 h-10 bg-[#22C55E] rounded-full flex items-center justify-center text-white hover:bg-[#16A34A] transition duration-300">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <!-- Whatsapp -->
                        <a href="https://wa.me/201080434434" target="_blank"
                            class="w-10 h-10 bg-[#22C55E] rounded-full flex items-center justify-center text-white hover:bg-[#16A34A] transition duration-300">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <!-- Address -->
                        <a href="https://www.google.com/maps/place/Tower+6+Armed+Forces+Buildings/@29.9660063,31.284477,17z/data=!3m1!4b1!4m6!3m5!1s0x145839b89e330db9:0xa42cc96203cfb996!8m2!3d29.9660017!4d31.2870519!16s%2Fg%2F11p0fzqqx4?entry=ttu&g_ep=EgoyMDI2MDExMy4wIKXMDSoKLDEwMDc5MjA2N0gBUAM%3D"
                            target="_blank"
                            class="w-10 h-10 bg-[#22C55E] rounded-full flex items-center justify-center text-white hover:bg-[#16A34A] transition duration-300">
                            <i class="fas fa-map-marker-alt"></i>
                        </a>
                    </div>

                    <!-- Statistics -->
                    <div data-aos="fade-up" data-aos-delay="400" class="flex flex-wrap gap-8 pt-4">
                        <div class="text-center">
                            <div class="text-[#7b8f5a] text-4xl font-bold">
                                <span class="counter" data-target="500">0</span>+
                            </div>
                            <div class="text-gray-600 text-sm mt-1">{{ __('messages.happy_customers') }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-[#7b8f5a] text-4xl font-bold">
                                <span class="counter" data-target="50">0</span>+
                            </div>
                            <div class="text-gray-600 text-sm mt-1">{{ __('messages.unique_designs') }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-[#7b8f5a] text-4xl font-bold">
                                <span class="counter" data-target="100">0</span>%
                            </div>
                            <div class="text-gray-600 text-sm mt-1">{{ __('messages.sustainable') }}</div>
                        </div>
                    </div>

                    <!-- Counter Animation Script -->
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const counters = document.querySelectorAll('.counter');

                            const animateCounter = (counter) => {
                                const target = parseInt(counter.getAttribute('data-target'));
                                const duration = 2000;
                                const startTime = performance.now();

                                const updateCount = (currentTime) => {
                                    const elapsedTime = currentTime - startTime;
                                    const progress = Math.min(elapsedTime / duration, 1);
                                    const easeOut = 1 - Math.pow(2, -10 * progress);

                                    const currentCount = Math.floor(easeOut * target);
                                    counter.innerText = currentCount;

                                    if (progress < 1) {
                                        requestAnimationFrame(updateCount);
                                    } else {
                                        counter.innerText = target;
                                    }
                                };

                                requestAnimationFrame(updateCount);
                            };

                            const observerOptions = {
                                threshold: 0.5
                            };

                            const observer = new IntersectionObserver((entries) => {
                                entries.forEach(entry => {
                                    if (entry.isIntersecting) {
                                        animateCounter(entry.target);
                                        observer.unobserve(entry.target);
                                    }
                                });
                            }, observerOptions);

                            counters.forEach(counter => {
                                observer.observe(counter);
                            });
                        });
                    </script>

                    <!-- CTA Button -->
                    <div data-aos="fade-up" data-aos-delay="500" class="flex gap-4">
                        <a href="{{ route('products') }}"
                            class="inline-flex items-center gap-2 bg-[#7b8f5a] text-white px-4 py-3 rounded-lg font-semibold text-lg shadow-lg hover:bg-[#16A34A] transition duration-300 transform hover:scale-105">
                            <span>{{ __('messages.shop_collection') }}</span>
                            <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                        <a href="{{ route('about') }}#team"
                            class="inline-flex items-center gap-2 bg-[#7b8f5a] text-white px-4 py-3 rounded-lg font-semibold text-lg shadow-lg hover:bg-[#16A34A] transition duration-300 transform hover:scale-105">
                            <span>{{ __('messages.contact_partner') }}</span>
                            <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Content - Furniture Image -->
                <div class="relative" data-aos="fade-left" data-aos-delay="300">
                    <!-- Decorative Background Circles -->
                    <div class="absolute -top-10 -left-10 w-32 h-32 bg-[#D4E4D0] rounded-full opacity-50 blur-2xl"></div>
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-[#E8F5E9] rounded-full opacity-50 blur-3xl">
                    </div>

                    <!-- Main Image Container -->
                    <div
                        class="relative bg-gradient-to-br from-gray-100 to-gray-200 rounded-3xl shadow-2xl overflow-hidden transform">
                        <img src="{{ isset($landingImage) ? asset('storage/' . $landingImage->image_path) : asset('images/green_sofa_hero.png') }}"
                            alt="{{ $landingImage->alt_text ?? 'Modern Green Sofa' }}" class="w-full h-auto object-cover">
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex flex-col items-center space-y-3">
            <!-- Mouse Icon with Circle Background -->
            <a href="#projects" class="relative">
                <div
                    class="w-12 h-12 rounded-full bg-white bg-opacity-80 backdrop-blur-sm shadow-lg flex items-center justify-center animate-bounce">
                    <i class="fas fa-chevron-down text-[#7b8f5a] text-xl animate-pulse"></i>
                </div>
            </a>
            <span class="text-sm font-semibold text-gray-700 bg-white bg-opacity-70 px-3 py-1 rounded-full shadow-sm">
                {{ __('messages.scroll_explore') }}
            </span>
        </div>
    </section>

    <!-- Our Projects Section -->
    <section class="py-16" id="projects">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-5xl font-bold mb-4" style="color: #8B4513;">
                    {{ isset($projectVideo->title) ? __($projectVideo->title) : __('messages.our_projects') }}
                </h2>
                <div class="w-24 h-1 bg-[#7b8f5a] mx-auto rounded-full"></div>
                <p class="mt-6 text-gray-600 max-w-2xl mx-auto text-lg">
                    {{ isset($projectVideo->description) ? __($projectVideo->description) : __('messages.projects_desc') }}
                </p>
            </div>

            <!-- Video Container -->
            <div class="relative max-w-7xl mx-auto" data-aos="zoom-in" data-aos-delay="200">
                <!-- Decorative Elements -->
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-[#D4E4D0] rounded-full opacity-50 blur-2xl -z-10"></div>
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-[#E8F5E9] rounded-full opacity-50 blur-2xl -z-10"></div>

                <div class="relative">
                    <video controls autoplay muted loop class="h-[800px] w-full object-contain ">
                        <source
                            src="{{ isset($projectVideo) ? asset('storage/' . $projectVideo->video_path) : asset('videos/boho.mp4') }}"
                            type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-8" id="features">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Feature 1: Free Shipping -->
                <div data-aos="fade-up" data-aos-delay="100"
                    class="flex flex-col items-center text-center space-y-3 p-6 rounded-lg ">
                    <div class="w-16 h-16 bg-[#7b8f5a] bg-opacity-10 rounded-full flex items-center justify-center">
                        <i class="fas fa-truck text-[#7b8f5a] text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">{{ __('messages.free_shipping') }}</h3>
                    <!-- <p class="text-gray-600 text-sm">On orders over $50</p> -->
                </div>

                <!-- Feature 2: Easy Returns -->
                <div data-aos="fade-up" data-aos-delay="200"
                    class="flex flex-col items-center text-center space-y-3 p-6 rounded-lg ">
                    <div class="w-16 h-16 bg-[#7b8f5a] bg-opacity-10 rounded-full flex items-center justify-center">
                        <i class="fas fa-sync-alt text-[#7b8f5a] text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">{{ __('messages.easy_returns') }}</h3>
                    <!-- <p class="text-gray-600 text-sm">30-day policy</p> -->
                </div>

                <!-- Feature 3: Quality Guarantee -->
                <div data-aos="fade-up" data-aos-delay="300"
                    class="flex flex-col items-center text-center space-y-3 p-6 rounded-lg ">
                    <div class="w-16 h-16 bg-[#7b8f5a] bg-opacity-10 rounded-full flex items-center justify-center">
                        <i class="fas fa-shield-alt text-[#7b8f5a] text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">{{ __('messages.quality_guarantee') }}</h3>
                    <!-- <p class="text-gray-600 text-sm">Premium materials</p> -->
                </div>

            </div>
        </div>
    </section>

    <!-- Our Categories Section -->
    <section class="py-16" id="categories">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <h2 data-aos="fade-down" class="text-4xl md:text-5xl font-bold text-center mb-12" style="color: #8B4513;">
                {{ __('messages.categories') }}
            </h2>

            <!-- Categories Grid -->
            <div class="flex justify-center">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                    @forelse ($categories as $category)
                        <a href="{{ route('products', ['category' => $category->slug]) }}" class="group" data-aos="zoom-in"
                            data-aos-delay="{{ $loop->index * 100 }}">
                            <div
                                class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                                <div class="flex flex-col items-center space-y-4">
                                    <div
                                        class="w-16 h-16 bg-[#7b8f5a] bg-opacity-10 rounded-xl flex items-center justify-center group-hover:bg-opacity-20 transition duration-300">
                                        <i class="fas fa-{{ $category->icon ?? 'box' }} text-[#7b8f5a] text-3xl"></i>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="font-bold text-gray-800 mb-1">{{ $category->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $category->products->count() }}
                                            {{ __('messages.items_count') }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full">
                            <div class="rounded-2xl p-12 text-center">
                                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-box-open text-4xl text-gray-400"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ __('messages.no_categories') }}</h3>
                                <p class="text-gray-600 mb-6">{{ __('messages.updating_categories') }}
                                </p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- New Arrivals Section -->
    <section class="py-16 bg-white bg-opacity-50" id="new-arrivals">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="flex justify-between items-center mb-8" data-aos="fade-right">
                <h2 class="text-3xl md:text-4xl font-bold" style="color: #8B4513;">
                    {{ __('messages.new_arrivals') }}
                </h2>
                <a href="{{ route('products') }}"
                    class="bg-[#7b8f5a] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300">
                    {{ __('messages.view_all') }}
                </a>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @forelse($newArrivals as $product)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 group"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->display_name }}"
                                class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                            <!-- Discount Badge -->
                            @if($product->discount_percentage > 0)
                                <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full font-bold text-sm">
                                    -{{ $product->discount_percentage }}%
                                </div>
                            @endif
                        </div>

                        <!-- Product Info -->
                        <div class="p-3 space-y-2">
                            <!-- Category -->
                            <p class="text-[#7b8f5a] text-xs font-bold uppercase tracking-wide">{{ $product->category->name }}
                            </p>

                            <!-- Product Name -->
                            <h3 class="text-gray-800 font-bold text-lg leading-tight">{{ $product->display_name }}</h3>

                            <!-- Rating -->
                            <div class="flex items-center gap-1">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($product->rating))
                                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                                    @elseif($i - 0.5 <= $product->rating)
                                        <i class="fas fa-star-half-alt text-yellow-400 text-sm"></i>
                                    @else
                                        <i class="far fa-star text-yellow-400 text-sm"></i>
                                    @endif
                                @endfor
                                <span class="text-gray-500 text-sm ms-2">({{ $product->reviews_count }})</span>
                            </div>

                            <!-- Price -->
                            <div class="flex items-center gap-2">
                                <span class="text-[#7b8f5a] text-2xl font-bold">{{ number_format($product->price, 2) }}
                                    EGP</span>
                                @if($product->original_price)
                                    <span
                                        class="text-gray-400 line-through text-sm">{{ number_format($product->original_price, 2) }}
                                        EGP</span>
                                @endif
                            </div>

                            <!-- View Details Button -->
                            <a href="{{ route('products.show', $product->id) }}"
                                class="w-full bg-[#7b8f5a] text-white py-2 rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300 flex items-center justify-center gap-2">
                                <i class="fas fa-eye"></i>
                                <span>{{ __('messages.view_details') }}</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="rounded-2xl p-12 text-center">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-box-open text-4xl text-gray-400"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ __('messages.no_products') }}</h3>
                            <p class="text-gray-600 mb-6">{{ __('messages.updating_products') }}</p>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </section>

    <!-- Best Selling Products Section -->
    <section class="py-16" id="best-sellings">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="flex justify-between items-center mb-8" data-aos="fade-left">
                <h2 class="text-3xl md:text-4xl font-bold" style="color: #8B4513;">
                    {{ __('messages.best_sellers') }}
                </h2>
                <a href="{{ route('products') }}"
                    class="bg-[#7b8f5a] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300">
                    {{ __('messages.view_all') }}
                </a>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @forelse($bestSellers as $product)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 group"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                            <!-- Discount Badge -->
                            @if($product->discount_percentage > 0)
                                <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full font-bold text-sm">
                                    -{{ $product->discount_percentage }}%
                                </div>
                            @endif
                        </div>

                        <!-- Product Info -->
                        <div class="p-3 space-y-2">
                            <!-- Category -->
                            <p class="text-[#7b8f5a] text-xs font-bold uppercase tracking-wide">{{ $product->category->name }}
                            </p>

                            <!-- Product Name -->
                            <h3 class="text-gray-800 font-bold text-lg leading-tight">{{ $product->name }}</h3>

                            <!-- Rating -->
                            <div class="flex items-center gap-1">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($product->rating))
                                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                                    @elseif($i - 0.5 <= $product->rating)
                                        <i class="fas fa-star-half-alt text-yellow-400 text-sm"></i>
                                    @else
                                        <i class="far fa-star text-yellow-400 text-sm"></i>
                                    @endif
                                @endfor
                                <span class="text-gray-500 text-sm ms-2">({{ $product->reviews_count }})</span>
                            </div>

                            <!-- Price -->
                            <div class="flex items-center gap-2">
                                <span class="text-[#7b8f5a] text-2xl font-bold">{{ number_format($product->price, 2) }}
                                    EGP</span>
                                @if($product->original_price)
                                    <span
                                        class="text-gray-400 line-through text-sm">{{ number_format($product->original_price, 2) }}
                                        EGP</span>
                                @endif
                            </div>

                            <!-- View Details Button -->
                            <a href="{{ route('products.show', $product->id) }}"
                                class="w-full bg-[#7b8f5a] text-white py-2 rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300 flex items-center justify-center gap-2">
                                <i class="fas fa-eye"></i>
                                <span>{{ __('messages.view_details') }}</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="rounded-2xl p-12 text-center">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-box-open text-4xl text-gray-400"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ __('messages.no_products') }}</h3>
                            <p class="text-gray-600 mb-6">{{ __('messages.updating_products') }}</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- About BOHO Section -->
    <section class="py-24 bg-[#D4E4D0] bg-opacity-20" id="about">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <h2 data-aos="fade-down" class="text-3xl md:text-4xl font-bold text-center mb-12" style="color: #8B4513;">
                {{ __('messages.about_boho') }}
            </h2>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <!-- Left: Image -->
                <div class="relative" data-aos="zoom-in-right">
                    <div class="bg-white rounded-3xl p-6 shadow-lg">
                        <img src="{{ asset('images/green_sofa_hero.png') }}" alt="BOHO Furniture"
                            class="w-full h-auto rounded-2xl object-cover">
                    </div>
                </div>

                <!-- Right: Content -->
                <div class="space-y-6" data-aos="fade-left">
                    <!-- Description -->
                    <p class="text-gray-700 text-lg leading-relaxed">
                        {{ __('messages.about_description') }}
                    </p>

                    <!-- Features List -->
                    <div class="space-y-4">
                        <!-- Feature 1 -->
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 mt-1">
                                <i class="fas fa-leaf text-[#22C55E] text-xl"></i>
                            </div>
                            <p class="text-gray-700 font-medium">{{ __('messages.eco_friendly') }}</p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 mt-1">
                                <i class="fas fa-hands text-[#FF9800] text-xl"></i>
                            </div>
                            <p class="text-gray-700 font-medium">{{ __('messages.handcrafted_artisans') }}</p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 mt-1">
                                <i class="fas fa-star text-[#FFD700] text-xl"></i>
                            </div>
                            <p class="text-gray-700 font-medium">{{ __('messages.quality_guarantee_desc') }}</p>
                        </div>

                        <!-- Feature 4 -->
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 mt-1">
                                <i class="fas fa-globe text-[#2196F3] text-xl"></i>
                            </div>
                            <p class="text-gray-700 font-medium">{{ __('messages.ethically_sourced') }}</p>
                        </div>
                    </div>

                    <!-- Learn More Button -->
                    <div class="pt-4">
                        <a href="{{ route('about') }}"
                            class="inline-block bg-[#7b8f5a] text-white px-8 py-3 rounded-lg font-semibold text-lg hover:bg-[#16A34A] transition duration-300 shadow-lg">
                            {{ __('messages.learn_more') }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-24" id="testimonials" x-data="{ 
                                activeSlide: 0, 
                                slidesCount: {{ max(1, ceil($reviews->count() / 5)) }},
                                modalOpen: false,
                                selectedReview: {name: '', review: '', stars: 0, gradient: ''},
                                init() {
                                    if (this.slidesCount > 1) {
                                        setInterval(() => {
                                            if (!this.modalOpen) {
                                                this.activeSlide = (this.activeSlide + 1) % this.slidesCount;
                                            }
                                        }, 5000);
                                    }
                                }
                            }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <h2 data-aos="fade-down" class="text-3xl md:text-4xl font-bold text-center mb-12" style="color: #8B4513;">
                {{ __('messages.testimonials_title') }}
            </h2>

            <!-- Testimonials Slider Wrapper -->
            <div class="relative overflow-hidden mb-12">
                <div class="flex transition-transform duration-1000 ease-in-out"
                    :style="`transform: translateX(-${activeSlide * 100}%)`">

                    @php
                        $gradients = [
                            'from-green-400 to-green-600',
                            'from-blue-400 to-blue-600',
                            'from-purple-400 to-purple-600',
                            'from-pink-400 to-pink-600',
                            'from-orange-400 to-orange-600',
                        ];
                        $chunkedReviews = $reviews->chunk(5);
                    @endphp

                    @forelse($chunkedReviews as $chunkIndex => $chunk)
                        <div class="w-full flex-shrink-0">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 p-4">
                                @foreach($chunk as $index => $review)
                                    <!-- Testimonial -->
                                    <div
                                        class="relative bg-white rounded-2xl p-6 hover:shadow-xl transition duration-300 transform hover:-translate-y-1 group">
                                        <!-- Expand Icon -->
                                        <button @click="modalOpen = true; selectedReview = {
                                                                                    name: '{{ addslashes($review->name) }}', 
                                                                                    review: '{{ addslashes($review->review) }}', 
                                                                                    stars: {{ $review->stars_count }}, 
                                                                                    gradient: '{{ $gradients[($chunkIndex * 5 + $loop->index) % count($gradients)] }}'
                                                                                }"
                                            class="absolute top-4 right-4 group-hover:opacity-100 text-gray-300 hover:text-[#7b8f5a] transition duration-300 transform hover:scale-110">
                                            <i class="fas fa-expand-alt"></i>
                                        </button>

                                        <!-- Stars -->
                                        <div class="flex justify-center gap-1 mb-4">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i
                                                    class="fas fa-star {{ $i <= $review->stars_count ? 'text-yellow-400' : 'text-gray-200' }} text-sm"></i>
                                            @endfor
                                        </div>

                                        <!-- Review Text -->
                                        <p class="text-gray-700 text-sm text-center mb-6 leading-relaxed line-clamp-3">
                                            "{{ $review->review }}"
                                        </p>

                                        <!-- Customer Info -->
                                        <div class="flex items-center justify-center gap-2">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-br {{ $gradients[($chunkIndex * 5 + $loop->index) % count($gradients)] }} rounded-full flex items-center justify-center text-white font-bold uppercase text-sm">
                                                {{ substr($review->name, 0, 1) }}
                                            </div>
                                            <p class="text-gray-800 font-semibold text-xs">{{ $review->name }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div class="w-full py-12 text-center">
                            <i class="fas fa-comment-slash text-4xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500">{{ __('messages.no_reviews') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Navigation Controls -->
            @if($reviews->count() > 5)
                <div class="flex justify-center items-center gap-6">
                    <button @click="activeSlide = (activeSlide - 1 + slidesCount) % slidesCount"
                        class="w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center text-gray-400 hover:text-[#7b8f5a] hover:shadow-lg transition duration-300">
                        <i class="fas fa-chevron-left rtl:rotate-180"></i>
                    </button>

                    <div class="flex gap-2">
                        @for($i = 0; $i < ceil($reviews->count() / 5); $i++)
                            <button @click="activeSlide = {{ $i }}" class="w-2.5 h-2.5 rounded-full transition duration-300"
                                :class="activeSlide === {{ $i }} ? 'bg-[#7b8f5a] w-6' : 'bg-gray-300 hover:bg-[#7b8f5a]'"></button>
                        @endfor
                    </div>

                    <button @click="activeSlide = (activeSlide + 1) % slidesCount"
                        class="w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center text-gray-400 hover:text-[#7b8f5a] hover:shadow-lg transition duration-300">
                        <i class="fas fa-chevron-right rtl:rotate-180"></i>
                    </button>
                </div>
            @endif
        </div>

        <!-- Review Detail Modal -->
        <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center px-4 bg-black/60 backdrop-blur-sm"
            style="display: none;">

            <div @click.away="modalOpen = false" x-show="modalOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="scale-95 translate-y-4" x-transition:enter-end="scale-100 translate-y-0"
                class="bg-white rounded-3xl max-w-lg w-full overflow-hidden shadow-2xl relative">

                <!-- Close Button -->
                <button @click="modalOpen = false"
                    class="absolute top-6 right-6 text-gray-400 hover:text-gray-600 transition duration-200">
                    <i class="fas fa-times text-xl"></i>
                </button>

                <!-- Modal Content -->
                <div class="p-8 md:p-12 text-center">
                    <!-- Customer Avatar -->
                    <div class="flex justify-center mb-6">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center text-white text-3xl font-bold uppercase shadow-lg"
                            :class="`bg-gradient-to-br ${selectedReview.gradient}`" x-text="selectedReview.name.charAt(0)">
                        </div>
                    </div>

                    <!-- Stars -->
                    <div class="flex justify-center space-x-1 mb-4">
                        <template x-for="i in 5">
                            <i class="fas fa-star text-lg"
                                :class="i <= selectedReview.stars ? 'text-yellow-400' : 'text-gray-200'"></i>
                        </template>
                    </div>

                    <!-- Customer Name -->
                    <h3 class="text-2xl font-bold text-gray-800 mb-4" x-text="selectedReview.name"></h3>

                    <!-- Divider -->
                    <div class="w-12 h-1 bg-[#7b8f5a] mx-auto rounded-full mb-6"></div>

                    <!-- Review Text -->
                    <div class="max-h-64 overflow-y-auto px-2">
                        <p class="text-gray-600 text-lg leading-relaxed italic"
                            x-text="`&quot;${selectedReview.review}&quot;`"></p>
                    </div>
                </div>

                <!-- Footer Decor -->
                <div class="h-2 bg-gradient-to-r from-transparent via-[#7b8f5a]/20 to-transparent"></div>
            </div>
        </div>
    </section>


@endsection