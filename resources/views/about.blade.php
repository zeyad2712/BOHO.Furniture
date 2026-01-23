@extends('layouts.app')

@section('content')

    <!-- About Hero Section -->
    <section class="py-24 bg-gradient-to-r from-[#7b8f5a] to-[#6c7d4e] relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl">
            </div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 translate-y-1/3 blur-3xl">
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h1 data-aos="fade-down" class="text-5xl md:text-7xl font-bold text-white mb-6">{{ __('messages.about_hero') }}
            </h1>
            <p data-aos="fade-up" data-aos-delay="200"
                class="text-xl md:text-2xl text-white opacity-90 max-w-3xl mx-auto leading-relaxed">
                {{ __('messages.about_hero_desc') }}
            </p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-4xl font-bold mb-8" style="color: #8B4513;">{{ __('messages.our_story') }}</h2>
                    <div class="space-y-6">
                        <p class="text-gray-700 text-lg leading-relaxed">
                            {{ __('messages.story_p1') }}
                        </p>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            {{ __('messages.story_p2') }}
                        </p>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            {{ __('messages.story_p3') }}
                        </p>
                    </div>
                </div>
                <div class="relative" data-aos="fade-left">
                    <div class="absolute -inset-4 bg-[#7b8f5a]/10 rounded-3xl -rotate-3 opacity-50"></div>
                    <div
                        class="relative rounded-3xl overflow-hidden shadow-2xl transform hover:scale-105 transition duration-500">
                        <img src="{{ asset('images/green_sofa_hero.png') }}" alt="BOHO Workshop"
                            class="w-full h-[500px] object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="py-24 bg-[#fefae0]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 data-aos="fade-down" class="text-4xl font-bold text-center mb-16" style="color: #8B4513;">
                {{ __('messages.our_values') }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Value 1 -->
                <div data-aos="fade-up" data-aos-delay="100"
                    class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition duration-500 group border border-gray-50">
                    <div
                        class="w-20 h-20 bg-[#7b8f5a]/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-[#7b8f5a] transition duration-500">
                        <i class="fas fa-leaf text-3xl text-[#7b8f5a] group-hover:text-white transition duration-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('messages.eco_friendly_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('messages.eco_friendly_desc') }}
                    </p>
                </div>

                <!-- Value 2 -->
                <div data-aos="fade-up" data-aos-delay="200"
                    class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition duration-500 group border border-gray-50">
                    <div
                        class="w-20 h-20 bg-[#7b8f5a]/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-[#7b8f5a] transition duration-500">
                        <i class="fas fa-hands text-3xl text-[#7b8f5a] group-hover:text-white transition duration-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('messages.handcrafted_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('messages.handcrafted_desc') }}
                    </p>
                </div>

                <!-- Value 3 -->
                <div data-aos="fade-up" data-aos-delay="300"
                    class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition duration-500 group border border-gray-50">
                    <div
                        class="w-20 h-20 bg-[#7b8f5a]/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-[#7b8f5a] transition duration-500">
                        <i class="fas fa-star text-3xl text-[#7b8f5a] group-hover:text-white transition duration-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('messages.quality_first_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('messages.quality_first_desc') }}
                    </p>
                </div>

                <!-- Value 4 -->
                <div data-aos="fade-up" data-aos-delay="400"
                    class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition duration-500 group border border-gray-50">
                    <div
                        class="w-20 h-20 bg-[#7b8f5a]/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-[#7b8f5a] transition duration-500">
                        <i class="fas fa-globe text-3xl text-[#7b8f5a] group-hover:text-white transition duration-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('messages.ethical_sourcing') }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('messages.ethical_sourcing_desc') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 data-aos="fade-down" class="text-4xl font-bold text-center mb-16" style="color: #8B4513;">
                {{ __('messages.why_choose_boho') }}
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Reason 1 -->
                <div class="text-center group" data-aos="zoom-in" data-aos-delay="100">
                    <div
                        class="w-24 h-24 bg-[#7b8f5a] rounded-full flex items-center justify-center mx-auto mb-8 group-hover:rotate-12 transition duration-500 shadow-xl">
                        <i class="fas fa-truck text-4xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('messages.free_shipping') }}</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        {{ __('messages.free_shipping_p') }}
                    </p>
                </div>

                <!-- Reason 2 -->
                <div class="text-center group" data-aos="zoom-in" data-aos-delay="200">
                    <div
                        class="w-24 h-24 bg-[#7b8f5a] rounded-full flex items-center justify-center mx-auto mb-8 group-hover:-rotate-12 transition duration-500 shadow-xl">
                        <i class="fas fa-undo text-4xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('messages.easy_returns') }}</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        {{ __('messages.returns_30_p') }}
                    </p>
                </div>

                <!-- Reason 3 -->
                <div class="text-center group" data-aos="zoom-in" data-aos-delay="300">
                    <div
                        class="w-24 h-24 bg-[#7b8f5a] rounded-full flex items-center justify-center mx-auto mb-8 group-hover:rotate-12 transition duration-500 shadow-xl">
                        <i class="fas fa-headset text-4xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('messages.support_24_7') }}</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        {{ __('messages.support_24_7_p') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-24 bg-[#7b8f5a]/5" id="team">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 data-aos="fade-down" class="text-4xl font-bold text-center mb-6" style="color: #8B4513;">
                {{ __('messages.meet_team') }}</h2>
            <p data-aos="fade-up" class="text-center text-gray-600 mb-16 max-w-2xl mx-auto text-lg">
                {{ __('messages.team_desc') }}
            </p>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div data-aos="flip-left" data-aos-delay="100"
                    class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 group flex flex-col border border-gray-50">
                    <div
                        class="h-72 bg-gradient-to-br from-[#7b8f5a] to-[#6c7d4e] flex items-center justify-center overflow-hidden">
                        <div
                            class="w-36 h-36 bg-white rounded-full flex items-center justify-center transform group-hover:scale-110 transition duration-500 shadow-2xl">
                            <span class="text-5xl font-extrabold text-[#7b8f5a]">AH</span>
                        </div>
                    </div>
                    <div class="p-8 text-center">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Ahmed Hassan</h3>
                        <p class="text-[#7b8f5a] font-bold mb-4 uppercase tracking-widest text-xs">
                            {{ __('messages.founder_ceo') }}</p>
                        <p class="text-gray-600 leading-relaxed">Visionary leader with 15 years in furniture design</p>
                    </div>
                    <div class="px-8 pb-8 text-center mt-auto">
                        <a href="https://wa.me/201080434434" target="_blank"
                            class="w-full bg-[#25D366] text-white py-3 rounded-xl font-bold hover:bg-[#128C7E] transition duration-300 flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <i class="fab fa-whatsapp text-xl"></i>
                            <span>{{ __('messages.chat_whatsapp') }}</span>
                        </a>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div data-aos="flip-left" data-aos-delay="200"
                    class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 group flex flex-col border border-gray-50">
                    <div
                        class="h-72 bg-gradient-to-br from-[#7b8f5a] to-[#6c7d4e] flex items-center justify-center overflow-hidden">
                        <div
                            class="w-36 h-36 bg-white rounded-full flex items-center justify-center transform group-hover:scale-110 transition duration-500 shadow-2xl">
                            <span class="text-5xl font-extrabold text-[#7b8f5a]">SM</span>
                        </div>
                    </div>
                    <div class="p-8 text-center">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Sara Mohamed</h3>
                        <p class="text-[#7b8f5a] font-bold mb-4 uppercase tracking-widest text-xs">
                            {{ __('messages.head_designer') }}</p>
                        <p class="text-gray-600 leading-relaxed">Creative mind behind our iconic collections</p>
                    </div>
                    <div class="px-8 pb-8 text-center mt-auto">
                        <a href="https://wa.me/201080434434" target="_blank"
                            class="w-full bg-[#25D366] text-white py-3 rounded-xl font-bold hover:bg-[#128C7E] transition duration-300 flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <i class="fab fa-whatsapp text-xl"></i>
                            <span>{{ __('messages.chat_whatsapp') }}</span>
                        </a>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div data-aos="flip-left" data-aos-delay="300"
                    class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 group flex flex-col border border-gray-50">
                    <div
                        class="h-72 bg-gradient-to-br from-[#7b8f5a] to-[#6c7d4e] flex items-center justify-center overflow-hidden">
                        <div
                            class="w-36 h-36 bg-white rounded-full flex items-center justify-center transform group-hover:scale-110 transition duration-500 shadow-2xl">
                            <span class="text-5xl font-extrabold text-[#7b8f5a]">KA</span>
                        </div>
                    </div>
                    <div class="p-8 text-center">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Karim Ali</h3>
                        <p class="text-[#7b8f5a] font-bold mb-4 uppercase tracking-widest text-xs">
                            {{ __('messages.master_craftsman') }}</p>
                        <p class="text-gray-600 leading-relaxed">Expert artisan with traditional woodworking skills</p>
                    </div>
                    <div class="px-8 pb-8 text-center mt-auto">
                        <a href="https://wa.me/201080434434" target="_blank"
                            class="w-full bg-[#25D366] text-white py-3 rounded-xl font-bold hover:bg-[#128C7E] transition duration-300 flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <i class="fab fa-whatsapp text-xl"></i>
                            <span>{{ __('messages.chat_whatsapp') }}</span>
                        </a>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div data-aos="flip-left" data-aos-delay="400"
                    class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 group flex flex-col border border-gray-50">
                    <div
                        class="h-72 bg-gradient-to-br from-[#7b8f5a] to-[#6c7d4e] flex items-center justify-center overflow-hidden">
                        <div
                            class="w-36 h-36 bg-white rounded-full flex items-center justify-center transform group-hover:scale-110 transition duration-500 shadow-2xl">
                            <span class="text-5xl font-extrabold text-[#7b8f5a]">LF</span>
                        </div>
                    </div>
                    <div class="p-8 text-center">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Layla Farid</h3>
                        <p class="text-[#7b8f5a] font-bold mb-4 uppercase tracking-widest text-xs">
                            {{ __('messages.customer_success') }}</p>
                        <p class="text-gray-600 leading-relaxed">Dedicated to ensuring customer satisfaction</p>
                    </div>
                    <div class="px-8 pb-8 text-center mt-auto">
                        <a href="https://wa.me/201080434434" target="_blank"
                            class="w-full bg-[#25D366] text-white py-3 rounded-xl font-bold hover:bg-[#128C7E] transition duration-300 flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <i class="fab fa-whatsapp text-xl"></i>
                            <span>{{ __('messages.chat_whatsapp') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-24 bg-[#7b8f5a] relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-1/2 left-0 w-64 h-64 bg-white rounded-full blur-3xl -translate-y-1/2"></div>
            <div class="absolute top-1/2 right-0 w-64 h-64 bg-white rounded-full blur-3xl -translate-y-1/2"></div>
        </div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="zoom-in">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-8">{{ __('messages.ready_transform') }}</h2>
            <p class="text-xl text-white opacity-90 mb-10 leading-relaxed">
                {{ __('messages.ready_transform_desc') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('products') }}"
                    class="bg-white text-[#7b8f5a] px-10 py-4 rounded-xl font-bold text-xl hover:bg-gray-100 transition duration-300 shadow-2xl">
                    {{ __('messages.shop_now') }}
                </a>
                <a href="https://wa.me/201080434434" target="_blank"
                    class="bg-transparent border-2 border-white text-white px-10 py-4 rounded-xl font-bold text-xl hover:bg-white hover:text-[#7b8f5a] transition duration-300 shadow-2xl">
                    {{ __('messages.contact') }}
                </a>
            </div>
        </div>
    </section>

@endsection