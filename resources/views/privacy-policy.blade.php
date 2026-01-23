@extends('layouts.app')

@section('content')
    <!-- Privacy Policy Page -->
    <div class="min-h-screen py-12" style="background-color: #fefae0;"dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div data-aos="fade-down" class="bg-gradient-to-r from-[#899974] to-[#7a8665] rounded-2xl p-8 mb-8 text-center">
                    <h1 class="text-4xl font-bold text-white mb-3">{{ __('messages.privacy_policy_title') }}</h1>
                    <p class="text-white opacity-90 text-lg">{{ __('messages.last_updated') }}: {{ __('messages.january_8_2026') }}</p>
                </div>

                <!-- Content -->
                <div data-aos="fade-up" class="bg-white rounded-2xl shadow-lg p-8 space-y-8">

                    <!-- Introduction -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.privacy_intro_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {{ __('messages.privacy_intro_p1') }}
                        </p>
                        <div class="mt-4 bg-green-50 border-l-4 border-[#22C55E] p-4 {{ app()->getLocale() === 'ar' ? 'border-l-0 border-r-4' : '' }}">
                            <p class="text-gray-700 font-semibold">{{ __('messages.your_privacy_matters') }}</p>
                            <p class="text-gray-600 text-sm">{{ __('messages.privacy_never_sell') }}</p>
                        </div>
                    </section>

                    <!-- Information We Collect -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.info_we_collect_title') }}</h2>

                        <h3 class="text-xl font-semibold mb-3 text-gray-800">{{ __('messages.personal_info_title') }}</h3>
                        <p class="text-gray-700 leading-relaxed mb-3">
                            {{ __('messages.personal_info_p1') }}
                        </p>
                        <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4 mb-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                            <li>{{ __('messages.create_account') }}</li>
                            <li>{{ __('messages.make_purchase_order') }}</li>
                            <li>{{ __('messages.subscribe_newsletter') }}</li>
                            <li>{{ __('messages.contact_support') }}</li>
                            <li>{{ __('messages.participate_surveys') }}</li>
                        </ul>

                        <h3 class="text-xl font-semibold mb-3 text-gray-800">{{ __('messages.info_included_title') }}</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-800 mb-2">
                                    <i class="fas fa-user text-[#22C55E] me-2"></i>{{ __('messages.personal_details') }}
                                </h4>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <li>• {{ __('messages.name') }}</li>
                                    <li>• {{ __('messages.email_address') }}</li>
                                    <li>• {{ __('messages.phone_number') }}</li>
                                    <li>• {{ __('messages.dob') }}</li>
                                </ul>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-800 mb-2">
                                    <i class="fas fa-map-marker-alt text-[#22C55E] me-2"></i>{{ __('messages.address_info') }}
                                </h4>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <li>• {{ __('messages.billing_address') }}</li>
                                    <li>• {{ __('messages.shipping_address') }}</li>
                                    <li>• {{ __('messages.city_state_zip') }}</li>
                                    <li>• {{ __('messages.country') }}</li>
                                </ul>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-800 mb-2">
                                    <i class="fas fa-credit-card text-[#22C55E] me-2"></i>{{ __('messages.payment_info_title') }}
                                </h4>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <li>• {{ __('messages.card_details') }}</li>
                                    <li>• {{ __('messages.billing_info') }}</li>
                                    <li>• {{ __('messages.transaction_history') }}</li>
                                </ul>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-800 mb-2">
                                    <i class="fas fa-shopping-bag text-[#22C55E] me-2"></i>{{ __('messages.order_info') }}
                                </h4>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <li>• {{ __('messages.purchase_history') }}</li>
                                    <li>• {{ __('messages.product_preferences') }}</li>
                                    <li>• {{ __('messages.wishlist_items') }}</li>
                                </ul>
                            </div>
                        </div>

                        <h3 class="text-xl font-semibold mb-3 text-gray-800 mt-6">{{ __('messages.auto_collected_info') }}</h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                            <li>{{ __('messages.ip_browser') }}</li>
                            <li>{{ __('messages.device_os') }}</li>
                            <li>{{ __('messages.pages_visited') }}</li>
                            <li>{{ __('messages.referring_sites') }}</li>
                            <li>{{ __('messages.cookies_tech') }}</li>
                        </ul>
                    </section>

                    <!-- How We Use Your Information -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.how_we_use_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed mb-3">
                            {{ __('messages.how_we_use_p1') }}
                        </p>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-check-circle text-[#22C55E] mt-1"></i>
                                <div>
                                    <strong class="text-gray-900">{{ __('messages.order_processing') }}</strong>
                                    <span class="text-gray-700"> {{ __('messages.order_processing_desc') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-check-circle text-[#22C55E] mt-1"></i>
                                <div>
                                    <strong class="text-gray-900">{{ __('messages.customer_service') }}</strong>
                                    <span class="text-gray-700"> {{ __('messages.customer_service_desc') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-check-circle text-[#22C55E] mt-1"></i>
                                <div>
                                    <strong class="text-gray-900">{{ __('messages.marketing_comm') }}</strong>
                                    <span class="text-gray-700"> {{ __('messages.marketing_comm_desc') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-check-circle text-[#22C55E] mt-1"></i>
                                <div>
                                    <strong class="text-gray-900">{{ __('messages.website_improvement') }}</strong>
                                    <span class="text-gray-700"> {{ __('messages.website_improvement_desc') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-check-circle text-[#22C55E] mt-1"></i>
                                <div>
                                    <strong class="text-gray-900">{{ __('messages.fraud_prevention') }}</strong>
                                    <span class="text-gray-700"> {{ __('messages.fraud_prevention_desc') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-check-circle text-[#22C55E] mt-1"></i>
                                <div>
                                    <strong class="text-gray-900">{{ __('messages.legal_compliance') }}</strong>
                                    <span class="text-gray-700"> {{ __('messages.legal_compliance_desc') }}</span>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Information Sharing -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.info_sharing_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed mb-3">
                            {{ __('messages.info_sharing_p1') }}
                        </p>
                        <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                            <li><strong>{{ __('messages.service_providers') }}</strong> {{ __('messages.service_providers_desc') }}</li>
                            <li><strong>{{ __('messages.business_partners') }}</strong> {{ __('messages.business_partners_desc') }}</li>
                            <li><strong>{{ __('messages.legal_requirements') }}</strong> {{ __('messages.legal_requirements_desc') }}
                            </li>
                            <li><strong>{{ __('messages.business_transfers') }}</strong> {{ __('messages.business_transfers_desc') }}
                            </li>
                        </ul>
                        <div class="mt-4 bg-yellow-50 border-s-4 border-yellow-400 p-4">
                            <p class="text-gray-700 font-semibold">{{ __('messages.important_note') }}</p>
                            <p class="text-gray-600 text-sm">{{ __('messages.no_sell_rent_trade') }}</p>
                        </div>
                    </section>

                    <!-- Cookies and Tracking -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.cookies_tracking_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed mb-3">
                            {{ __('messages.cookies_tracking_p1') }}
                        </p>
                        <div class="space-y-3">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-800 mb-2">{{ __('messages.essential_cookies') }}</h4>
                                <p class="text-sm text-gray-600">{{ __('messages.essential_cookies_desc') }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-800 mb-2">{{ __('messages.performance_cookies') }}</h4>
                                <p class="text-sm text-gray-600">{{ __('messages.performance_cookies_desc') }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-800 mb-2">{{ __('messages.marketing_cookies') }}</h4>
                                <p class="text-sm text-gray-600">{{ __('messages.marketing_cookies_desc') }}</p>
                            </div>
                        </div>
                        <p class="text-gray-700 text-sm mt-3">
                            {{ __('messages.control_cookies') }}
                        </p>
                    </section>

                    <!-- Data Security -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.data_security_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed mb-3">
                            {{ __('messages.data_security_p1') }}
                        </p>
                        <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4 {{ app()->getLocale() === 'ar' ? 'ml-0 mr-4' : '' }}">
                            <li>{{ __('messages.ssl_encryption') }}</li>
                            <li>{{ __('messages.secure_payment') }}</li>
                            <li>{{ __('messages.regular_audits') }}</li>
                            <li>{{ __('messages.access_controls') }}</li>
                            <li>{{ __('messages.employee_training') }}</li>
                        </ul>
                        <p class="text-gray-600 text-sm mt-3 italic">
                            {{ __('messages.security_disclaimer') }}
                        </p>
                    </section>

                    <!-- Your Rights -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.privacy_rights_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed mb-3">
                            {{ __('messages.privacy_rights_p1') }}
                        </p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="border-s-4 border-[#22C55E] ps-4">
                                <h4 class="font-semibold text-gray-800 mb-1">{{ __('messages.rights_access') }}</h4>
                                <p class="text-sm text-gray-600">{{ __('messages.rights_access_desc') }}</p>
                            </div>
                            <div class="border-s-4 border-[#22C55E] ps-4">
                                <h4 class="font-semibold text-gray-800 mb-1">{{ __('messages.rights_correction') }}</h4>
                                <p class="text-sm text-gray-600">{{ __('messages.rights_correction_desc') }}</p>
                            </div>
                            <div class="border-s-4 border-[#22C55E] ps-4">
                                <h4 class="font-semibold text-gray-800 mb-1">{{ __('messages.rights_deletion') }}</h4>
                                <p class="text-sm text-gray-600">{{ __('messages.rights_deletion_desc') }}</p>
                            </div>
                            <div class="border-s-4 border-[#22C55E] ps-4">
                                <h4 class="font-semibold text-gray-800 mb-1">{{ __('messages.rights_opt_out') }}</h4>
                                <p class="text-sm text-gray-600">{{ __('messages.rights_opt_out_desc') }}</p>
                            </div>
                            <div class="border-s-4 border-[#22C55E] ps-4">
                                <h4 class="font-semibold text-gray-800 mb-1">{{ __('messages.rights_portability') }}</h4>
                                <p class="text-sm text-gray-600">{{ __('messages.rights_portability_desc') }}</p>
                            </div>
                            <div class="border-s-4 border-[#22C55E] ps-4">
                                <h4 class="font-semibold text-gray-800 mb-1">{{ __('messages.rights_object') }}</h4>
                                <p class="text-sm text-gray-600">{{ __('messages.rights_object_desc') }}</p>
                            </div>
                        </div>
                    </section>

                    <!-- Data Retention -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.data_retention_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {{ __('messages.data_retention_p1') }}
                        </p>
                    </section>

                    <!-- Children's Privacy -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.children_privacy_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {{ __('messages.children_privacy_p1') }}
                        </p>
                    </section>

                    <!-- Third-Party Links -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.third_party_links_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {{ __('messages.third_party_links_p1') }}
                        </p>
                    </section>

                    <!-- International Transfers -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.intl_transfers_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {{ __('messages.intl_transfers_p1') }}
                        </p>
                    </section>

                    <!-- Changes to Privacy Policy -->
                    <section>
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.policy_changes_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {{ __('messages.policy_changes_p1') }}
                        </p>
                    </section>

                    <!-- Contact Information -->
                    <section class="bg-gray-50 rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-4" style="color: #8B4513;">{{ __('messages.contact_us_title') }}</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            {{ __('messages.privacy_contact_p1') }}
                        </p>
                        <div class="space-y-3 text-gray-700">
                            <p class="flex items-center gap-3">
                                <i class="fas fa-envelope text-[#22C55E] w-5"></i>
                                <span><strong>{{ __('messages.privacy_email') }}</strong> privacy@bohofurniture.com</span>
                            </p>
                            <p class="flex items-center gap-3">
                                <i class="fas fa-phone text-[#22C55E] w-5"></i>
                                <span><strong>{{ __('messages.privacy_phone') }}</strong> +201080434434</span>
                            </p>
                            <p class="flex items-center gap-3">
                                <i class="fas fa-map-marker-alt text-[#22C55E] w-5"></i>
                                <span><strong>{{ __('messages.privacy_address') }}</strong> Armed Forces Buildings, Tower 6, Degla, Maadi, Cairo, Egypt</span>
                            </p>
                            <p class="flex items-center gap-3">
                                <i class="fas fa-clock text-[#22C55E] w-5"></i>
                                <span><strong>{{ __('messages.privacy_hours') }}</strong> {{ __('messages.privacy_hours_desc') }}</span>
                            </p>
                        </div>
                    </section>

                    <!-- Consent -->
                    <section class="border-t pt-6">
                        <p class="text-gray-600 text-sm italic">
                            {{ __('messages.consent_text') }}
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