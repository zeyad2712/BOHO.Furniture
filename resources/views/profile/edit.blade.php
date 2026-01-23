@extends('layouts.app')

@section('content')
    <!-- Edit Profile Page -->
    <div class="min-h-screen py-12" style="background-color: #fefae0;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Page Header -->
            <div data-aos="fade-down" class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold" style="color: #8B4513;">{{ __('messages.edit_profile') }}</h1>
                    <p class="text-gray-600 mt-2">{{ __('messages.update_account_info') }}</p>
                </div>
                <a href="{{ route('profile') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>{{ __('messages.back_to_profile') }}
                </a>
            </div>

            <!-- Success Message -->
            @if (session('status') === 'profile-updated' || session('status') === 'password-updated')
                <div class="mb-6 bg-green-100 border-l-4 border-[#22C55E] p-4 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-[#22C55E] mr-3"></i>
                        <p class="text-green-700 font-semibold">{{ __('messages.profile_updated_success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Profile Information Form -->
            <div data-aos="fade-up" class="bg-white rounded-2xl shadow-lg p-8 mb-6">
                <h2 class="text-2xl font-bold mb-6" style="color: #8B4513;">{{ __('messages.profile_info') }}</h2>

                <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <!-- Profile Picture -->
                    <div class="flex items-center space-x-6">
                        <div
                            class="w-24 h-24 bg-gradient-to-br from-[#22C55E] to-[#16A34A] rounded-full flex items-center justify-center text-white text-4xl font-bold shadow-lg">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <button type="button"
                                class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition duration-200">
                                <i class="fas fa-camera mr-2"></i>{{ __('messages.change_photo') }}
                            </button>
                            <p class="text-sm text-gray-500 mt-2">JPG, PNG or GIF. Max size 2MB</p>
                        </div>
                    </div>

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Full Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full p-2" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full p-2"
                            :value="old('email', $user->email)" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div class="mt-2">
                                <p class="text-sm text-gray-800">
                                    {{ __('messages.unverified_email') }}
                                    <button form="send-verification"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#22C55E]">
                                        {{ __('messages.resend_verification') }}
                                    </button>
                                </p>
                            </div>
                        @endif
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <x-input-label for="phone" :value="__('Phone Number')" />
                        <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full p-2"
                            value="{{ old('phone', $user->phone) }}" autocomplete="tel" />
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>

                    <!-- Save Button -->
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('messages.save_changes') }}</x-primary-button>
                    </div>
                </form>
            </div>

            <!-- Update Password Form -->
            <div data-aos="fade-up" data-aos-delay="100" class="bg-white rounded-2xl shadow-lg p-8 mb-6">
                <h2 class="text-2xl font-bold mb-6" style="color: #8B4513;">{{ __('messages.update_password') }}</h2>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Current Password -->
                    <div>
                        <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                        <x-text-input id="update_password_current_password" name="current_password" type="password"
                            class="mt-1 block w-full p-2" autocomplete="current-password" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>

                    <!-- New Password -->
                    <div>
                        <x-input-label for="update_password_password" :value="__('New Password')" />
                        <x-text-input id="update_password_password" name="password" type="password"
                            class="mt-1 block w-full p-2" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                            type="password" class="mt-1 block w-full p-2" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Save Button -->
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('messages.update_password') }}</x-primary-button>
                    </div>
                </form>
            </div>

            <!-- Delete Account Section -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border-2 border-red-200">
                <h2 class="text-2xl font-bold mb-4 text-red-600">{{ __('messages.delete_account') }}</h2>
                <p class="text-gray-600 mb-6">
                    {{ __('messages.delete_account_desc') }}
                </p>

                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    class="bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition duration-300">
                    <i class="fas fa-trash mr-2"></i>{{ __('messages.delete_account') }}
                </button>
            </div>

        </div>
    </div>

    <!-- Delete Account Confirmation Modal -->
    <div x-data="{ show: false }" x-on:open-modal.window="$event.detail == 'confirm-user-deletion' ? show = true : null"
        x-on:close-modal.window="show = false" x-show="show" class="fixed inset-0 z-50 overflow-y-auto"
        style="display: none;">

        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" x-on:click="show = false"></div>

        <!-- Modal -->
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="relative bg-white rounded-2xl shadow-xl max-w-md w-full p-6" x-on:click.away="show = false">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ __('messages.are_you_sure') }}</h3>
                <p class="text-gray-600 mb-6">
                    Once your account is deleted, all of its resources and data will be permanently deleted. Please enter
                    your password to confirm you would like to permanently delete your account.
                </p>

                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <div class="mb-6">
                        <x-input-label for="password" value="Password" class="sr-only" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                            placeholder="Password" />
                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" x-on:click="show = false"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition duration-200">
                            {{ __('messages.cancel') }}
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition duration-200">
                            {{ __('messages.delete_account') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection