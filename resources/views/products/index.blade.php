@extends('layouts.app')

@section('title', __('messages.all_products') . ' | BOHO Furniture')
@section('meta_description', __('messages.discover_collection'))

@section('content')

    <!-- Products Page -->
    <section class="py-12" style="min-height: 100vh;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Page Header -->
            <div class="text-center mb-8" data-aos="fade-down">
                <h1 class="text-4xl md:text-5xl font-bold mb-4" style="color: #8B4513;">
                    {{ __('messages.all_products') }}
                </h1>
                <p class="text-gray-600 text-lg">
                    {{ __('messages.discover_collection') }}
                </p>
            </div>

            <!-- Filters Section -->
            <form data-aos="fade-up" method="GET" action="{{ route('products') }}"
                class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">

                    <!-- Search -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('messages.search') }}</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="{{ __('messages.search_products') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent">
                    </div>

                    <!-- Category Filter -->
                    <div>
                        <label
                            class="block text-sm font-semibold text-gray-700 mb-2">{{ __('messages.categories') }}</label>
                        <select name="category"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent">
                            <option value="">{{ __('messages.all') }}</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price Range -->
                    <div>
                        <label
                            class="block text-sm font-semibold text-gray-700 mb-2">{{ __('messages.price_range') }}</label>
                        <div class="flex items-center gap-2">
                            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="0" min="0"
                                class="w-1/2 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent">
                            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="2000"
                                max="2000"
                                class="w-1/2 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent">
                        </div>
                    </div>

                    <!-- Min Rating -->
                    <div>
                        <label
                            class="block text-sm font-semibold text-gray-700 mb-2">{{ __('messages.min_rating') }}</label>
                        <select name="min_rating"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent">
                            <option value="">{{ __('messages.any_rating') }}</option>
                            <option value="4" {{ request('min_rating') == '4' ? 'selected' : '' }}>4+ Stars</option>
                            <option value="4.5" {{ request('min_rating') == '4.5' ? 'selected' : '' }}>4.5+ Stars</option>
                            <option value="5" {{ request('min_rating') == '5' ? 'selected' : '' }}>5 Stars</option>
                        </select>
                    </div>

                    <!-- Sort By -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('messages.sort_by') }}</label>
                        <select name="sort"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent">
                            <option value="name-asc" {{ request('sort') == 'name-asc' ? 'selected' : '' }}>
                                {{ __('messages.name_asc') }}
                            </option>
                            <option value="name-desc" {{ request('sort') == 'name-desc' ? 'selected' : '' }}>
                                {{ __('messages.name_desc') }}
                            </option>
                            <option value="price-asc" {{ request('sort') == 'price-asc' ? 'selected' : '' }}>
                                {{ __('messages.price_asc') }}
                            </option>
                            <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>
                                {{ __('messages.price_desc') }}
                            </option>
                            <option value="rating-desc" {{ request('sort') == 'rating-desc' ? 'selected' : '' }}>
                                {{ __('messages.rating_desc') }}
                            </option>
                        </select>
                    </div>

                </div>

                <!-- Filter Buttons -->
                <div class="mt-4 flex space-x-3">
                    <a href="{{ route('products') }}"
                        class="text-black px-6 py-2 border-2 border-[#7b8f5a] rounded-lg font-semibold hover:bg-gray-50 transition duration-300">
                        {{ __('messages.clear_filters') }}
                    </a>
                    <button type="submit"
                        class="bg-[#7b8f5a] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300">
                        {{ __('messages.apply_filters') }}
                    </button>
                </div>
            </form>

            <!-- Products Count -->
            <div class="flex justify-between items-center mb-6" data-aos="fade-right">
                <p class="text-gray-700 font-semibold">
                    <span class="text-[#7b8f5a]">{{ $products->total() }}</span> {{ __('messages.products_found') }}
                </p>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach($products as $product)
                    <!-- <a href="{{ route('products.show', $product->id) }}"> -->
                    <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 100 }}"
                        class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 group">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                            <!-- Discount Badge -->
                            @if($product->discount_percentage > 0)
                                <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full font-bold text-sm">
                                    -{{ $product->discount_percentage }}%
                                </div>
                            @endif
                        </div>

                        <!-- Product Info -->
                        <div class="p-3 space-y-2">
                            <!-- Category -->
                            <p class="text-[#7b8f5a] text-xs font-bold uppercase tracking-wide">{{ $product->category->name }}
                            </p>

                            <!-- Product Name -->
                            <h3 class="text-gray-800 font-bold text-lg leading-tight">{{ $product->display_name }}</h3>

                            <!-- Rating -->
                            <div class="flex items-center space-x-1">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($product->rating))
                                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                                    @elseif($i - 0.5 <= $product->rating)
                                        <i class="fas fa-star-half-alt text-yellow-400 text-sm"></i>
                                    @else
                                        <i class="far fa-star text-yellow-400 text-sm"></i>
                                    @endif
                                @endfor
                                <span class="text-gray-500 text-sm ml-2">({{ $product->reviews_count }})</span>
                            </div>

                            <!-- Price -->
                            <div class="flex items-center space-x-2">
                                <span class="text-[#7b8f5a] text-2xl font-bold">EGP
                                    {{ number_format($product->price, 2) }}</span>
                                @if($product->original_price)
                                    <span class="text-gray-400 line-through text-sm">EGP
                                        {{ number_format($product->original_price, 2) }}</span>
                                @endif
                            </div>

                            <div class="flex gap-2">
                                <!-- View Details Button -->
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="w-full bg-[#7b8f5a] text-white py-2 rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300 flex items-center justify-center gap-2">
                                    <i class="fas fa-eye"></i>
                                    <span>{{ __('messages.view_details') }}</span>
                                </a>
                                <!-- Add to Wishlist Button -->
                                <button type="button" onclick="addToWishlist({{ $product->id }})"
                                    id="wishlist-btn-{{ $product->id }}"
                                    class="bg-[#7b8f5a] text-white py-2 px-3 rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300 flex items-center justify-center gap-2">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- </a> -->
                @endforeach

            </div>

            <!-- Pagination -->
            <div class="mt-12" data-aos="fade-up">
                {{ $products->links() }}
            </div>

            <!-- Empty State (if no products) -->
            @if($products->count() === 0)
                <div class="text-center py-16" data-aos="zoom-in">
                    <i class="fas fa-box-open text-gray-300 text-6xl mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">{{ __('messages.no_products_found') }}</h3>
                    <p class="text-gray-500">{{ __('messages.adjust_filters') }}</p>
                </div>
            @endif

        </div>
    </section>

