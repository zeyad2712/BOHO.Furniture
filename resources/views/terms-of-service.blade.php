@extends('layouts.app')

@section('content')
    <!-- Terms of Service Page -->
    <div class="min-h-screen py-12" style="background-color: #fefae0;"
        dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div data-aos="fade-down" class="bg-gradient-to-r from-[#899974] to-[#7a8665] rounded-2xl p-8 mb-8 text-center">
                <h1 class="text-4xl font-bold text-white mb-3">{{ __('messages.tos_title') }}</h1>
                <p class="text-white opacity-90 text-lg">{{ __('messages.last_updated_tos') }}</p>
            </div>

            <!-- Content -->
            <div data-aos="fade-up" class="bg-white rounded-2xl shadow-lg p-8 space-y-8">

                <!-- Introduction -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.tos_intro_title') }}</h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __('messages.tos_intro_p1') }}
                    </p>
                </section>

                <!-- Acceptance of Terms -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.acceptance_terms_title') }}
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-3">
                        {{ __('messages.acceptance_terms_p1') }}
                    </p>
                    <ul
                        class="list-disc list-inside text-gray-700 space-y-2 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                        <li>{{ __('messages.age_requirement') }}</li>
                        <li>{{ __('messages.account_confidentiality') }}</li>
                        <li>{{ __('messages.accurate_info') }}</li>
                    </ul>
                </section>

                <!-- Products and Services -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.products_services_title') }}
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-3">
                        {{ __('messages.products_services_p1') }}
                    </p>
                    <ul
                        class="list-disc list-inside text-gray-700 space-y-2 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                        <li>{{ __('messages.product_colors_variation') }}</li>
                        <li>{{ __('messages.handcrafted_variations') }}</li>
                        <li>{{ __('messages.modify_discontinue') }}</li>
                        <li>{{ __('messages.prices_subject_to_change') }}</li>
                    </ul>
                </section>

                <!-- Orders and Payment -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.orders_payment_title') }}
                    </h2>
                    <div class="space-y-3 text-gray-700">
                        <p class="leading-relaxed">
                            <strong class="text-gray-900">{{ __('messages.order_acceptance') }}</strong>
                            {{ __('messages.order_acceptance_desc') }}
                        </p>
                        <p class="leading-relaxed">
                            <strong class="text-gray-900">{{ __('messages.payment_methods_label') }}</strong>
                            {{ __('messages.payment_methods_desc') }}
                        </p>
                        <p class="leading-relaxed">
                            <strong class="text-gray-900">{{ __('messages.pricing_errors_label') }}</strong>
                            {{ __('messages.pricing_errors_desc') }}
                        </p>
                    </div>
                </section>

                <!-- Shipping and Delivery -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.shipping_delivery_title') }}
                    </h2>
                    <ul
                        class="list-disc list-inside text-gray-700 space-y-2 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                        <li>{{ __('messages.free_shipping_500') }}</li>
                        <li>{{ __('messages.delivery_time_est') }}</li>
                        <li>{{ __('messages.risk_of_loss') }}</li>
                        <li>{{ __('messages.accurate_shipping_info') }}</li>
                        <li>{{ __('messages.remote_fees') }}</li>
                    </ul>
                </section>

                <!-- Returns and Refunds -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">
                        {{ __('messages.returns_refunds_policy_title') }}
                    </h2>
                    <div
                        class="bg-green-50 border-l-4 border-[#22C55E] p-4 mb-4 {{ app()->getLocale() === 'ar' ? 'border-l-0 border-r-4' : '' }}">
                        <p class="text-gray-700 font-semibold">{{ __('messages.policy_30_day_return') }}</p>
                        <p class="text-gray-600 text-sm">{{ __('messages.policy_30_day_desc') }}</p>
                    </div>
                    <ul
                        class="list-disc list-inside text-gray-700 space-y-2 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                        <li>{{ __('messages.unused_condition') }}</li>
                        <li>{{ __('messages.original_packaging_included') }}</li>
                        <li>{{ __('messages.custom_non_returnable') }}</li>
                        <li>{{ __('messages.customer_return_shipping') }}</li>
                        <li>{{ __('messages.refund_timeline_7_10') }}</li>
                    </ul>
                </section>

                <!-- Intellectual Property -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">
                        {{ __('messages.intellectual_property_title') }}
                    </h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __('messages.intellectual_property_p1') }}
                    </p>
                </section>

                <!-- User Conduct -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.user_conduct_title') }}</h2>
                    <p class="text-gray-700 leading-relaxed mb-3">{{ __('messages.user_conduct_p1') }}</p>
                    <ul
                        class="list-disc list-inside text-gray-700 space-y-2 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                        <li>{{ __('messages.conduct_illegal') }}</li>
                        <li>{{ __('messages.conduct_violate_laws') }}</li>
                        <li>{{ __('messages.conduct_infringe_rights') }}</li>
                        <li>{{ __('messages.conduct_viruses') }}</li>
                        <li>{{ __('messages.conduct_unauth_access') }}</li>
                        <li>{{ __('messages.conduct_interfere') }}</li>
                    </ul>
                </section>

                <!-- Limitation of Liability -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">
                        {{ __('messages.limitation_liability_title') }}
                    </h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __('messages.limitation_liability_p1') }}
                    </p>
                </section>

                <!-- Warranty Disclaimer -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">
                        {{ __('messages.warranty_disclaimer_title') }}
                    </h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __('messages.warranty_disclaimer_p1') }}
                    </p>
                </section>

                <!-- Privacy -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.privacy_tos_title') }}</h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __('messages.privacy_tos_p1') }}
                    </p>
                </section>

                <!-- Changes to Terms -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.changes_terms_title') }}
                    </h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __('messages.changes_terms_p1') }}
                    </p>
                </section>

                <!-- Governing Law -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.governing_law_title') }}
                    </h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __('messages.governing_law_p1') }}
                    </p>
                </section>

                <!-- Contact Information -->
                <section class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.tos_contact_title') }}</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('messages.tos_contact_p1') }}
                    </p>
                    <div class="space-y-2 text-gray-700">
                        <a href="https://wa.me/{{ __('messages.tos_phone') }}" target="_blank"
                            class="flex items-center gap-3">
                            <i class="fas fa-phone text-[#22C55E] w-5"></i>
                            <span>{{ __('messages.tos_phone') }}</span>
                        </a>
                        <a href="https://maps.app.goo.gl/jxQLzVnfPoWJGaL4A" target="_blank" class="flex items-center gap-3">
                            <i class="fas fa-map-marker-alt text-[#22C55E] w-5"></i>
                            <span>{{ __('messages.tos_address') }}</span>
                        </a>
                    </div>
                </section>

                <!-- Acceptance -->
                <section class="border-t pt-6">
                    <p class="text-gray-600 text-sm italic">
                        {{ __('messages.tos_acknowledgment') }}
                    </p>
                </section>

            </div>

            <!-- Back to Home Button -->
            <div class="text-center mt-8">
                <a href="{{ route('home') }}"
                    class="inline-block bg-[#22C55E] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#16A34A] transition duration-300">
                    <i class="fas fa-home me-2"></i>{{ __('messages.back_to_home') }}
                </a>
            </div>

        </div>
    </div>
@endsection