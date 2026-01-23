@extends('layouts.app')

@section('title', $product->display_name . ' | BOHO Furniture')
@section('meta_description', Str::limit(strip_tags($product->display_description), 160))
@section('og_image', asset($product->image))

@section('meta')
    <!-- JSON-LD for Product Schema -->
    <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "Product",
                "name": "{{ $product->display_name }}",
                "image": "{{ asset($product->image) }}",
                "description": "{{ Str::limit(strip_tags($product->display_description), 160) }}",
                "brand": {
                    "@type": "Brand",
                    "name": "BOHO Furniture"
                },
                "offers": {
                    "@type": "Offer",
                    "url": "{{ url()->current() }}",
                    "priceCurrency": "EGP",
                    "price": "{{ $product->price }}",
                    "availability": "https://schema.org/{{ $product->stock > 0 ? 'InStock' : 'OutOfStock' }}",
                    "itemCondition": "https://schema.org/NewCondition"
                },
                "aggregateRating": {
                    "@type": "AggregateRating",
                    "ratingValue": "{{ $product->rating }}",
                    "reviewCount": "{{ $product->reviews_count }}"
                }
            }
            </script>
@endsection

@section('content')

    <!-- Product Details Page -->
    <section class="py-8" style="min-height: 100vh;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb -->
            <nav class="mb-6" data-aos="fade-right">
                <ol class="flex items-center gap-2 text-sm text-gray-600">
                    <li><a href="{{ route('home') }}"
                            class="hover:text-[#7b8f5a] transition duration-200">{{ __('messages.home') }}</a></li>
                    <li><i class="fas fa-chevron-right text-xs rtl:rotate-180"></i></li>
                    <li><a href="{{ route('products') }}"
                            class="hover:text-[#7b8f5a] transition duration-200">{{ __('messages.products') }}</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-xs rtl:rotate-180"></i></li>
                    <li class="text-gray-800 font-semibold">{{ $product->display_name }}</li>
                </ol>
            </nav>

            <!-- Product Content -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                <!-- Left: Product Images -->
                <div data-aos="fade-right" x-data="{ 
                                                                        activeImage: '{{ asset($product->image) }}',
                                                                        images: [
                                                                            '{{ asset($product->image) }}',
                                                                            @foreach($product->images as $img)
                                                                                '{{ asset($img->image_path) }}',
                                                                            @endforeach
                                                                        ]
                                                                    }">
                    <!-- Main Image Display -->
                    <div class="bg-white rounded-3xl overflow-hidden shadow-2xl mb-6 relative group aspect-square">
                        <img :src="activeImage" alt="{{ $product->display_name }}"
                            class="w-full h-full object-cover transition duration-700 group-hover:scale-110">

                        <!-- Zoom Overlay (Optional) -->
                        <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition duration-300">
                        </div>
                    </div>

                    <!-- Thumbnails Gallery -->
                    <div class="grid grid-cols-4 sm:grid-cols-5 gap-4">
                        <!-- Main Image Thumbnail -->
                        <button @click="activeImage = '{{ asset($product->image) }}'"
                            :class="activeImage === '{{ asset($product->image) }}' ? 'ring-2 ring-[#7b8f5a] opacity-100 scale-105' : 'opacity-60 grayscale hover:grayscale-0 hover:opacity-100'"
                            class="aspect-square rounded-xl overflow-hidden bg-white shadow-md transition duration-300 transform">
                            <img src="{{ asset($product->image) }}" class="w-full h-full object-cover">
                        </button>

                        <!-- Additional Gallery Thumbnails -->
                        @foreach($product->images as $galleryImg)
                            <button @click="activeImage = '{{ asset($galleryImg->image_path) }}'"
                                :class="activeImage === '{{ asset($galleryImg->image_path) }}' ? 'ring-2 ring-[#7b8f5a] opacity-100 scale-105' : 'opacity-60 grayscale hover:grayscale-0 hover:opacity-100'"
                                class="aspect-square rounded-xl overflow-hidden bg-white shadow-md transition duration-300 transform">
                                <img src="{{ asset($galleryImg->image_path) }}" class="w-full h-full object-cover">
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Right: Product Info -->
                <div data-aos="fade-left" x-data="{ selectedColor: '{{ $product->colors[0] ?? '' }}' }">
                    <!-- Product Title -->
                    <h1 class="text-3xl md:text-4xl font-bold mb-2" style="color: #8B4513;">
                        {{ $product->display_name }}
                    </h1>

                    <!-- Category -->
                    <p class="text-[#7b8f5a] text-sm font-bold uppercase tracking-wide mb-2">
                        {{ $product->category->name }}
                    </p>

                    <!-- Rating -->
                    <div class="flex items-center space-x-2 mb-2">
                        <div class="flex items-center space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($product->rating))
                                    <i class="fas fa-star text-yellow-400"></i>
                                @elseif($i - 0.5 <= $product->rating)
                                    <i class="fas fa-star-half-alt text-yellow-400"></i>
                                @else
                                    <i class="far fa-star text-yellow-400"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-gray-600 text-sm">({{ $product->reviews_count }}
                            {{ __('messages.reviews_count') }})</span>
                    </div>

                    <!-- Price -->
                    <div class="mb-2">
                        <div class="flex items-center space-x-3 mb-2">
                            <span class="text-4xl font-bold" style="color: #8B4513;">{{ number_format($product->price, 2) }}
                                EGP</span>
                            @if($product->original_price)
                                <span
                                    class="text-xl text-gray-400 line-through">{{ number_format($product->original_price, 2) }}
                                    EGP</span>
                            @endif
                            @if($product->discount_percentage > 0)
                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                    -{{ $product->discount_percentage }}% {{ __('messages.off') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-2">
                        <p class="text-gray-700 leading-relaxed">
                            {{ $product->display_description }}
                        </p>
                    </div>

                    <!-- Color Options -->
                    @if($product->colors && count($product->colors) > 0)
                        <div class="mb-4" x-data="{ colorModal: false }">
                            <label class="block text-gray-800 font-semibold mb-2">{{ __('messages.available_colors') }}</label>
                            <div class="flex items-center gap-2">
                                @foreach(array_slice($product->colors, 0, 5) as $color)
                                    <button @click="selectedColor = '{{ $color }}'"
                                        class="w-10 h-10 rounded-full border-2 transition duration-300 transform hover:scale-110 focus:outline-none relative"
                                        :class="selectedColor === '{{ $color }}' ? 'border-[#7b8f5a] ring-2 ring-[#7b8f5a] ring-offset-2' : 'border-gray-200'"
                                        style="background-color: {{ $color }};">
                                        <span x-show="selectedColor === '{{ $color }}'"
                                            class="absolute inset-0 flex items-center justify-center">
                                            <i class="fas fa-check text-xs"
                                                :class="IsDark('{{ $color }}') ? 'text-white' : 'text-black'"></i>
                                        </span>
                                    </button>
                                @endforeach

                                @if(count($product->colors) > 5)
                                    <button @click="colorModal = true"
                                        class="w-10 h-10 rounded-full border-2 border-gray-200 bg-gray-50 flex items-center justify-center text-gray-600 font-bold text-xs hover:bg-gray-100 transition duration-300 transform hover:scale-110">
                                        +{{ count($product->colors) - 5 }}
                                    </button>
                                @endif
                            </div>

                            <!-- Color Modal -->
                            <div x-show="colorModal" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/60 backdrop-blur-md"
                                style="display: none;">

                                <div @click.away="colorModal = false" x-show="colorModal"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                                    class="bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden relative">
                                    <div
                                        class="p-6 border-b border-gray-100 flex justify-between items-center bg-[#7b8f5a] text-white">
                                        <h3 class="text-xl font-bold">{{ __('messages.available_colors') }}</h3>
                                        <button @click="colorModal = false" class="text-white/80 hover:text-white transition">
                                            <i class="fas fa-times text-xl"></i>
                                        </button>
                                    </div>
                                    <div class="p-8">
                                        <div class="grid grid-cols-5 gap-4">
                                            @foreach($product->colors as $color)
                                                <button @click="selectedColor = '{{ $color }}'; colorModal = false"
                                                    class="aspect-square rounded-full border-2 transition duration-300 transform hover:scale-110 focus:outline-none relative"
                                                    :class="selectedColor === '{{ $color }}' ? 'border-[#7b8f5a] ring-2 ring-[#7b8f5a] ring-offset-2' : 'border-gray-200'"
                                                    style="background-color: {{ $color }};">
                                                    <span x-show="selectedColor === '{{ $color }}'"
                                                        class="absolute inset-0 flex items-center justify-center">
                                                        <i class="fas fa-check text-sm"
                                                            :class="IsDark('{{ $color }}') ? 'text-white' : 'text-black'"></i>
                                                    </span>
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="p-6 bg-gray-50 border-t border-gray-100 text-center">
                                        <button @click="colorModal = false"
                                            class="w-full bg-[#7b8f5a] text-white py-3 rounded-xl font-bold hover:bg-[#6c7d4e] transition duration-300 shadow-lg">
                                            {{ __('messages.close') ?? 'Close' }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            // Helper function to determine if a color is dark or light
                            function IsDark(color) {
                                const hex = color.replace('#', '');
                                const r = parseInt(hex.substr(0, 2), 16);
                                const g = parseInt(hex.substr(2, 2), 16);
                                const b = parseInt(hex.substr(4, 2), 16);
                                const brightness = ((r * 299) + (g * 587) + (b * 114)) / 1000;
                                return brightness < 155;
                            }
                        </script>
                    @endif

                    <!-- Quantity -->
                    <div class="mb-2">
                        <label class="block text-gray-800 font-semibold mb-2">{{ __('messages.quantity') }}</label>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center border-1 border-[#7b8f5a] rounded-lg">
                                <button class="px-4 py-1 text-gray-600 hover:text-[#7b8f5a] transition duration-200">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" value="1" min="1"
                                    class="w-16 text-center border-0 focus:outline-none focus:ring-0">
                                <button class="px-4 py-1 text-gray-600 hover:text-[#7b8f5a] transition duration-200">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="flex items-center gap-2 text-[#7b8f5a]">
                                <i class="fas fa-check-circle"></i>
                                <span class="font-semibold">{{ __('messages.in_stock') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Add to Wishlist -->
                    <div class="flex items-center gap-4 mb-8">
                        <button @click="addToWishlist({{ $product->id }}, selectedColor)"
                            id="wishlist-btn-{{ $product->id }}"
                            class="flex-1 bg-[#7b8f5a] text-white py-2 rounded-lg font-bold text-lg hover:bg-[#6c7d4e] transition duration-300 flex items-center justify-center gap-2">
                            <i class="fas fa-heart"></i>
                            <span>{{ __('messages.add_to_wishlist') }}</span>
                        </button>
                    </div>

                    <script>
                        function addToWishlist(productId, color = null) {
                            const btn = document.getElementById(`wishlist-btn-${productId}`);
                            const originalContent = btn.innerHTML;

                            // Disable button and show loading
                            btn.disabled = true;
                            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>{{ __('messages.adding') }}</span>';

                            fetch('{{ route("wishlist.store") }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    product_id: productId,
                                    color: color
                                })
                            })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        // Success - change button to "In Wishlist"
                                        btn.classList.remove('bg-[#7b8f5a]', 'hover:bg-[#6c7d4e]');
                                        btn.classList.add('bg-gray-400', 'cursor-not-allowed');
                                        btn.innerHTML = '<i class="fas fa-check"></i> <span>{{ __('messages.in_wishlist') }}</span>';

                                        // Show success message
                                        showMessage(data.message, 'success');
                                    } else {
                                        // Error - restore button
                                        btn.disabled = false;
                                        btn.innerHTML = originalContent;
                                        showMessage(data.message, 'error');
                                    }
                                })
                                .catch(error => {
                                    // Check if unauthorized (401)
                                    if (error.message.includes('401')) {
                                        showMessage('Please login to add items to your wishlist.', 'error');
                                        setTimeout(() => {
                                            window.location.href = '{{ route("login") }}';
                                        }, 1500);
                                    } else {
                                        btn.disabled = false;
                                        btn.innerHTML = originalContent;
                                        showMessage('Something went wrong. Please try again.', 'error');
                                    }
                                });
                        }

                        function showMessage(message, type) {
                            const alertDiv = document.createElement('div');
                            alertDiv.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg ${type === 'success' ? 'bg-[#7b8f5a]' : 'bg-red-500'} text-white font-semibold`;
                            alertDiv.innerHTML = `
                                                                                    <div class="flex items-center">
                                                                                        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-3"></i>
                                                                                        <span>${message}</span>
                                                                                    </div>
                                                                                `;
                            document.body.appendChild(alertDiv);

                            setTimeout(() => {
                                alertDiv.remove();
                            }, 3000);
                        }
                    </script>

                    <!-- Key Features -->
                    <div class="bg-gray-50 rounded-2xl p-6 mb-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">{{ __('messages.key_features') }}</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-start gap-2">
                                <i class="fas fa-check text-[#7b8f5a] mt-1"></i>
                                <span class="text-gray-700 text-sm">{{ __('messages.handcrafted') }}</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="fas fa-check text-[#7b8f5a] mt-1"></i>
                                <span class="text-gray-700 text-sm">{{ __('messages.natural_materials') }}</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="fas fa-check text-[#7b8f5a] mt-1"></i>
                                <span class="text-gray-700 text-sm">Weight capacity: 300 lbs</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="fas fa-check text-[#7b8f5a] mt-1"></i>
                                <span class="text-gray-700 text-sm">Includes hanging hardware</span>
                            </div>
                        </div>
                    </div>

                    <!-- Dimensions -->
                    @if($product->width || $product->height || $product->depth)
                        <div class="bg-gray-50 rounded-2xl p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">
                                <i class="fas fa-ruler-combined mr-2 text-[#7b8f5a]"></i>{{ __('messages.dimensions') }}
                            </h3>
                            <div class="grid grid-cols-3 gap-4">
                                @if($product->width)
                                    <div class="text-center">
                                        <p class="text-sm text-gray-500 mb-1">Width</p>
                                        <p class="text-lg font-bold text-gray-800">{{ $product->width }}
                                            {{ $product->dimension_unit ?? 'cm' }}
                                        </p>
                                    </div>
                                @endif
                                @if($product->height)
                                    <div class="text-center">
                                        <p class="text-sm text-gray-500 mb-1">Height</p>
                                        <p class="text-lg font-bold text-gray-800">{{ $product->height }}
                                            {{ $product->dimension_unit ?? 'cm' }}
                                        </p>
                                    </div>
                                @endif
                                @if($product->depth)
                                    <div class="text-center">
                                        <p class="text-sm text-gray-500 mb-1">Depth</p>
                                        <p class="text-lg font-bold text-gray-800">{{ $product->depth }}
                                            {{ $product->dimension_unit ?? 'cm' }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                </div>

            </div>

            <!-- Tabs Section -->
            <div class="mt-16" x-data="{ activeTab: 'description', reviewModal: false, rating: 5 }" data-aos="fade-up">
                <!-- Tab Headers -->
                <div class="border-b-2 border-gray-200 mb-8">
                    <div class="flex gap-8 overflow-x-auto no-scrollbar">
                        <button @click="activeTab = 'description'"
                            :class="activeTab === 'description' ? 'border-b-4 border-[#8B4513] text-[#8B4513]' : 'text-gray-600'"
                            class="pb-4 font-semibold transition duration-200 whitespace-nowrap">
                            {{ __('messages.description') }}
                        </button>
                        <button @click="activeTab = 'reviews'"
                            :class="activeTab === 'reviews' ? 'border-b-4 border-[#8B4513] text-[#8B4513]' : 'text-gray-600'"
                            class="pb-4 font-semibold transition duration-200 whitespace-nowrap">
                            {{ __('messages.reviews') }}
                        </button>
                        <button @click="activeTab = 'shipping'"
                            :class="activeTab === 'shipping' ? 'border-b-4 border-[#8B4513] text-[#8B4513]' : 'text-gray-600'"
                            class="pb-4 font-semibold transition duration-200 whitespace-nowrap">
                            {{ __('messages.shipping') }}
                        </button>
                        <button @click="activeTab = 'returns'"
                            :class="activeTab === 'returns' ? 'border-b-4 border-[#8B4513] text-[#8B4513]' : 'text-gray-600'"
                            class="pb-4 font-semibold transition duration-200 whitespace-nowrap">
                            {{ __('messages.returns') }}
                        </button>
                    </div>
                </div>

                <!-- Tab Content -->
                <div class="bg-white rounded-2xl p-8">
                    <!-- Description Tab -->
                    <div x-show="activeTab === 'description'" x-transition>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('messages.product_description') }}</h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            {{ $product->display_description }}
                        </p>
                    </div>

                    <!-- Reviews Tab -->
                    <div x-show="activeTab === 'reviews'" x-transition>
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-800">{{ __('messages.customer_reviews') }}</h3>
                            <button @click="reviewModal = true"
                                class="bg-[#7b8f5a] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300 flex items-center gap-2">
                                <i class="fas fa-pen"></i>
                                <span>{{ __('messages.write_a_review') }}</span>
                            </button>
                        </div>

                        <!-- Overall Rating Summary -->
                        <div class="flex items-center gap-4 mb-8 p-6 bg-gray-50 rounded-xl">
                            <div class="flex items-center gap-1">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($product->rating))
                                        <i class="fas fa-star text-yellow-400 text-2xl"></i>
                                    @elseif($i - 0.5 <= $product->rating)
                                        <i class="fas fa-star-half-alt text-yellow-400 text-2xl"></i>
                                    @else
                                        <i class="far fa-star text-yellow-400 text-2xl"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="text-3xl font-bold text-gray-800">{{ number_format($product->rating, 1) }}</span>
                            <span class="text-gray-600">Based on {{ $product->reviews_count }}
                                {{ __('messages.reviews_count') }}</span>
                        </div>

                        <!-- Reviews List -->
                        <div class="space-y-6">
                            @forelse($product->reviews as $review)
                                <div
                                    class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition duration-300">
                                    <!-- Review Header -->
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-12 h-12 bg-[#7b8f5a] rounded-full flex items-center justify-center text-white font-bold text-lg">
                                                {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <h4 class="font-bold text-gray-800">{{ $review->user->name }}</h4>
                                                <p class="text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</p>
                                            </div>
                                        </div>
                                        <!-- Rating Stars -->
                                        <div class="flex items-center gap-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i
                                                    class="fas fa-star {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                            @endfor
                                        </div>
                                    </div>

                                    <!-- Review Title -->
                                    @if($review->title)
                                        <h5 class="font-semibold text-gray-800 mb-2">{{ $review->title }}</h5>
                                    @endif

                                    <!-- Review Comment -->
                                    <p class="text-gray-700 leading-relaxed">{{ $review->comment }}</p>

                                    <!-- Verified Purchase Badge -->
                                    @if($review->is_verified_purchase)
                                        <div class="mt-3 inline-flex items-center gap-1 text-sm text-[#7b8f5a]">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Verified Purchase</span>
                                        </div>
                                    @endif
                                </div>
                            @empty
                                <div class="text-center py-12 bg-gray-50 rounded-xl">
                                    <i class="fas fa-comments text-gray-300 text-5xl mb-4"></i>
                                    <p class="text-gray-600 text-lg">No reviews yet. Be the first to review this product!</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Review Modal -->
                        <div x-show="reviewModal" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/60 backdrop-blur-md"
                            style="display: none;">

                            <div @click.away="reviewModal = false" x-show="reviewModal"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                                class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl overflow-hidden">

                                <!-- Modal Header -->
                                <div
                                    class="p-6 border-b border-gray-100 flex justify-between items-center bg-[#7b8f5a] text-white">
                                    <h3 class="text-2xl font-bold">{{ __('messages.write_review') }}</h3>
                                    <button @click="reviewModal = false" class="text-white/80 hover:text-white transition">
                                        <i class="fas fa-times text-2xl"></i>
                                    </button>
                                </div>

                                <!-- Modal Body -->
                                <form id="reviewForm" class="p-8 space-y-6">
                                    @csrf

                                    <!-- Rating -->
                                    <div>
                                        <label
                                            class="block text-gray-800 font-semibold mb-3">{{ __('messages.your_rating') }}<span
                                                class="text-red-500">*</span></label>
                                        <div class="flex items-center gap-2">
                                            <template x-for="star in 5" :key="star">
                                                <button type="button" @click="rating = star"
                                                    class="text-3xl transition duration-200 transform hover:scale-110">
                                                    <i
                                                        :class="star <= rating ? 'fas fa-star text-yellow-400' : 'far fa-star text-gray-300'"></i>
                                                </button>
                                            </template>
                                            <span class="ml-3 text-gray-600 font-semibold"
                                                x-text="rating + ' {{ __('messages.out_of_5_stars') }}'"></span>
                                        </div>
                                    </div>

                                    <!-- Review Title -->
                                    <!-- <div>
                                                <label for="review-title" class="block text-gray-800 font-semibold mb-2">Review Title (Optional)</label>
                                                <input type="text" 
                                                       id="review-title" 
                                                       name="title"
                                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                                       placeholder="{{ __('messages.share_thoughts_product') }}">
                                            </div> -->

                                    <!-- Review Comment -->
                                    <div>
                                        <label for="review-comment"
                                            class="block text-gray-800 font-semibold mb-2">{{ __('messages.share_thoughts_product') }}
                                            <span class="text-red-500">*</span></label>
                                        <textarea id="review-comment" name="comment" rows="5" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7b8f5a] focus:border-transparent"
                                            placeholder="{{ __('messages.share_thoughts_product') }}"></textarea>
                                    </div>

                                    <!-- Error Message -->
                                    <div id="review-error"
                                        class="hidden bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="flex items-center justify-end gap-4 pt-4">
                                        <button type="button" @click="reviewModal = false"
                                            class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition duration-300">
                                            {{ __('messages.cancel') }}
                                        </button>
                                        <button type="submit" id="submit-review-btn"
                                            class="px-6 py-3 bg-[#7b8f5a] text-white rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300 flex items-center gap-2">
                                            <i class="fas fa-paper-plane"></i>
                                            <span>{{ __('messages.submit_review') }}</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Review Submission Script -->
                        <script>
                            document.getElementById('reviewForm')?.addEventListener('submit', function (e) {
                                e.preventDefault();

                                const btn = document.getElementById('submit-review-btn');
                                const errorDiv = document.getElementById('review-error');
                                const originalBtnContent = btn.innerHTML;

                                // Get Alpine.js data - find the tabs section with reviewModal state
                                const tabsSection = document.querySelector('[x-data*="reviewModal"]');
                                const rating = Alpine.$data(tabsSection).rating;

                                // Disable button and show loading
                                btn.disabled = true;
                                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>{{ __('messages.submitting') }}</span>';
                                errorDiv.classList.add('hidden');

                                const formData = new FormData(this);
                                formData.append('rating', rating);

                                fetch('{{ route("products.reviews.store", $product->id) }}', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json',
                                    },
                                    body: formData
                                })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            // Show success message
                                            showMessage(data.message, 'success');

                                            // Close modal and reload page to show new review
                                            setTimeout(() => {
                                                window.location.reload();
                                            }, 1500);
                                        } else {
                                            // Show error
                                            errorDiv.textContent = data.message;
                                            errorDiv.classList.remove('hidden');
                                            btn.disabled = false;
                                            btn.innerHTML = originalBtnContent;
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        errorDiv.textContent = 'An error occurred. Please try again.';
                                        errorDiv.classList.remove('hidden');
                                        btn.disabled = false;
                                        btn.innerHTML = originalBtnContent;
                                    });
                            });

                            function showMessage(message, type) {
                                const alertDiv = document.createElement('div');
                                alertDiv.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg ${type === 'success' ? 'bg-[#7b8f5a]' : 'bg-red-500'} text-white font-semibold`;
                                alertDiv.innerHTML = `
                                            <div class="flex items-center">
                                                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-3"></i>
                                                <span>${message}</span>
                                            </div>
                                        `;
                                document.body.appendChild(alertDiv);

                                setTimeout(() => {
                                    alertDiv.remove();
                                }, 3000);
                            }
                        </script>
                    </div>



                    <!-- Shipping Tab -->
                    <div x-show="activeTab === 'shipping'" x-transition>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('messages.shipping_info') }}</h3>
                        <div class="space-y-4 text-gray-700">
                            <p><strong>{{ __('messages.free_shipping') }}:</strong> On orders over $100</p>
                            <p><strong>Standard Delivery:</strong> 5-7 business days</p>
                            <p><strong>Express Delivery:</strong> 2-3 business days</p>
                        </div>
                    </div>

                    <!-- Returns Tab -->
                    <div x-show="activeTab === 'returns'" x-transition>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('messages.return_policy') }}</h3>
                        <div class="space-y-4 text-gray-700">
                            <p><strong>30-Day Returns:</strong> We offer a 30-day return policy on all items</p>
                            <p><strong>Condition:</strong> Items must be unused and in original packaging</p>
                            <p><strong>Refund:</strong> Full refund will be processed within 5-7 business days</p>
                            <p><strong>Return Shipping:</strong> Customer is responsible for return shipping costs</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            <div class="mt-16">
                <h2 class="text-3xl font-bold mb-8" data-aos="fade-right" style="color: #8B4513;">
                    {{ __('messages.related_products') }}
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @php
                        $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
                            ->where('id', '!=', $product->id)
                            ->take(4)
                            ->get();
                    @endphp

                    @forelse($relatedProducts as $relatedProduct)
                        <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}"
                            class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 group">
                            <!-- Product Image -->
                            <div class="relative overflow-hidden">
                                <img src="{{ asset($relatedProduct->image) }}" alt="{{ $relatedProduct->display_name }}"
                                    class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                                @if($relatedProduct->discount_percentage > 0)
                                    <div
                                        class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full font-bold text-sm">
                                        -{{ $relatedProduct->discount_percentage }}%
                                    </div>
                                @endif
                            </div>

                            <!-- Product Info -->
                            <div class="p-3 space-y-2">
                                <h3 class="text-gray-800 font-bold text-lg leading-tight">{{ $relatedProduct->display_name }}
                                </h3>

                                <!-- Rating -->
                                <div class="flex items-center gap-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($relatedProduct->rating))
                                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        @elseif($i - 0.5 <= $relatedProduct->rating)
                                            <i class="fas fa-star-half-alt text-yellow-400 text-xs"></i>
                                        @else
                                            <i class="far fa-star text-yellow-400 text-xs"></i>
                                        @endif
                                    @endfor
                                    <span class="text-gray-500 text-xs ms-1">({{ $relatedProduct->reviews_count }}
                                        {{ __('messages.reviews_count') }})</span>
                                </div>

                                <!-- Price -->
                                <div class="flex items-center space-x-2">
                                    <span
                                        class="text-[#7b8f5a] text-xl font-bold">{{ number_format($relatedProduct->price, 2) }}
                                        EGP</span>
                                    @if($relatedProduct->original_price)
                                        <span
                                            class="text-gray-400 line-through text-sm">{{ number_format($relatedProduct->original_price, 2) }}
                                            EGP</span>
                                    @endif
                                </div>

                                <!-- View Details -->
                                <div class="flex justify-center w-full">
                                    <a href="{{ route('products.show', $relatedProduct->id) }}"
                                        class="inline-block bg-[#7b8f5a] text-white px-4 py-2 rounded-lg font-semibold hover:bg-[#6c7d4e] transition duration-300 text-center w-full">
                                        <i class="fas fa-eye me-2"></i>{{ __('messages.view_details') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="col-span-full py-12 text-center bg-white rounded-3xl shadow-sm border border-gray-100"
                            data-aos="fade-up">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-[#7b8f5a]/10 rounded-full mb-4">
                                <i class="fas fa-layer-group text-[#7b8f5a] text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ __('messages.no_related_products') }}</h3>
                            <p class="text-gray-500 max-w-xs mx-auto text-sm">{{ __('messages.no_related_desc') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        </div>
    </section>

@endsection