@endsection

<!-- Wishlist JavaScript -->
<script>
    function addToWishlist(productId) {
        const btn = document.getElementById('wishlist-btn-' + productId);
        const originalContent = btn.innerHTML;

        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

        fetch('{{ route("wishlist.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ product_id: productId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    btn.classList.remove('bg-[#7b8f5a]', 'hover:bg-[#6c7d4e]');
                    btn.classList.add('bg-gray-400', 'cursor-not-allowed');
                    btn.innerHTML = '<i class="fas fa-check"></i>';
                    showMessage(data.message, 'success');
                } else {
                    btn.disabled = false;
                    btn.innerHTML = originalContent;
                    showMessage(data.message, 'error');
                }
            })
            .catch(error => {
                showMessage('Please login to add items to your wishlist.', 'error');
                setTimeout(() => { window.location.href = '{{ route("login") }}'; }, 1500);
            });
    }

    function showMessage(message, type) {
        const alertDiv = document.createElement('div');
        alertDiv.className = 'fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg ' + (type === 'success' ? 'bg-[#7b8f5a]' : 'bg-red-500') + ' text-white font-semibold';
        alertDiv.innerHTML = '<div class="flex items-center"><i class="fas fa-' + (type === 'success' ? 'check-circle' : 'exclamation-circle') + ' mr-3"></i><span>' + message + '</span></div>';
        document.body.appendChild(alertDiv);
        setTimeout(() => { alertDiv.remove(); }, 3000);
    }
</script>