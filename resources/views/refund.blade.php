@extends('layouts.app')

@section('content')
    <!-- Refund Policy Page -->
    <div class="min-h-screen py-12" style="background-color: #fefae0;"
        dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Page Header -->
            <div data-aos="fade-down" class="mb-8 bg-gradient-to-r from-[#899974] to-[#7a8665] rounded-2xl p-8 text-center">
                <h1 class="text-4xl font-bold text-white mb-3">{{ __('messages.refund_policy_title') }}</h1>
                <p class="text-white opacity-90 text-lg">{{ __('messages.last_updated_refund') }}</p>
            </div>

            <!-- Content -->
            <div data-aos="fade-up" class="bg-white rounded-2xl shadow-lg p-8 space-y-8">

                <!-- Introduction -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.refund_commitment_title') }}
                    </h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __('messages.refund_commitment_p1') }}
                    </p>
                    <div
                        class="mt-4 bg-green-50 border-l-4 border-[#22C55E] p-4 {{ app()->getLocale() === 'ar' ? 'border-l-0 border-r-4' : '' }}">
                        <p class="text-gray-700 font-semibold">
                            <i
                                class="fas fa-shield-alt text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                            {{ __('messages.satisfaction_priority') }}
                        </p>
                        <p class="text-gray-600 text-sm mt-1">{{ __('messages.money_back_guarantee') }}
                        </p>
                    </div>
                </section>

                <!-- 30-Day Return Window -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.return_window_title') }}
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-3">
                        {!! str_replace('30 calendar days', '<strong>30 calendar days</strong>', __('messages.return_window_p1')) !!}
                    </p>
                    <ul
                        class="list-disc list-inside text-gray-700 space-y-2 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                        <li>{{ __('messages.return_eligibility_1') }}</li>
                        <li>{{ __('messages.return_eligibility_2') }}</li>
                        <li>{{ __('messages.return_eligibility_3') }}</li>
                        <li>{{ __('messages.return_eligibility_4') }}</li>
                    </ul>
                </section>

                <!-- How to Initiate a Return -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.initiate_return_title') }}
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-[#22C55E] rounded-full flex items-center justify-center text-white font-bold {{ app()->getLocale() === 'ar' ? 'ml-4' : 'mr-4' }}">
                                1
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">{{ __('messages.step_contact_support') }}</h3>
                                <p class="text-gray-600 text-sm">
                                    {!! str_replace('returns@bohofurniture.com', '<a href="mailto:returns@bohofurniture.com" class="text-[#22C55E] hover:underline">returns@bohofurniture.com</a>', __('messages.step_contact_support_desc')) !!}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-[#22C55E] rounded-full flex items-center justify-center text-white font-bold {{ app()->getLocale() === 'ar' ? 'ml-4' : 'mr-4' }}">
                                2
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">{{ __('messages.step_auth_num') }}</h3>
                                <p class="text-gray-600 text-sm">{{ __('messages.step_auth_num_desc') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-[#22C55E] rounded-full flex items-center justify-center text-white font-bold {{ app()->getLocale() === 'ar' ? 'ml-4' : 'mr-4' }}">
                                3
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">{{ __('messages.step_pack_ship') }}</h3>
                                <p class="text-gray-600 text-sm">{{ __('messages.step_pack_ship_desc') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-[#22C55E] rounded-full flex items-center justify-center text-white font-bold {{ app()->getLocale() === 'ar' ? 'ml-4' : 'mr-4' }}">
                                4
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">{{ __('messages.step_receive_refund') }}</h3>
                                <p class="text-gray-600 text-sm">{{ __('messages.step_receive_refund_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Refund Processing -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.refund_processing_title') }}
                    </h2>
                    <div class="bg-gray-50 rounded-lg p-6 mb-4">
                        <h3 class="font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-clock text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                            {{ __('messages.processing_timeline') }}
                        </h3>
                        <ul class="space-y-2 text-gray-700 text-sm">
                            <li><strong>{{ __('messages.timeline_inspection') }}</strong>
                                {{ __('messages.timeline_inspection_desc') }}</li>
                            <li><strong>{{ __('messages.timeline_approval') }}</strong>
                                {{ __('messages.timeline_approval_desc') }}</li>
                            <li><strong>{{ __('messages.timeline_refund') }}</strong>
                                {{ __('messages.timeline_refund_desc') }}
                            </li>
                            <li><strong>{{ __('messages.timeline_bank') }}</strong> {{ __('messages.timeline_bank_desc') }}
                            </li>
                        </ul>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __('messages.refund_method_desc') }}
                    </p>
                </section>

                <!-- Shipping Costs -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">
                        {{ __('messages.return_shipping_costs_title') }}</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-green-50 border-2 border-[#22C55E] rounded-lg p-4">
                            <h3 class="font-semibold text-gray-900 mb-2 flex items-center">
                                <i
                                    class="fas fa-check-circle text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                                {{ __('messages.we_cover_shipping_title') }}
                            </h3>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>• {{ __('messages.shipping_reason_defective') }}</li>
                                <li>• {{ __('messages.shipping_reason_wrong') }}</li>
                                <li>• {{ __('messages.shipping_reason_mismatch') }}</li>
                            </ul>
                        </div>

                        <div class="bg-yellow-50 border-2 border-yellow-400 rounded-lg p-4">
                            <h3 class="font-semibold text-gray-900 mb-2 flex items-center">
                                <i
                                    class="fas fa-info-circle text-yellow-600 {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                                {{ __('messages.you_cover_shipping_title') }}
                            </h3>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>• {{ __('messages.shipping_reason_mind') }}</li>
                                <li>• {{ __('messages.shipping_reason_error') }}</li>
                                <li>• {{ __('messages.shipping_reason_unneeded') }}</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Non-Refundable Items -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">
                        {{ __('messages.non_refundable_items_title') }}</h2>
                    <p class="text-gray-700 leading-relaxed mb-3">
                        {{ __('messages.non_refundable_p1') }}
                    </p>
                    <div
                        class="bg-red-50 border-l-4 border-red-500 p-4 {{ app()->getLocale() === 'ar' ? 'border-l-0 border-r-4' : '' }}">
                        <ul class="list-disc list-inside text-gray-700 space-y-2">
                            <li><strong>{{ __('messages.item_custom') }}</strong> {{ __('messages.item_custom_desc') }}</li>
                            <li><strong>{{ __('messages.item_clearance') }}</strong>
                                {{ __('messages.item_clearance_desc') }}</li>
                            <li><strong>{{ __('messages.item_gift_cards') }}</strong>
                                {{ __('messages.item_gift_cards_desc') }}</li>
                            <li><strong>{{ __('messages.item_assembled') }}</strong>
                                {{ __('messages.item_assembled_desc') }}</li>
                            <li><strong>{{ __('messages.item_used') }}</strong> {{ __('messages.item_used_desc') }}</li>
                            <li><strong>{{ __('messages.item_no_packaging') }}</strong>
                                {{ __('messages.item_no_packaging_desc') }}</li>
                        </ul>
                    </div>
                </section>

                <!-- Damaged or Defective Items -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.damaged_defective_title') }}
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-3">
                        {{ __('messages.damaged_defective_p1') }}
                    </p>
                    <div class="bg-blue-50 rounded-lg p-6">
                        <ol class="space-y-3 text-gray-700">
                            <li class="flex items-start">
                                <span
                                    class="font-bold text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}">1.</span>
                                <span><strong>{{ __('messages.step_doc_damage') }}</strong>
                                    {{ __('messages.step_doc_damage_desc') }}</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="font-bold text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}">2.</span>
                                <span><strong>{{ __('messages.step_report_issue') }}</strong>
                                    {{ __('messages.step_report_issue_desc') }}</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="font-bold text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}">3.</span>
                                <span><strong>{{ __('messages.step_solution') }}</strong>
                                    {{ __('messages.step_solution_desc') }}</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="font-bold text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}">4.</span>
                                <span><strong>{{ __('messages.step_free_return') }}</strong>
                                    {{ __('messages.step_free_return_desc') }}</span>
                            </li>
                        </ol>
                    </div>
                </section>

                <!-- Exchanges -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.exchanges_title') }}</h2>
                    <p class="text-gray-700 leading-relaxed mb-3">
                        {{ __('messages.exchanges_p1') }}
                    </p>
                    <ul
                        class="list-disc list-inside text-gray-700 space-y-2 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                        <li>{{ __('messages.exchange_step_1') }}</li>
                        <li>{{ __('messages.exchange_step_2') }}</li>
                        <li>{{ __('messages.exchange_step_3') }}</li>
                    </ul>
                    <div
                        class="mt-4 bg-yellow-50 border-l-4 border-yellow-400 p-4 {{ app()->getLocale() === 'ar' ? 'border-l-0 border-r-4' : '' }}">
                        <p class="text-sm text-gray-700">
                            <i
                                class="fas fa-lightbulb text-yellow-600 {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                            <strong>{{ __('messages.pro_tip') }}</strong> {{ __('messages.exchange_pro_tip') }}
                        </p>
                    </div>
                </section>

                <!-- Late or Missing Refunds -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">
                        {{ __('messages.late_missing_refunds_title') }}</h2>
                    <p class="text-gray-700 leading-relaxed mb-3">
                        {{ __('messages.late_missing_p1') }}
                    </p>
                    <ol class="space-y-2 text-gray-700 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                        <li>{{ __('messages.late_step_1') }}</li>
                        <li>{{ __('messages.late_step_2') }}</li>
                        <li>{{ __('messages.late_step_3') }}</li>
                        <li>{{ __('messages.late_step_4') }} <a href="mailto:support@bohofurniture.com"
                                class="text-[#22C55E] hover:underline">support@bohofurniture.com</a></li>
                    </ol>
                </section>

                <!-- Partial Refunds -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.partial_refunds_title') }}
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-3">
                        {{ __('messages.partial_refunds_p1') }}
                    </p>
                    <ul
                        class="list-disc list-inside text-gray-700 space-y-2 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                        <li>{{ __('messages.partial_reason_1') }}</li>
                        <li>{{ __('messages.partial_reason_2') }}</li>
                        <li>{{ __('messages.partial_reason_3') }}</li>
                        <li>{{ __('messages.partial_reason_4') }}</li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed mt-3">
                        {{ __('messages.partial_refund_desc') }}
                    </p>
                </section>

                <!-- Restocking Fee -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.restocking_fees_title') }}
                    </h2>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-700 leading-relaxed mb-3">
                            <strong>{{ __('messages.restocking_good_news') }}</strong> {{ __('messages.restocking_p1') }}
                        </p>
                        <ul
                            class="list-disc list-inside text-gray-700 space-y-2 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                            <li><strong>{{ __('messages.large_items') }}</strong> {{ __('messages.large_items_desc') }}</li>
                            <li><strong>{{ __('messages.special_orders') }}</strong>
                                {{ __('messages.special_orders_desc') }}</li>
                            <li><strong>{{ __('messages.bulk_orders') }}</strong> {{ __('messages.bulk_orders_desc') }}</li>
                        </ul>
                        <p class="text-sm text-gray-600 mt-3 italic">
                            {{ __('messages.fee_comm_desc') }}
                        </p>
                    </div>
                </section>

                <!-- International Returns -->
                <section>
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.intl_returns_title') }}</h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __('messages.intl_returns_p1') }}
                    </p>
                </section>

                <!-- Contact Information -->
                <section class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.refund_questions_title') }}
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('messages.refund_questions_p1') }}
                    </p>
                    <div class="space-y-3 text-gray-700">
                        <p class="flex items-center gap-3">
                            <i class="fas fa-envelope text-[#22C55E] w-5"></i>
                            <span><strong>{{ __('messages.refund_email') }}</strong> <a
                                    href="mailto:returns@bohofurniture.com"
                                    class="text-[#22C55E] hover:underline">returns@bohofurniture.com</a></span>
                        </p>
                        <p class="flex items-center gap-3">
                            <i class="fas fa-phone text-[#22C55E] w-5"></i>
                            <span><strong>{{ __('messages.refund_phone') }}</strong> +1 (555) 123-4567</span>
                        </p>
                        <p class="flex items-center">
                            <i
                                class="fas fa-clock text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-3' : 'mr-3' }} w-5"></i>
                            <span><strong>{{ __('messages.refund_hours') }}</strong>
                                {{ __('messages.refund_hours_desc') }}</span>
                        </p>
                        <p class="flex items-center">
                            <i
                                class="fas fa-map-marker-alt text-[#22C55E] {{ app()->getLocale() === 'ar' ? 'ml-3' : 'mr-3' }} w-5"></i>
                            <span><strong>{{ __('messages.refund_address') }}</strong>
                                {{ __('messages.refund_address_desc') }}</span>
                        </p>
                    </div>
                </section>

                <!-- Policy Updates -->
                <section class="border-t pt-6">
                    <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">
                        {{ __('messages.policy_updates_title_refund') }}</h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __('messages.policy_updates_refund_p1') }}
                    </p>
                </section>

            </div>

            <!-- Back to Home Button -->
            <div class="text-center mt-8">
                <a href="{{ route('home') }}"
                    class="inline-block bg-[#22C55E] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#16A34A] transition duration-300">
                    <i
                        class="fas fa-home {{ app()->getLocale() === 'ar' ? 'ml-2' : 'mr-2' }}"></i>{{ __('messages.back_to_home') }}
                </a>
            </div>

        </div>
    </div>
@endsection