@extends('admin.layouts.app')

@section('page-title', 'Manage Reviews')

@section('content')
    <div class="p-6" data-aos="fade-up">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="mb-8 flex items-center justify-between">
                <h1 class="text-3xl font-bold" style="color: #8B4513;">
                    <i class="fas fa-star mr-3 text-[#7b8f5a]"></i>Customer Reviews
                </h1>
                <a href="{{ route('admin.reviews.create') }}"
                    class="bg-[#7b8f5a] text-white px-6 py-3 rounded-xl font-bold hover:bg-[#6c7d4e] transition duration-300 shadow-lg shadow-[#7b8f5a]/20 flex items-center">
                    <i class="fas fa-plus mr-2"></i>Add New Review
                </a>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-[#7b8f5a]/10 border-l-4 border-[#7b8f5a] text-[#7b8f5a] rounded-r-xl">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-3"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Table -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100">
                                <th class="px-6 py-4 text-sm font-bold text-gray-700 uppercase">Customer</th>
                                <th class="px-6 py-4 text-sm font-bold text-gray-700 uppercase">Rating</th>
                                <th class="px-6 py-4 text-sm font-bold text-gray-700 uppercase">Review</th>
                                <th class="px-6 py-4 text-sm font-bold text-gray-700 uppercase">Status</th>
                                <th class="px-6 py-4 text-sm font-bold text-gray-700 uppercase text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($reviews as $review)
                                <tr class="hover:bg-[#7b8f5a]/5 transition duration-200">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-[#7b8f5a]/10 text-[#7b8f5a] rounded-full flex items-center justify-center font-bold mr-3 uppercase">
                                                {{ substr($review->name, 0, 1) }}
                                            </div>
                                            <span class="font-bold text-gray-800">{{ $review->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex text-yellow-400">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= $review->stars_count ? '' : 'text-gray-200' }}"></i>
                                            @endfor
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-sm text-gray-600 line-clamp-2 max-w-md">{{ $review->review }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($review->is_active)
                                            <span class="px-3 py-1 bg-[#7b8f5a]/10 text-[#7b8f5a] rounded-full text-xs font-bold border border-[#7b8f5a]/20">Active</span>
                                        @else
                                            <span class="px-3 py-1 bg-gray-100 text-gray-500 rounded-full text-xs font-bold border border-gray-200">Hidden</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('admin.reviews.edit', $review->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-200">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this review?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 transition duration-200">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500 italic">
                                        No reviews found. Click "Add New Review" to get started.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($reviews->hasPages())
                    <div class="p-6 bg-gray-50 border-t border-gray-100">
                        {{ $reviews->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
