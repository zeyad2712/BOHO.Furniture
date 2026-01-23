@extends('layouts.app')

@section('content')
    <!-- Wishlist Page -->
    <div class="min-h-screen py-12" style="background-color: #fefae0;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Page Header -->
            <div class="mb-8" data-aos="fade-down">
                <h1 class="text-4xl font-bold" style="color: #8B4513;">
                    <i class="fas fa-heart mr-3"></i>{{ __('messages.my_wishlist') }}
                </h1>
                <p class="text-gray-600 mt-2">{{ $wishlists->count() }}
                    {{ $wishlists->count() === 1 ? __('messages.item_saved') : __('messages.items_saved') }}
                </p>
            </div>

            @if($wishlists->count() > 0)
                <!-- Wishlist Items Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($wishlists as $wishlist)
                        @php
                            $product = $wishlist->product;
                        @endphp

                        <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 100 }}"
                            class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 group relative">
                            <!-- Remove Button -->
                            <button onclick="removeFromWishlist({{ $wishlist->id }})" id="remove-btn-{{ $wishlist->id }}"
                                class="absolute top-3 right-3 z-10 w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition duration-300">
                                <i class="fas fa-times"></i>
                            </button>

                            <!-- Product Image -->
                            <div class="relative overflow-hidden">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">

                                @if($product->status === 'new')
                                    <span
                                        class="absolute top-3 left-3 bg-[#22C55E] text-white px-3 py-1 rounded-full text-xs font-bold">
                                        {{ __('messages.new_arrivals') }}
                                    </span>
                                @elseif($product->status === 'sale')
                                    <span class="absolute top-3 left-3 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                        SALE
                                    </span>
                                @endif
                            </div>

                            <!-- Product Info -->
                            <div class="p-4 space-y-3">
                                <h3 class="text-gray-800 font-bold text-lg leading-tight line-clamp-2">{{ $product->name }}</h3>

                                @if($wishlist->color)
                                    <div class="flex items-center space-x-2">
                                        <span
                                            class="text-xs text-gray-500 uppercase font-semibold">{{ __('messages.selected_color') }}</span>
                                        <div class="w-5 h-5 rounded-full border border-gray-200 shadow-sm"
                                            style="background-color: {{ $wishlist->color }};" title="{{ $wishlist->color }}"></div>
                                    </div>
                                @endif

                                <!-- Rating -->
                                <div class="flex items-center space-x-2">
                                    <div class="flex text-yellow-400">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= floor($product->rating ?? 0))
                                                <i class="fas fa-star text-sm"></i>
                                            @elseif($i - 0.5 <= ($product->rating ?? 0))
                                                <i class="fas fa-star-half-alt text-sm"></i>
                                            @else
                                                <i class="far fa-star text-sm"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="text-sm text-gray-600">({{ $product->reviews_count ?? 0 }})</span>
                                </div>

                                <!-- Price -->
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-2xl font-bold text-[#22C55E]">{{ number_format($product->price, 2) }}
                                            EGP</span>
                                        @if($product->original_price && $product->original_price > $product->price)
                                            <span
                                                class="text-gray-400 line-through text-sm ml-2">{{ number_format($product->original_price, 2) }}
                                                EGP</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Stock Status -->
                                @if($product->stock > 0)
                                    <p class="text-sm text-green-600 font-semibold">
                                        <i class="fas fa-check-circle mr-1"></i>{{ __('messages.in_stock') }}
                                    </p>
                                @else
                                    <p class="text-sm text-red-600 font-semibold">
                                        <i class="fas fa-times-circle mr-1"></i>{{ __('messages.out_of_stock') }}
                                    </p>
                                @endif

                                <!-- Action Buttons -->
                                <div class="flex flex-col space-y-2 pt-2">
                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="w-full bg-[#22C55E] text-white py-2 rounded-lg font-semibold hover:bg-[#16A34A] transition duration-300 text-center">
                                        <i class="fas fa-eye mr-2"></i>{{ __('messages.view_details') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Continue Shopping -->
                <div class="text-center mt-12" data-aos="fade-up">
                    <a href="{{ route('products') }}"
                        class="inline-block bg-white border-2 border-[#22C55E] text-[#22C55E] px-8 py-3 rounded-lg font-semibold hover:bg-[#22C55E] hover:text-white transition duration-300">
                        <i class="fas fa-shopping-bag mr-2"></i>{{ __('messages.continue_shopping') }}
                    </a>
                </div>

            @else
                <!-- Empty Wishlist State -->
                <div class="bg-white rounded-2xl shadow-lg p-12 text-center" data-aos="zoom-in">
                    <div class="max-w-md mx-auto">
                        <i class="fas fa-heart text-gray-300 text-8xl mb-6"></i>
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ __('messages.wishlist_empty') }}</h2>
                        <p class="text-gray-600 mb-8">
                            {{ __('messages.wishlist_empty_desc') }}
                        </p>
                        <a href="{{ route('products') }}"
                            class="inline-block bg-[#22C55E] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#16A34A] transition duration-300">
                            <i class="fas fa-shopping-bag mr-2"></i>{{ __('messages.start_shopping') }}
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <!-- Remove from Wishlist Script -->
    <script>
        function removeFromWishlist(wishlistId) {
            const btn = document.getElementById(`remove-btn-${wishlistId}`);
            const originalContent = btn.innerHTML;

            // Show loading
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            btn.disabled = true;

            fetch(`/wishlist/${wishlistId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success message
                        showMessage(data.message, 'success');

                        // Reload page after 1 second
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        btn.innerHTML = originalContent;
                        btn.disabled = false;
                        showMessage(data.message, 'error');
                    }
                })
                .catch(error => {
                    btn.innerHTML = originalContent;
                    btn.disabled = false;
                    showMessage('{{ __('messages.something_wrong') }}', 'error');
                });
        }

        function showMessage(message, type) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} text-white font-semibold`;
            alertDiv.innerHTML = `
                    <div class="flex items-center">
                        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} mr-3"></i>
                        <span>${message}</span>
                    </div>
                `;
            document.body.appendChild(alertDiv);

            setTimeout(() => {
                alertDiv.remove();
            }, 3000);
        }
    </script>
@endsection