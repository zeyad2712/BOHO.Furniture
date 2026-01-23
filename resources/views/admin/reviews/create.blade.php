@extends('admin.layouts.app')

@section('page-title', 'Add New Review')

@section('content')
    <div class="p-6" data-aos="fade-up">
        <div class="max-w-3xl mx-auto">
            <!-- Header -->
            <div class="mb-8 flex items-center justify-between">
                <h1 class="text-3xl font-bold" style="color: #8B4513;">
                    <i class="fas fa-plus-circle mr-3 text-[#7b8f5a]"></i>Add New Review
                </h1>
                <a href="{{ route('admin.reviews.index') }}"
                    class="bg-[#7b8f5a] text-white px-5 py-2.5 rounded-xl font-bold hover:bg-[#6c7d4e] transition duration-300 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>Back to List
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 p-8 md:p-12">
                <form action="{{ route('admin.reviews.store') }}" method="POST">
                    @csrf

                    <div class="space-y-6">
                        <!-- Customer Name -->
                        <div>
                            <label for="name" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">
                                Customer Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="w-full px-5 py-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:border-[#7b8f5a] focus:bg-white transition duration-300 outline-none @error('name') border-red-500 @enderror"
                                placeholder="e.g., Maria L." required>
                            @error('name')
                                <p class="mt-2 text-sm text-red-500 font-bold font-mono italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stars Count -->
                        <div>
                            <label for="stars_count"
                                class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">
                                Stars Rating <span class="text-red-500">*</span>
                            </label>
                            <select name="stars_count" id="stars_count"
                                class="w-full px-5 py-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:border-[#7b8f5a] focus:bg-white transition duration-300 outline-none @error('stars_count') border-red-500 @enderror"
                                required>
                                <option value="5" {{ old('stars_count') == 5 ? 'selected' : '' }}>5 Stars</option>
                                <option value="4" {{ old('stars_count') == 4 ? 'selected' : '' }}>4 Stars</option>
                                <option value="3" {{ old('stars_count') == 3 ? 'selected' : '' }}>3 Stars</option>
                                <option value="2" {{ old('stars_count') == 2 ? 'selected' : '' }}>2 Stars</option>
                                <option value="1" {{ old('stars_count') == 1 ? 'selected' : '' }}>1 Star</option>
                            </select>
                            @error('stars_count')
                                <p class="mt-2 text-sm text-red-500 font-bold font-mono italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Review Text -->
                        <div>
                            <label for="review" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">
                                Review Content <span class="text-red-500">*</span>
                            </label>
                            <textarea name="review" id="review" rows="5"
                                class="w-full px-5 py-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:border-[#7b8f5a] focus:bg-white transition duration-300 outline-none @error('review') border-red-500 @enderror"
                                placeholder="What did the customer say?" required>{{ old('review') }}</textarea>
                            @error('review')
                                <p class="mt-2 text-sm text-red-500 font-bold font-mono italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Toggle -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border-2 border-gray-100">
                            <div>
                                <h4 class="font-bold text-gray-800">Review Visibility</h4>
                                <p class="text-xs text-gray-500">Should this review be displayed on the home page?</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked {{ old('is_active') === '0' ? '' : 'checked' }}>
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#7b8f5a]">
                                </div>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-6">
                            <button type="submit"
                                class="w-full py-4 bg-[#7b8f5a] text-white font-bold rounded-xl hover:bg-[#6c7d4e] transition duration-300 shadow-xl shadow-[#7b8f5a]/20 transform active:scale-95 flex items-center justify-center space-x-2">
                                <i class="fas fa-save"></i>
                                <span>Save Review</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection