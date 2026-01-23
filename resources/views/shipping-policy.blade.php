@extends('layouts.app')

@section('content')
    <!-- Shipping Policy Page -->
    <div class="min-h-screen py-12" style="background-color: #fefae0;"dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Page Header -->
                <div data-aos="fade-down" class="mb-8 bg-gradient-to-r from-[#899974] to-[#7a8665] rounded-2xl p-8 text-center">
                    <h1 class="text-4xl font-bold text-white mb-3">{{ __('messages.shipping_policy_title') }}</h1>
                    <p class="text-white opacity-90 text-lg">{{ __('messages.last_updated_shipping') }}</p>
                </div>

                <!-- Content -->
                <div data-aos="fade-up" class="bg-white rounded-2xl shadow-lg p-8 space-y-8">

                    <!-- Introduction -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.shipping_commitment_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {{ __('messages.shipping_commitment_p1') }}
                        </p>
                        <div class="mt-4 bg-green-50 border-l-4 border-[#22C55E] p-4 {{ app()->getLocale() === 'ar' ? 'border-l-0 border-r-4' : '' }}">
                            <p class="text-gray-700 font-semibold">
                                <i class="fas fa-truck text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                                {{ __('messages.free_shipping_title_policy') }}
                            </p>
                            <p class="text-gray-600 text-sm mt-1">{{ __('messages.free_shipping_desc_policy') }}</p>
                        </div>
                    </section>

                    <!-- Shipping Options -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.shipping_options_title') }}</h2>
                        <div class="grid md:grid-cols-2 gap-4">
                            <!-- Standard Shipping -->
                            <div class="border-2 border-[#22C55E] rounded-lg p-6">
                                <div class="flex items-center mb-3">
                                    <i class="fas fa-box text-[#22C55E] text-2xl {{ app()->getLocale() === 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                                    <h3 class="text-xl font-bold text-gray-900">{{ __('messages.standard_shipping') }}</h3>
                                </div>
                                <p class="text-gray-700 mb-3">{{ __('messages.standard_shipping_desc') }}</p>
                                <ul class="space-y-2 text-sm text-gray-700">
                                    <li><strong>{{ __('messages.delivery_time') }}</strong> {{ __('messages.standard_delivery_time') }}</li>
                                    <li><strong>{{ __('messages.shipping_cost') }}</strong> {{ __('messages.standard_cost') }}</li>
                                    <li><strong>{{ __('messages.tracking') }}</strong> {{ __('messages.included_tracking') }}</li>
                                    <li><strong>{{ __('messages.insurance') }}</strong> {{ __('messages.standard_insurance') }}</li>
                                </ul>
                            </div>

                            <!-- Express Shipping -->
                            <div class="border-2 border-gray-300 rounded-lg p-6">
                                <div class="flex items-center mb-3">
                                    <i class="fas fa-shipping-fast text-[#22C55E] text-2xl {{ app()->getLocale() === 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                                    <h3 class="text-xl font-bold text-gray-900">{{ __('messages.express_shipping') }}</h3>
                                </div>
                                <p class="text-gray-700 mb-3">{{ __('messages.express_shipping_desc') }}</p>
                                <ul class="space-y-2 text-sm text-gray-700">
                                    <li><strong>{{ __('messages.delivery_time') }}</strong> {{ __('messages.express_delivery_time') }}</li>
                                    <li><strong>{{ __('messages.shipping_cost') }}</strong> {{ __('messages.express_cost') }}</li>
                                    <li><strong>{{ __('messages.tracking') }}</strong> {{ __('messages.real_time_tracking') }}</li>
                                    <li><strong>{{ __('messages.insurance') }}</strong> {{ __('messages.express_insurance') }}</li>
                                </ul>
                            </div>

                            <!-- White Glove Delivery -->
                            <div class="border-2 border-gray-300 rounded-lg p-6">
                                <div class="flex items-center mb-3">
                                    <i class="fas fa-hands-helping text-[#22C55E] text-2xl {{ app()->getLocale() === 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                                    <h3 class="text-xl font-bold text-gray-900">{{ __('messages.white_glove_delivery') }}</h3>
                                </div>
                                <p class="text-gray-700 mb-3">{{ __('messages.white_glove_desc') }}</p>
                                <ul class="space-y-2 text-sm text-gray-700">
                                    <li><strong>{{ __('messages.delivery_time') }}</strong> {{ __('messages.scheduled_appointment') }}</li>
                                    <li><strong>{{ __('messages.shipping_cost') }}</strong> {{ __('messages.white_glove_cost') }}</li>
                                    <li><strong>{{ __('messages.services_included') }}</strong> {{ __('messages.white_glove_services') }}</li>
                                    <li><strong>{{ __('messages.debris_removal') }}</strong> {{ __('messages.included_tracking') }}</li>
                                </ul>
                            </div>

                            <!-- Local Pickup -->
                            <div class="border-2 border-gray-300 rounded-lg p-6">
                                <div class="flex items-center mb-3">
                                    <i class="fas fa-store text-[#22C55E] text-2xl {{ app()->getLocale() === 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                                    <h3 class="text-xl font-bold text-gray-900">{{ __('messages.local_pickup') }}</h3>
                                </div>
                                <p class="text-gray-700 mb-3">{{ __('messages.local_pickup_desc') }}</p>
                                <ul class="space-y-2 text-sm text-gray-700">
                                    <li><strong>{{ __('messages.availability') }}</strong> {{ __('messages.local_pickup_availability') }}</li>
                                    <li><strong>{{ __('messages.shipping_cost') }}</strong> {{ __('messages.free') }}</li>
                                    <li><strong>{{ __('messages.location_pickup') }}</strong> {{ __('messages.pickup_address') }}</li>
                                    <li><strong>{{ __('messages.hours_pickup') }}</strong> {{ __('messages.pickup_hours_desc') }}</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <!-- Processing Time -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.order_processing_time_title') }}</h2>
                        <div class="bg-blue-50 rounded-lg p-6">
                            <p class="text-gray-700 leading-relaxed mb-4">
                                {{ __('messages.order_processing_desc_policy') }}
                            </p>
                            <div class="grid md:grid-cols-3 gap-4 mt-4 text-center">
                                <div>
                                    <div class="text-[#22C55E] text-3xl font-bold mb-2">1-2</div>
                                    <p class="text-sm text-gray-600">{{ __('messages.business_days') }}<br>{{ __('messages.in_stock_items') }}</p>
                                </div>
                                <div>
                                    <div class="text-[#22C55E] text-3xl font-bold mb-2">3-5</div>
                                    <p class="text-sm text-gray-600">{{ __('messages.business_days') }}<br>{{ __('messages.made_to_order') }}</p>
                                </div>
                                <div>
                                    <div class="text-[#22C55E] text-3xl font-bold mb-2">2-4</div>
                                    <p class="text-sm text-gray-600">{{ __('messages.weeks') }}<br>{{ __('messages.custom_orders_time') }}</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Delivery Areas -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.delivery_areas_title') }}</h2>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-[#22C55E] mt-1 {{ app()->getLocale() === 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ __('messages.continental_us') }}</h3>
                                    <p class="text-sm text-gray-600">{{ __('messages.continental_us_desc') }}</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-[#22C55E] mt-1 {{ app()->getLocale() === 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ __('messages.alaska_hawaii') }}</h3>
                                    <p class="text-sm text-gray-600">{{ __('messages.alaska_hawaii_desc') }}</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-globe text-[#22C55E] mt-1 {{ app()->getLocale() === 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ __('messages.intl_shipping') }}</h3>
                                    <p class="text-sm text-gray-600">{{ __('messages.intl_shipping_desc') }}</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Tracking Your Order -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.tracking_order_title') }}</h2>
                        <div class="bg-gray-50 rounded-lg p-6">
                            <p class="text-gray-700 leading-relaxed mb-4">
                                {{ __('messages.tracking_desc_policy') }}
                            </p>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <i class="fas fa-barcode text-[#22C55E] mt-1 {{ app()->getLocale() === 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                                    <span><strong>{{ __('messages.tracking_number_label') }}</strong> {{ __('messages.tracking_number_desc') }}</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-link text-[#22C55E] mt-1 {{ app()->getLocale() === 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                                    <span><strong>{{ __('messages.tracking_link_label') }}</strong> {{ __('messages.tracking_link_desc') }}</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-calendar-alt text-[#22C55E] mt-1 {{ app()->getLocale() === 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                                    <span><strong>{{ __('messages.est_delivery_date') }}</strong> {{ __('messages.est_delivery_desc') }}</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-truck text-[#22C55E] mt-1 {{ app()->getLocale() === 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                                    <span><strong>{{ __('messages.carrier_info_label') }}</strong> {{ __('messages.carrier_info_desc') }}</span>
                                </li>
                            </ul>
                            <div class="mt-4 bg-white border-2 border-[#22C55E] rounded-lg p-4">
                                <p class="text-sm text-gray-700">
                                    <i class="fas fa-info-circle text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                                    <strong>{{ __('messages.track_your_order_now') }}</strong> {{ __('messages.track_your_order_desc') }}
                                </p>
                            </div>
                        </div>
                    </section>

                    <!-- Delivery Instructions -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.delivery_instructions_title') }}</h2>
                        <div class="space-y-4">
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 {{ app()->getLocale() === 'ar' ? 'border-l-0 border-r-4' : '' }}">
                                <h3 class="font-semibold text-gray-900 mb-2">
                                    <i class="fas fa-home text-yellow-600 {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                                    {{ __('messages.someone_present_title') }}
                                </h3>
                                <p class="text-sm text-gray-700">
                                    {{ __('messages.someone_present_desc') }}
                                </p>
                            </div>

                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 {{ app()->getLocale() === 'ar' ? 'border-l-0 border-r-4' : '' }}">
                                <h3 class="font-semibold text-gray-900 mb-2">
                                    <i class="fas fa-clipboard-check text-blue-600 {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                                    {{ __('messages.inspect_delivery_title') }}
                                </h3>
                                <p class="text-sm text-gray-700">
                                    {{ __('messages.inspect_delivery_desc') }}
                                </p>
                            </div>

                            <div class="bg-green-50 border-l-4 border-[#22C55E] p-4 {{ app()->getLocale() === 'ar' ? 'border-l-0 border-r-4' : '' }}">
                                <h3 class="font-semibold text-gray-900 mb-2">
                                    <i class="fas fa-door-open text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                                    {{ __('messages.room_of_choice_title') }}
                                </h3>
                                <p class="text-sm text-gray-700">
                                    {{ __('messages.room_of_choice_desc') }}
                                </p>
                            </div>
                        </div>
                    </section>

                    <!-- Shipping Restrictions -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.shipping_restrictions_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed mb-3">
                            {{ __('messages.shipping_restrictions_p1') }}
                        </p>
                        <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                            <li>{{ __('messages.restriction_po_box') }}</li>
                            <li>{{ __('messages.restriction_oversized') }}</li>
                            <li>{{ __('messages.restriction_remote') }}</li>
                            <li>{{ __('messages.restriction_custom') }}</li>
                            <li>{{ __('messages.restriction_holidays') }}</li>
                        </ul>
                    </section>

                    <!-- Damaged or Lost Shipments -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.damaged_lost_shipments_title') }}</h2>
                        <div class="bg-red-50 rounded-lg p-6">
                            <h3 class="font-semibold text-gray-900 mb-3">{{ __('messages.arrives_damaged_title') }}</h3>
                            <ol class="space-y-2 text-gray-700 mb-4">
                                <li class="flex items-start">
                                    <span class="font-bold text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}">1.</span>
                                    <span>{{ __('messages.damaged_step_1') }}</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="font-bold text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}">2.</span>
                                    <span>{{ __('messages.damaged_step_2') }}</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="font-bold text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}">3.</span>
                                    <span>{!! str_replace('support@bohofurniture.com', '<a href="mailto:support@bohofurniture.com" class="text-[#22C55E] hover:underline">support@bohofurniture.com</a>', __('messages.damaged_step_3')) !!}</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="font-bold text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}">4.</span>
                                    <span>{{ __('messages.damaged_step_4') }}</span>
                                </li>
                            </ol>

                            <h3 class="font-semibold text-gray-900 mb-3 mt-6">{{ __('messages.package_lost_title') }}</h3>
                            <p class="text-gray-700">
                                {{ __('messages.package_lost_p1') }}
                            </p>
                            <ul class="list-disc list-inside text-gray-700 space-y-1 ml-4 mt-2 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                                <li>{{ __('messages.lost_check_neighbors') }}</li>
                                <li>{{ __('messages.lost_verify_address') }}</li>
                                <li>{{ __('messages.lost_contact_7_days') }}</li>
                            </ul>
                        </div>
                    </section>

                    <!-- Holidays & Peak Seasons -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.holidays_seasons_title') }}</h2>
                        <div class="bg-gray-50 rounded-lg p-6">
                            <p class="text-gray-700 leading-relaxed mb-4">
                                {{ __('messages.holidays_seasons_p1') }}
                            </p>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-2">{{ __('messages.peak_season_adjustments') }}</h4>
                                    <ul class="text-sm text-gray-700 space-y-1">
                                        <li>• {{ __('messages.adjustment_processing') }}</li>
                                        <li>• {{ __('messages.adjustment_shipping') }}</li>
                                        <li>• {{ __('messages.adjustment_holiday_cutoff') }}</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-2">{{ __('messages.no_shipping_on') }}</h4>
                                    <ul class="text-sm text-gray-700 space-y-1">
                                        <li>• {{ __('messages.holiday_new_years') }}</li>
                                        <li>• {{ __('messages.holiday_memorial') }}</li>
                                        <li>• {{ __('messages.holiday_independence') }}</li>
                                        <li>• {{ __('messages.holiday_labor') }}</li>
                                        <li>• {{ __('messages.holiday_thanksgiving') }}</li>
                                        <li>• {{ __('messages.holiday_christmas') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Multiple Item Orders -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.multiple_item_orders_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {{ __('messages.multiple_item_orders_p1') }}
                        </p>
                    </section>

                    <!-- Contact Information -->
                    <section class="bg-gray-50 rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.shipping_questions_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            {{ __('messages.shipping_questions_p1') }}
                        </p>
                        <div class="space-y-3 text-gray-700">
                            <p class="flex items-center gap-3">
                                <i class="fas fa-envelope text-[#22C55E] w-5"></i>
                                <span><strong>{{ __('messages.shipping_email') }}</strong> <a href="mailto:shipping@bohofurniture.com"
                                        class="text-[#22C55E] hover:underline">shipping@bohofurniture.com</a></span>
                            </p>
                            <p class="flex items-center gap-3">
                                <i class="fas fa-phone text-[#22C55E] w-5"></i>
                                <span><strong>{{ __('messages.shipping_phone') }}</strong> +201080434434</span>
                            </p>
                            <p class="flex items-center gap-3">
                                <i class="fas fa-clock text-[#22C55E] w-5"></i>
                                <span><strong>{{ __('messages.shipping_hours') }}</strong> {{ __('messages.shipping_hours_desc') }}</span>
                            </p>
                        </div>
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