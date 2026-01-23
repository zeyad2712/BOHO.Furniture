@extends('admin.layouts.app')

@section('page-title', 'Create New Category')

@section('content')
    <div class="min-h-screen py-8" style="background-color: #fefae0;">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-8 flex items-center justify-between">
                <h1 class="text-3xl font-bold" style="color: #8B4513;">
                    <i class="fas fa-plus-circle mr-3 text-[#7b8f5a]"></i>Create Category
                </h1>
                <a href="{{ route('admin.categories.index') }}"
                    class="inline-flex items-center px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-xl transition duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to List
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 p-8 md:p-12">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf

                    <div class="space-y-8">
                        <!-- Category Name -->
                        <div>
                            <label for="name" class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">
                                Category Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                placeholder="e.g., Living Room Furniture"
                                class="w-full px-6 py-4 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:border-[#7b8f5a] focus:bg-white transition duration-300 outline-none @error('name') border-red-500 @enderror"
                                required>
                            @error('name')
                                <p class="mt-2 text-sm text-red-500 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Icon Selection -->
                        <div>
                            <label for="icon" class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">
                                Choose Icon
                            </label>
                            <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 gap-4 mb-4">
                                @php
                                    $icons = ['couch', 'bed', 'chair', 'table', 'lamp', 'rug', 'door-open', 'tv', 'bath', 'utensils', 'folder', 'star', 'heart', 'tag', 'box', 'home'];
                                @endphp
                                @foreach($icons as $icon)
                                    <label class="block relative cursor-pointer group">
                                        <input type="radio" name="icon" value="{{ $icon }}" class="peer hidden" {{ (old('icon') == $icon || ($loop->first && !old('icon'))) ? 'checked' : '' }}>
                                        <div
                                            class="w-full aspect-square bg-gray-50 border-2 border-gray-100 rounded-xl flex items-center justify-center text-gray-400 group-hover:text-[#7b8f5a] group-hover:bg-[#7b8f5a]/5 transition duration-200 peer-checked:border-[#7b8f5a] peer-checked:bg-[#7b8f5a]/5 peer-checked:text-[#7b8f5a] shadow-sm">
                                            <i class="fas fa-{{ $icon }} text-xl"></i>
                                        </div>
                                        <div
                                            class="absolute -top-1 -right-1 w-4 h-4 bg-[#7b8f5a] rounded-full hidden peer-checked:flex items-center justify-center border-2 border-white shadow-sm">
                                            <i class="fas fa-check text-[8px] text-white"></i>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                            <p class="text-xs text-gray-400 italic">Select an icon that best represents this furniture
                                category.</p>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description"
                                class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">
                                Description
                            </label>
                            <textarea name="description" id="description" rows="4"
                                placeholder="Briefly describe what kind of furniture belongs to this category..."
                                class="w-full px-6 py-4 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:border-[#7b8f5a] focus:bg-white transition duration-300 outline-none">{{ old('description') }}</textarea>
                        </div>

                        <!-- Status Toggle -->
                        <div class="flex items-center justify-between p-6 bg-gray-50 rounded-2xl">
                            <div>
                                <h4 class="font-bold text-gray-800">Category Status</h4>
                                <p class="text-sm text-gray-500">Set if this category is visible on the store front.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked {{ old('is_active') === '0' ? '' : 'checked' }}>
                                <div
                                    class="w-14 h-8 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#7b8f5a]">
                                </div>
                            </label>
                        </div>

                        <!-- Submit Actions -->
                        <div class="pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
                            <button type="reset"
                                class="px-8 py-4 font-bold text-gray-500 hover:text-gray-700 transition duration-300">
                                Reset Form
                            </button>
                            <button type="submit"
                                class="px-10 py-4 bg-[#7b8f5a] hover:bg-[#6c7d4e] text-white font-bold rounded-2xl transition duration-300 shadow-xl shadow-[#7b8f5a]/10 transform active:scale-95">
                                <i class="fas fa-check-circle mr-2"></i>
                                Save Category
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection