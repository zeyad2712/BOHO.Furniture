@extends('admin.layouts.app')

@section('page-title', 'Create New User')

@section('content')
    <div class="min-h-screen py-8" style="background-color: #fefae0;">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-8 flex items-center justify-between">
                <h1 class="text-3xl font-bold" style="color: #8B4513;">
                    <i class="fas fa-user-plus mr-3 text-[#7b8f5a]"></i>Add User / Admin
                </h1>
                <a href="{{ route('admin.users.index') }}"
                    class="inline-flex items-center px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-xl transition duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to List
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 p-8 md:p-12">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="space-y-8">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="e.g., John Doe"
                                class="w-full px-6 py-4 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:border-[#7b8f5a] focus:bg-white transition duration-300 outline-none @error('name') border-red-500 @enderror"
                                required>
                            @error('name')
                                <p class="mt-2 text-sm text-red-500 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                placeholder="e.g., john@example.com"
                                class="w-full px-6 py-4 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:border-[#7b8f5a] focus:bg-white transition duration-300 outline-none @error('email') border-red-500 @enderror"
                                required>
                            @error('email')
                                <p class="mt-2 text-sm text-red-500 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Role Selection -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">
                                Account Role <span class="text-red-500">*</span>
                            </label>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="role" value="user" class="peer hidden" {{ old('role', 'user') == 'user' ? 'checked' : '' }}>
                                    <div
                                        class="px-6 py-4 bg-gray-50 border-2 border-gray-100 rounded-2xl flex items-center justify-center space-x-3 text-gray-500 peer-checked:border-[#7b8f5a] peer-checked:bg-[#7b8f5a]/5 peer-checked:text-[#7b8f5a] transition duration-200">
                                        <i class="fas fa-user"></i>
                                        <span class="font-bold">Customer</span>
                                    </div>
                                </label>
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="role" value="admin" class="peer hidden" {{ old('role') == 'admin' ? 'checked' : '' }}>
                                    <div
                                        class="px-6 py-4 bg-gray-50 border-2 border-gray-100 rounded-2xl flex items-center justify-center space-x-3 text-gray-500 peer-checked:border-purple-500 peer-checked:bg-purple-50 peer-checked:text-purple-600 transition duration-200">
                                        <i class="fas fa-shield-alt"></i>
                                        <span class="font-bold">Admin</span>
                                    </div>
                                </label>
                            </div>
                            @error('role')
                                <p class="mt-2 text-sm text-red-500 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="password"
                                    class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">
                                    Password <span class="text-red-500">*</span>
                                </label>
                                <input type="password" name="password" id="password"
                                    class="w-full px-6 py-4 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:border-[#7b8f5a] focus:bg-white transition duration-300 outline-none @error('password') border-red-500 @enderror"
                                    required>
                                @error('password')
                                    <p class="mt-2 text-sm text-red-500 font-bold">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation"
                                    class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">
                                    Confirm Password <span class="text-red-500">*</span>
                                </label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="w-full px-6 py-4 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:border-[#7b8f5a] focus:bg-white transition duration-300 outline-none"
                                    required>
                            </div>
                        </div>

                        <!-- Info Box -->
                        <div class="p-6 bg-blue-50 border border-blue-100 rounded-2xl flex items-start space-x-4">
                            <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                            <p class="text-sm text-blue-700 leading-relaxed">
                                <strong>Note:</strong> Creating an <strong>Admin</strong> account will store the credentials
                                in the <code>admins</code> table. Admins have full access to management features. Customers
                                are stored in the <code>users</code> table.
                            </p>
                        </div>

                        <!-- Submit Actions -->
                        <div class="pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
                            <button type="reset"
                                class="px-8 py-4 font-bold text-gray-500 hover:text-gray-700 transition duration-300">
                                Reset
                            </button>
                            <button type="submit"
                                class="px-10 py-4 bg-[#7b8f5a] hover:bg-[#6c7d4e] text-white font-bold rounded-2xl transition duration-300 shadow-xl shadow-[#7b8f5a]/10 transform active:scale-95">
                                <i class="fas fa-check-circle mr-2"></i>
                                Create Account
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection