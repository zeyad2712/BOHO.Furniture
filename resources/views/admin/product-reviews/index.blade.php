@extends('admin.layouts.app')

@section('page-title', 'Product Reviews Management')

@section('content')
    <div class="min-h-screen py-8" style="background-color: #fefae0;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-8" data-aos="fade-down" data-aos-duration="800">
                <h1 class="text-3xl font-bold" style="color: #8B4513;">
                    <i class="fas fa-star mr-3"></i>Product Reviews Management
                </h1>
                <p class="text-gray-600 mt-2">Manage customer reviews for all products</p>
            </div>

            <!-- Filters -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                <form method="GET" action="{{ route('admin.product-reviews.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Search -->
                    <div data-aos="fade-right" data-aos-duration="600" data-aos-delay="200">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Search</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                            placeholder="Search reviews...">
                    </div>

                    <!-- Product Filter -->
                    <div data-aos="fade-right" data-aos-duration="600" data-aos-delay="300">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Product</label>
                        <select name="product_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent">
                            <option value="">All Products</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name_en }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Rating Filter -->
                    <div data-aos="fade-left" data-aos-duration="600" data-aos-delay="300">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Rating</label>
                        <select name="rating"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent">
                            <option value="">All Ratings</option>
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>
                                    {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <!-- Sort -->
                    <div data-aos="fade-left" data-aos-duration="600" data-aos-delay="200">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Sort By</label>
                        <select name="sort"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest First</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                            <option value="rating_high" {{ request('sort') == 'rating_high' ? 'selected' : '' }}>Highest Rating</option>
                            <option value="rating_low" {{ request('sort') == 'rating_low' ? 'selected' : '' }}>Lowest Rating</option>
                        </select>
                    </div>

                    <!-- Filter Buttons -->
                    <div class="md:col-span-4 flex gap-3" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="400">
                        <button type="submit"
                            class="px-6 py-2 bg-[#7b8f5a] text-white rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300 transform hover:scale-105">
                            <i class="fas fa-filter mr-2"></i>Apply Filters
                        </button>
                        <a href="{{ route('admin.product-reviews.index') }}"
                            class="px-6 py-2 bg-gray-500 text-white rounded-lg font-semibold hover:bg-gray-600 transition duration-300 transform hover:scale-105">
                            <i class="fas fa-redo mr-2"></i>Reset
                        </a>
                    </div>
                </form>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-lg mb-6 flex items-center" 
                     data-aos="fade-down" data-aos-duration="600">
                    <i class="fas fa-check-circle mr-3 text-xl"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Reviews List -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                @if($reviews->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Product
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Customer
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Rating
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Review
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($reviews as $review)
                                    <tr class="hover:bg-gray-50 transition duration-200" 
                                        data-aos="fade-up" 
                                        data-aos-duration="500" 
                                        data-aos-delay="{{ $loop->index * 50 }}">
                                        <!-- Product -->
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <img src="{{ asset($review->product->image) }}" 
                                                     alt="{{ $review->product->name_en }}"
                                                     class="w-12 h-12 rounded-lg object-cover mr-3 transform hover:scale-110 transition duration-300">
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ Str::limit($review->product->name_en, 30) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Customer -->
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $review->user->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $review->user->email }}</div>
                                        </td>

                                        <!-- Rating -->
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }} text-sm transform hover:scale-125 transition duration-200"></i>
                                                @endfor
                                                <span class="ml-2 text-sm font-semibold text-gray-700">{{ $review->rating }}/5</span>
                                            </div>
                                        </td>

                                        <!-- Review -->
                                        <td class="px-6 py-4">
                                            @if($review->title)
                                                <div class="text-sm font-semibold text-gray-900 mb-1">{{ Str::limit($review->title, 40) }}</div>
                                            @endif
                                            <div class="text-sm text-gray-600">{{ Str::limit($review->comment, 80) }}</div>
                                        </td>

                                        <!-- Date -->
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $review->created_at->format('M d, Y') }}
                                            <div class="text-xs text-gray-400">{{ $review->created_at->diffForHumans() }}</div>
                                        </td>

                                        <!-- Actions -->
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <form action="{{ route('admin.product-reviews.destroy', $review->id) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Are you sure you want to delete this review?');"
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 transition duration-200 transform hover:scale-110">
                                                    <i class="fas fa-trash-alt mr-1"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 border-t border-gray-200" data-aos="fade-up" data-aos-duration="600">
                        {{ $reviews->links() }}
                    </div>
                @else
                    <div class="text-center py-12" data-aos="zoom-in" data-aos-duration="800">
                        <i class="fas fa-comments text-gray-300 text-6xl mb-4"></i>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">No Reviews Found</h3>
                        <p class="text-gray-600">There are no product reviews matching your criteria.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
